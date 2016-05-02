<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 4/29/16
 * Time: 7:32 PM
 */

require __DIR__ . '/autoload.php';

$user = \App\Models\User::findById(3);
$user->name = 'Vlalik';
$user->email = 'valik@seotoaster.com';
$user->update();