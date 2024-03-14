<?php

namespace App\Models;

use App\Models\CRUD;

class Student extends CRUD
{
    protected $table = 'students';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'name', 'email', 'birthday'];
}
