<?php

/**
 * Created by PhpStorm.
 * User: julien
 * Date: 20/10/2017
 * Time: 14:19
 */
class User
{
    private $_userId;
    private $_userName;
    private $_userPassword;

    /**
     * User constructor.
     * @param $_userId
     * @param $_userName
     * @param $_userPassword
     */
    public function __construct($_userId, $_userName, $_userPassword)
    {
        $this->_userId = $_userId;
        $this->_userName = $_userName;
        $this->_userPassword = $_userPassword;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->_userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->_userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->_userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserPassword()
    {
        return $this->_userPassword;
    }

    /**
     * @param mixed $userPassword
     */
    public function setUserPassword($userPassword)
    {
        $this->_userPassword = $userPassword;
    }

}