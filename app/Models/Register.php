<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $table = 'member';
    protected $fillable = ['nama','email','password'];
    public $timestamps = false;
}