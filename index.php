<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 4/29/16
 * Time: 7:32 PM
 */

require __DIR__ . '/autoload.php';

$view = new \App\View();
$view->title = 'News';
$view->news = \App\Models\News::findAll();
$view->display(__DIR__ . '/App/templates/index.php');
