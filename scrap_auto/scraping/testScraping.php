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
};

function setMonthInFrench($month){
    switch ($month){
        case "January": return "Janvier";
        case "February": return "Février";
        case "March": return "Mars";
        case "April": return "Avril";
        case "May": return "Mai";
        case "June": return "Juin";
        case "July": return "Juillet";
        case "August": return "Août";
        case "September": return "Septembre";
        case "October": return "Octobre";
        case "November": return "Novembre";
        case "December": return "Décembre";
    }
}


require_once('simple_html_dom.php');

function get70BestLinks(){
    $html = new simple_html_dom();
    $html->load_file('http://www.gsmarena.com/results.php3?nYearMin=2017&nRamMin=2000');
    $collecteurLiens = array();

    foreach ($html->find('div[class=makers] a') as $link)
        $collecteurLiens[] = 'http://www.gsmarena.com/' . $link->href;

    $html->clear();
    return $collecteurLiens;
}


function getSpecs($collecteurLink){
    $html = new simple_html_dom();
    $specs = array();

    $i = 0;
    foreach ($collecteurLink as $link){
        $html->load_file($link);
        $modelname = $html->find('h1[data-spec=modelname]',0)->plaintext;
        $specs[$i]['marque'] = before($modelname, " ");
        $specs[$i]['modele'] = after($modelname, " ");

        $released = $html->find('span[data-spec=released-hl]',0)->plaintext;
        $specs[$i]['mois'] = setMonthInFrench(rtrim(between($released, ", ", " '")));
        $specs[$i]['annee'] = between($released, "Released ", ",");

        $body = $html->find('span[data-spec=body-hl]',0)->plaintext;
        $specs[$i]['masse'] = before($body, "g,");
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
        $i++;
    }

    return $specs;
}


function markLinks($arrayMarqesExclues = null){
	$html = new simple_html_dom();
	$html->load_file('http://www.gsmarena.com');
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
	}

	$html->clear();
	return $marks;
}


function recupPhones($nbPhones, $marks){
	$html = new simple_html_dom();
	$phones = array();

	foreach ($marks as $mark) {
		$html->load_file($mark);
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

function trierPhones($phones, $minRam = null, $minTaille, $maxTaille){
    $html = new simple_html_dom();
    $phonesTries = $phones;

    $i = 0;
    foreach ($phonesTries as $phone) {
    	$suppr = false;
        $html->load_file($phone);

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

        if ($suppr){
            unset($phonesTries[$i]);
        }
        $i++;
    }
    return $phonesTries;

}


$marqueExlues = array("Samsung", "Apple", "Nokia");

$links = markLinks();
$phones = recupPhones(1, $links);

$phonesTries = trierPhones($phones, 2000, 3, 7);
$tels = getSpecs($phonesTries);
var_dump($tels);


?>

