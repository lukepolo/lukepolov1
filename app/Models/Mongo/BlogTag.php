<?php

namespace App\Models\Mongo;

/**
 * Class BlogTag
 * @package App\Models\Mongo
 */
class BlogTag extends \Moloquent
{
    protected $connection = 'mongodb';
    protected $guarded = ['_id'];
}