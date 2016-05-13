<?php

/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 5/13/16
 * Time: 9:51 AM
 */

namespace App;

class Collection extends Exception implements ArrayAccess, Iterator
{
    use TCollection;
}