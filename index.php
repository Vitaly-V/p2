<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 4/29/16
 * Time: 7:32 PM
 */

require __DIR__ . '/autoload.php';

$user = new \App\Models\User();
$user->name = 'Andrei';
$user->email = 'andrei@seosamba.com';
$user->insert();