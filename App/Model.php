<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 5/2/16
 * Time: 8:26 AM
 */

namespace App;

use App;

abstract class Model
{
    const TABLE = '';

    public $id;


    public static function findAll()
    {
        $db = Db::instance();
        return $db->query('SELECT * FROM ' . static::TABLE, static::class);
    }

    public static function findById(int $id)
    {
        $db = Db::instance();
        $where = $db->prepere(' id =' . $id);
        return $db->query('SELECT * FROM ' . static::TABLE . $where, static::class);
    }

    public function isNew()
    {
        return empty($this->id);
    }

    public function insert()
    {
        if (!$this->isNew()) {
            return false;
        }

        $columns = [];
        $values = [];
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }

        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(',', $columns) . ') VALUES (' . implode(',', array_keys($values)) . ')';
        $db = Db::instance();
        $db->execute($sql, $values);
    }
}
