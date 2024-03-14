<?php

namespace App\Models;

use App\Models\CRUD;

class Forum extends CRUD
{
    protected $table = 'forum';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'title', 'post', 'userName', 'userId', 'dateTime', 'image'];
}
