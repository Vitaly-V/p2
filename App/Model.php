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

    /**
     * @return mixed
     */
    public static function findAll()
    {
        $db = Db::instance();
        return $db->query('SELECT * FROM ' . static::TABLE, [], static::class);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function findById(int $id)
    {
        $db = Db::instance();
        return $db->query('SELECT * FROM ' . static::TABLE . ' WHERE id=:id', [':id' => $id], static::class)[0];
    }

    /**
     * @return bool
     */
    public function isNew()
    {
        return empty($this->id);
    }

    /**
     * @return bool
     */
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

    /**
     * @return bool
     */
    public function update()
    {
        if ($this->isNew()) {
            return false;
        }

        $values = [];
        $sql = 'UPDATE ' . static::TABLE . ' SET ';
        foreach ($this as $k => $v) {
            $values[':' . $k] = $v;
            if ('id' == $k) {
                continue;
            }
            $sql .= ' ' . $k . '=:' . $k . ',';
        }
        $sql = rtrim($sql, ',') . ' WHERE id=:id';
        $db = Db::instance();
        $db->execute($sql, $values);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public static function delete(int $id)
    {
        $db = Db::instance();
        return $db->query('DELETE FROM ' . static::TABLE . ' WHERE id=:id', [':id' => $id], static::class);
    }
}
