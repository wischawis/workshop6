<?php

/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 22/2/2560
 * Time: 23:33
 */
include("../model/db_connect.inc.php");
include("Member.class.php");
class Authentication
{
    public static function login($username,$password){
        global $conn;
        $sql = "SELECT * FROM user WHERE username='$username' and password='$password'";
        $result = $conn->query($sql);
        if($row = $result->fetch(PDO::FETCH_ASSOC)){
            return new Member($row['username'],$row['password'],$row['name'],$row['surname'],$row['type']);
        }
        else{
            return null;
        }
    }
    public static function logout($t_user){
        unset($t_user);
    }
}