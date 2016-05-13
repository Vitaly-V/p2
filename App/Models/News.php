<?php
/**
 * User: vitalyvyrodov
 * Date: 5/2/16
 * Time: 7:05 AM
 */

namespace App\Models;

use App\Model;
use App\MultiException;

/**
 * Class News
 * @package App\Models
 *
 * @property \App\Models\User $user
 */
class News extends Model
{
    const TABLE = 'news';

    public $id;
    public $title;
    public $lead;
    public $author_id;
    public $created;
    public $updated;

    /**
     *
     * LAZY LOAD
     *
     * @param $k
     * @return mixed|null
     */
    public function __get($k)
    {
        switch ($k) {
            case 'author':
                return User::findById($this->author_id);
                break;
            default:
                return null;
        }
    }

    public function __isset($k)
    {
        switch ($k) {
            case 'author':
                return !empty($this->author_id);
                break;
            default:
                return false;
        }
    }

    public function fill($data = [])
    {
        $e = new MultiException();

        if (true) {
            $e[] = new \Exception('Wrong title');
        }

        if (true) {
            $e[] = new \Exception('Wrong text');
        }

        throw $e;
    }

}
