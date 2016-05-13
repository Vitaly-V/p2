<?php
/**
 * Created by PhpStorm.
 * User: vitalyvyrodov
 * Date: 5/13/16
 * Time: 10:39 AM
 */

namespace App;


class MultiException extends \Exception implements \ArrayAccess, \Iterator
{
    use TCollection;
}