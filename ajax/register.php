<?php
/**
 * Created by Nijraj Gelani.
 * Date: 2/24/17
 * Time: 5:41 PM
 */

require ("../vendor/autoload.php");
require ("../includes/common.php");

use Respect\Validation\Validator as v;


try {
    if (isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['password'], $_POST['rpassword'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rpassword = $_POST['rpassword'];
        if (v::length(1, 255)->validate($fname) && v::length(1, 255)->validate($lname)) {
            if (v::email()->validate($email)) {
                if (User::cexists("email", $email))
                    throw new Exception("Email already in use...");
                if (v::length(8, 255)->validate($password)) {
                    if ($password == $rpassword) {
                        $user = new User(null);
                        $user->fname = $fname;
                        $user->lname = $lname;
                        $user->email = $email;
                        $user->registered_on = \Carbon\Carbon::now();
                        $user->password = password_hash($password, CRYPT_BLOWFISH);
                        if ($user->save()) {
                            $_SESSION['id'] = $user->id;
                            echo "<script>window.location = '/dashboard/';</script>";
                        } else {
                            echo "Something went wrong...";
                        }
                    } else {
                        echo "Both passwords do not match...";
                    }
                } else {
                    echo "Password should be atleast 8 characters long...";
                }
            } else {
                echo "Please enter a valid email address...";
            }
        } else {
            echo "Please enter your first and last name...";
        }
    } else {
        echo "Complete all the fields...";
    }
}catch (Exception $e){
    echo $e->getMessage();
}