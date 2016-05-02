<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 5/2/16
 * Time: 8:26 AM
 */

namespace App;


abstract class Model
{
    const TABLE = '';

    public static function findAll()
    {
        $db = new Db();
        return $db->query('SELECT * FROM ' . static::TABLE, static::class);
    }

    public static function findById(int $id)
    {
        $db = new Db();
        $where = $db->prepere(' id =' . $id);
        return $db->query('SELECT * FROM ' . static::TABLE . $where, static::class);
    }
}
