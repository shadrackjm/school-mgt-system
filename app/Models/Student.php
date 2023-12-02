<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    //mass assignment
    protected $fillable = [
      'registration_number',
      'firstname',
      'middlename',
      'lastname',
      'form',
      'stream',
      'category',
    ];
}
