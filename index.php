<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 4/29/16
 * Time: 7:32 PM
 */

require __DIR__ . '/autoload.php';

$user = new \App\Models\User();

$view = new \App\View();
$view->title = 'Users';
$view->users = \App\Models\User::findAll();
$view->display(__DIR__ . '/App/templates/index.php');
