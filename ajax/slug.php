<?php
/**
 * Created by Nijraj Gelani.
 * Date: 3/6/17
 * Time: 7:51 PM
 */

require ("../vendor/autoload.php");

if(isset($_POST['name'])){
    echo str_slug($_POST['name']);
}