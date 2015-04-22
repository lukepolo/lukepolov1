<?php

namespace App\Models\Mongo;

class Project extends \Moloquent
{
    protected $connection = 'mongodb';

    protected $guarded = ['_id'];

    protected $dates = [
        'start_date',
        'end_date'
    ];
}