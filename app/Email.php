<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public $fillable = ['sujet','e-mail','description'];
    public $timestamps = false;
    public $table = 'emails';
    public $primarykey = 'id';

}
