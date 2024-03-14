<?php

namespace App\Models;

use App\Models\CRUD;

class Comment extends CRUD
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'comment', 'userId', 'date-time'];
}
