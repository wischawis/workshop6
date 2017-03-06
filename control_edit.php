<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 15:39
 */
include("connect.php");
?>
<?php
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $s_user = $_POST['save'];
    $sql = "UPDATE user SET username='$user' ,password='$pass' , name='$name' ,surname='$surname' WHERE username='$s_user'";
    $res = $conn->exec($sql);
    if($res)
        header("Location:manage_user.php");
    else
        header("Location:edit_user.php");
?>
