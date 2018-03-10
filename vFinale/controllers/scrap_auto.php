<?php

function after($string, $substring) {
    $pos = strpos($string, $substring);
    if ($pos === false)
        return $string;
    else
        return(substr($string, $pos+strlen($substring)));
}
function before($string, $substring) {
    $pos = strpos($string, $substring);
    if ($pos === false)
        return $string;
    else
        return(substr($string, 0, $pos));
}
function between ($str, $from, $to)
{
    $chaine = before($str, $to);
    $chaine = after($chaine, $from);
    return $chaine;
}
function setMonthInFrench($month){
    switch ($month){
        case "January": return 1;
        case "February": return 2;
        case "March": return 3;
        case "April": return 4;
        case "May": return 5;
        case "June": return 6;
        case "July": return 7;
        case "August": return 8;
        case "September": return 9;
        case "October": return 10;
        case "November": return 11;
        case "December": return 12;
    }
    return null;
}
function getSpecs($collecteurLink){
    $specs = array();
    $i = 0;
    foreach ($collecteurLink as $link){
        $html = file_get_html($link);
        $modelname = $html->find('h1[data-spec=modelname]',0)->plaintext;
        $specs[$i]['marque'] = before($modelname, " ");
        $specs[$i]['modele'] = after($modelname, " ");
        $released = $html->find('span[data-spec=released-hl]',0)->plaintext;
        $specs[$i]['mois'] = setMonthInFrench(rtrim(between($released, ", ", " '")));
        if (before($released, ".") == "Exp") {
            $specs[$i]['annee'] = between($released, "release ", ",");
        }
        else{
            $specs[$i]['annee'] = between($released, "Released ", ",");
        }

        $body = $html->find('span[data-spec=body-hl]',0)->plaintext;
        $masse = before($body, "g,");
        if (count_chars($masse) > 3) $masse = null;
        $specs[$i]['masse'] = $masse;

        $specs[$i]['epaisseur'] = between($body, ", ", "mm");
        $displaySize = $html->find('span[data-spec=displaysize-hl]',0)->plaintext;
        $specs[$i]['tailleEcran'] = before($displaySize, "\"");
        $displayRes = $html->find('div[data-spec=displayres-hl]',0)->plaintext;
        $specs[$i]['hauteurEcran'] = between($displayRes, "x", " pixel");
        $specs[$i]['largeurEcran'] = before($displayRes, "x");
        $os = $html->find('span[data-spec=os-hl]',0)->plaintext;
        $specs[$i]['typeOs'] = before($os, " ");
        $specs[$i]['versionOs'] = rtrim(between($os, " ", " '"));
        $storage = $html->find('span[data-spec=storage-hl]',0)->plaintext;
        $specs[$i]['capaciteStockage'] = before($storage, "GB");
        $cardSlot = between($storage, "storage, " , " card");
        if ($cardSlot == "no"){
            $specs[$i]['cardSlot'] = false;
        }
        else{
            $specs[$i]['cardSlot'] = true;
        }
        $chipset = $html->find('div[data-spec=chipset-hl]',0)->plaintext;
        $specs[$i]['processeur'] = $chipset;
        $ram = $html->find('span[data-spec=ramsize-hl]',0)->plaintext;
        $specs[$i]['memoireRam'] = before($ram, " ");
        $camPixel = $html->find('span[data-spec=camerapixels-hl]',0)->plaintext;
        $specs[$i]['resolutionCamera'] = before($camPixel, " ");
        $batCapacity = $html->find('span[data-spec=batsize-hl]',0)->plaintext;
        $specs[$i]['capaciteBatterie'] = before($batCapacity, " ");
        $batType = $html->find('div[data-spec=battype-hl]',0)->plaintext;
        $specs[$i]['typeBatterie'] = $batType;

        $imgUrl = $html->find('div[class=specs-photo-main] a img',0)->src;
        $specs[$i]['imgUrl'] = $imgUrl;

        $lien2 = $html->find('div[class=specs-photo-main] a',0)->href;
        $lien2 = 'http://www.gsmarena.com/' . $lien2;
        $htmlPhoto = file_get_html($lien2);
        $image2Url = $htmlPhoto->find('div[id=pictures-list] p img',0)->src;
        $specs[$i]['imgUrl2'] = $image2Url;
        $i++;
    }
    return $specs;
}
function markLinks($arrayMarqesExclues = null){
   
    //$html = new simple_html_dom();
    //$html->load_file('http://www.gsmarena.com');
    $html = file_get_html('http://www.gsmarena.com');
    $marks = array();
   
    foreach ($html->find('div[class=brandmenu-v2 light l-box clearfix] ul li a') as $mark) {
        if ($arrayMarqesExclues == null){
            $marks[] = 'http://www.gsmarena.com/' . $mark->href;
        }
        else{
            if (!(in_array($mark->plaintext, $arrayMarqesExclues))){
                $marks[] = 'http://www.gsmarena.com/' . $mark->href;
            }
        }
        $html->clear();
    }
    return $marks;
}
function recupPhones($nbPhones, $marks){
    $phones = array();
    foreach ($marks as $mark) {
        $html = file_get_html($mark);
        $i = 0;
        foreach ($html->find('div[class=makers] ul li a') as $phone) {
            if ($i < $nbPhones) {
                $phones[] = 'http://www.gsmarena.com/' . $phone->href;
            }
            $i++;
        }
    }
    return $phones;
}
function trierPhones($phones, $minRam = null, $minTaille, $maxTaille, $phoneExistants){
    $phonesTries = $phones;
    $i = 0;
    foreach ($phonesTries as $phone) {
        $suppr = false;
        $html = file_get_html($phone);
        // On vérifie que ce soit ni une montre ni une tablette
        $taille = substr($html->find('td[data-spec=displaysize]',0)->plaintext , 0 ,3);
        if ($taille > $maxTaille or $taille < $minTaille){
            $suppr = true;
        }
        // On regarde si le paramètre minRam existe
        if ($minRam != null){
            $ram = $html->find('td[data-spec=internalmemory]', 0)->plaintext;
            $pos = stripos ($ram, "RAM");
            $ramBis = substr($ram, $pos-3, 2);
            if ($ramBis == 'MB'){
                $suppr = true;
            }
            else{
                $ramGo = substr($ram, $pos-5, 1);
                if ($ramGo < 3){
                    $suppr = true;
                }
            }
        }
        // On vérifie qu'il ne soit pas dans la bdd
        // Si il y est, on met suppr sur true
        $modelname = $html->find('h1[data-spec=modelname]',0)->plaintext;
        $marque = before($modelname, " ");
        $modele = after($modelname, " ");

        if (!is_null($phoneExistants)){
            foreach ($phoneExistants as $key) {
                if ($suppr == false) {
                    if ($key["Fabricant"] == $marque and $key["modele"] == $modele) {
                        $suppr = true;
                    }
                }
            }
        }

        if ($suppr){
            unset($phonesTries[$i]);
        }
        $i++;
    }
    return $phonesTries;
}
?>
<?php
if(isset($_SESSION['userName'])) {

    require_once(PATH_VIEWS . 'scrap_auto.php');
    require_once(PATH_MODELS . 'TelephoneDAO.php');
    require_once(PATH_MODELS . 'simple_html_dom.php');

    if (isset($_POST['btonSubmit'])){
        $minSize = $_POST['minScreenSize'];
        $maxSize = $_POST['maxScreenSize'];
        $minRam = $_POST['minRam'];
        $nbTelToScrap = $_POST['nbTelParMarque'];

        $phonesDao = new TelephoneDAO(0);
        $phonesExistants = $phonesDao->getAllTels();
        //$marqueExlues = array("Samsung", "Apple", "Nokia");
        
        
        $links = markLinks();
        //var_dump($links);
        
        $phones = recupPhones($nbTelToScrap, $links);
        $phonesTries = trierPhones($phones, $minRam, $minSize, $maxSize, $phonesExistants);
        $tels = getSpecs($phonesTries);
        
        $nbTels = 0;
        $nbErreurs = 0;

        foreach ($tels as $key) {
            $phonesDaoBis = new TelephoneDAO(0);
            $phonesDaoBis->addTel($key);
           if ($phonesDaoBis->getErreur() == null){
               $nbTels++;
               // On upload les 2 images
               $url1 = $key['imgUrl'];
               $url2 = $key['imgUrl2'];

               $data1 = file_get_contents($url1);
               $new1 = PATHS_PHOTOS_PHONES . $key['marque'] . '_' . $key['modele'] . '_sd.jpg';
               file_put_contents($new1, $data1);

               $data2 = file_get_contents($url2);
               $new2 = PATHS_PHOTOS_PHONES . $key['marque'] . '_' . $key['modele'] . '_hd.jpg';
               file_put_contents($new2, $data2);


           }
           else{
               var_dump($key);
               var_dump($phonesDaoBis->getErreur());
               $nbErreurs++;
           }


        }

        echo $nbTels . " téléphones ajoutés en base";
        echo "<br>";
        echo $nbErreurs . " Erreurs";

        var_dump($tels);
    }


    ?>

<?php
}
else{
    header("Location: index.php?page=login&erreur=Veuillez vous connecter pour accéder à l'espace administrateur");
}  

