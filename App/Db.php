<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 4/29/16
 * Time: 7:33 PM
 */

namespace App;


class Db
{

    protected $dbh;

    public function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php7loc', 'root', 123);
    }

    public function execute($sql)
    {
        $stm = $this->dbh->prepare($sql);
        return $stm->execute();
    }
}