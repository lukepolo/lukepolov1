<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Jenssegers\Mongodb\Eloquent\HybridRelations;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Models
 */
class User extends \Moloquent implements AuthenticatableContract
{
    use Authenticatable, SoftDeletes;
    protected $connection = 'mongodb';
    protected $guarded = ['_id'];

    public function getName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
