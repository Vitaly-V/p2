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

    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php7loc;charset=utf8', 'root', 123);
    }

    public function execute($sql, $params = [])
    {
        $stm = $this->dbh->prepare($sql);
        return $stm->execute($params);
    }

    public function query($sql, $params = [], $class)
    {
        $stm = $this->dbh->prepare($sql);
        $res = $stm->execute($params);
        if (false !== $res) {
            return $stm->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
