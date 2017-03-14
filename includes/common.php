<?php
/**
 * Created by Nijraj Gelani.
 * Date: 2/24/17
 * Time: 2:13 PM
 */
session_start();


define("ROOT_URL", "http://" . $_SERVER['SERVER_ADDR'] . "");
define("ROOT", "/srv/http/Blog");

require (ROOT . "/vendor/autoload.php");
require (ROOT . "/objects/Base.php");
require (ROOT . "/objects/User.php");
require (ROOT . "/objects/Blog.php");
require (ROOT . "/objects/Category.php");
require (ROOT . "/objects/Post.php");
require (ROOT . "/objects/Comment.php");


$capsule = new Illuminate\Database\Capsule\Manager;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'blog',
    'username'  => 'root',
    'password'  => 'toor'
]);

$capsule->setAsGlobal();

// TODO: Find something so you don't have to do this kind of shit
$query = explode("?", $_SERVER['REQUEST_URI']);
$query = explode("&", end($query));
foreach ($query as $q){
    $t = explode("=", $q);
    if(isset($t[1]))
        $_GET[$t[0]] = $t[1];
}