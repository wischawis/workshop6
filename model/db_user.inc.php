<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 21:40
 */
require_once 'db_connect.inc.php';

function get_users(){
    global $conn;
    $users = array();
    $sql = "SELECT * FROM user";
    $res = $conn->query($sql);
    while($user = $res->fetch(PDO::FETCH_ASSOC)) {
        $users[] = array("id"=>$user['id'],
                        "username"=>$user['username'],
                        "password"=>$user['password'],
                        "name"=>$user['name'],
                        "surname"=>$user['surname'],
                        "type"=>$user['type']
                        );
    }
    return $users;
}
function get_user($user){
    global $conn;
    $user1 = array();
    $sql = "SELECT * FROM user WHERE username='$user'";
    $res = $conn->query($sql);
    while($user = $res->fetch(PDO::FETCH_ASSOC)) {
        $user1[] = array("id"=>$user['id'],
                        "username"=>$user['username'],
                        "password"=>$user['password'],
                        "name"=>$user['name'],
                        "surname"=>$user['surname'],
                        "type"=>$user['type']
                        );
    }
    return $user1;
}
function update_user($user,$pass,$name,$surname,$s_user){
    global $conn;
    $sql = "UPDATE user SET username='$user',password='$pass',name='$name',surname='$surname' WHERE username='$s_user'";
    $res=$conn->exec($sql);
    return $res;
}
function delete_user($user){
    global $conn;
    $sql = "DELETE FROM user WHERE username='$user'";
    $res=$conn->exec($sql);
    return $res;
}
function add_user($user,$pass,$name,$surname){
    global $conn;
    $sql = "INSERT INTO user (username,password,name,surname,type)VALUES('$user','$pass','$name','$surname','USER')";
    $res = $conn->exec($sql);
    return $res;
}
?>