<?php
/**
 * Created by Nijraj Gelani.
 * Date: 2/24/17
 * Time: 11:05 PM
 */
session_start();
session_destroy();
unset($_SESSION['id']);
header("Location: /");