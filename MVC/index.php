<?php

use App\Models\Dashboard;

session_start();
error_reporting(E_ALL & E_STRICT);
ini_set('display_errors', '1');
ini_set('log_errors', '0');
ini_set('error_log', './');

require_once 'vendor/autoload.php';
require_once 'config.php';
require_once 'routes/web.php';
require_once 'models/Dashboard.php';

$dashboard["page"] = $_SERVER['REQUEST_URI'];
$dashboard["dateTime"] = date("Y/m/d H:i:s");
$dashboard["ipAddress"] = $_SERVER['SERVER_ADDR'];
$dashboard["userId"] = $_SESSION['user_id'];

if ($_SESSION['user_name']) {
    $dashboard["username"] = $_SESSION['user_name'];
} else {
    $dashboard["username"] = "Guest";
}

$journal = new Dashboard;
$journal->insert($dashboard);
