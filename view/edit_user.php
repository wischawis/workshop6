<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 15:10
 */
?>
<!DOCTYPE html>
<html>
<head>

</head>
<body>
<?php

$PATH = "../";
include("{$PATH}model/db_user.inc.php");
session_start();
$user = $_SESSION["user"];
if (is_a($user, "Member")) {
    $type = $user->getType();
    if($type == "ADMIN"){
        header("Location:{$PATH}view/manage_user.php");
        exit();
    }
    else{
        header("Location:{$PATH}view/user.php");
        exit();
    }
}
if(isset($_POST['edit'])){
    $user_1 = $_POST['edit'];
}
else{
    header("Location:manage_user.php");
    exit();
}
?>

<form action='../controller/manage.php' method="post">
<table border="1">
    <?php
    $result = get_user($user_1);
    if(!empty($result)) {
        echo "
        <tr>
            <td>username</td>
            <td><input type='text' name='username' value='".$result[0]['username']."'/></td>
        </tr>
        <tr>
            <td>password</td>
            <td><input type='text' name='password' value='".$result[0]['password']."'/></td>
        </tr>
        <tr>
            <td>name</td>
            <td><input type='text' name='name' value='".$result[0]['name']."'/></td>
        </tr>
        <tr>
            <td>surname</td>
            <td><input type='text' name='surname' value='".$result[0]['surname']."'/></td>
        </tr>
        <input type='hidden' name='id' value='".$result[0]['id']."'/>";
    }
    ?>
    <input type="submit" value="save"/>
    <?php
        echo "<input type='hidden' name='save_edit' value='".$user_1."'/>";
    ?>
</table>

</form>
<form action="../controller/check_login.php" method="post">
    <input type="submit" value="logout" name="logout"/>
</form>
</body>
</html>
