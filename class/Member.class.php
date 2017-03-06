<?php

/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 22/2/2560
 * Time: 23:35
 */
class Member
{
    private $username;
    private $password;
    private $name;
    private $surname;
    private $type;
    public function __construct($username, $password, $name, $surname, $type)
    {
        $this->username = $username;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->type = $type;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getSurname()
    {
        return $this->surname;
    }
    public  function __toString()
    {
        return $this->name." ".$this->surname;
    }
    public function getType()
    {
        return $this->type;
    }

}