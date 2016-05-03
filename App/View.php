<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 5/2/16
 * Time: 9:02 PM
 */

namespace App;


class View
{

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    /**
     * @param $template string Template path
     */
    public function display($template)
    {
        include $template;
    }
}