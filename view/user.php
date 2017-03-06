<?php
/**
 * Created by PhpStorm.
 * User: WiiS
 * Date: 27/2/2560
 * Time: 14:10
 */
$PATH = "../";
include("{$PATH}model/db_connect.inc.php");
include("{$PATH}class/Member.class.php");
session_start();
$user = $_SESSION["user"];
if (is_a($user, "Member")) {
    $type = $user->getType();
    if($type == "ADMIN"){
        header("Location:{$PATH}view/manage_user.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<table border="1">
    <tr>
        <th>username</th>
        <th>password</th>
        <th>name</th>
        <th>surname</th>
    </tr>
    <tr>
        <td><?php echo $user->getUsername() ?></td>
        <td><?php echo $user->getPassword() ?></td>
        <td><?php echo $user->getName() ?></td>
        <td><?php echo $user->getSurname() ?></td>
    </tr>
</table>
<form action="../controller/check_login.php" method="post">
    <input type="submit" value="logout" name="logout"/>
</form>
</body>
</html>