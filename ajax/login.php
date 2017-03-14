<?php
/**
 * Created by Nijraj Gelani.
 * Date: 2/24/17
 * Time: 5:41 PM
 */

require ("../includes/common.php");

$id = User::verifyLogin($_POST['username'], $_POST['password']);

if($id != NULL){
    $_SESSION['id'] = $id;
    echo "<script>window.location = '/dash';</script>";
}else{
    echo "Username/Password wrong";
}