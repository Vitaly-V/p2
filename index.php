<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 4/29/16
 * Time: 7:32 PM
 */

$url = $_SERVER['REQUEST_URI'];

require __DIR__ . '/autoload.php';

$controller = new \App\Controllers\News();

$action = !empty($_GET['action']) ? ucfirst($_GET['action']) : 'Index';
$controller->action($action);
