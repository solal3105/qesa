<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 20/10/2017
 * Time: 14:23
 */

require_once(PATH_MODELS.'DAO.php');

class UserDAO extends DAO
{
    public function getUser($userName){
        require_once (PATH_ENTITY.'User.php');

        // préparation du tableau de paramètres pour la requette préparée
        $param = array($userName);
        // requete préparée
        $res = $this->queryRow('select * from users where userName = ?', $param);


        // Si la requete est valide
        if ($res){
            // On crée une un objet User puis on le retourne
            $user = new User(
                $res['userId'],
                $res['userName'],
                $res['userPassword']);
            return $user;
        }
        return null;
    }

    public function createUser($userName, $userPassword){
        $param = array($userName, $userPassword);
        $res = $this->addSupprRow('insert into users (userName, userPassword) VALUES (?, ?)', $param);
        return $res;
    }

    public function deleteUser($userId){
        $param = array($userId);
        $res = $this->addSupprRow('delete from users WHERE userId = ?', $param);
        return $res;
    }
}