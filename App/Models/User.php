<?php
/**
 * User: vitalyvyrodov
 * Date: 5/2/16
 * Time: 7:05 AM
 */

namespace App\Models;

use App\Model;


class User extends Model implements HasEmail
{
    const TABLE = 'users';

    public $id;
    public $email;
    public $name;
    public $created;
    public $updated;

    /**
     * Method that returns email address.
     * @return string Email address
     */
    public function getEmail()
    {
        return $this->getEmail();
    }

}
