<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordToken extends Model
{
    use HasFactory;
    public $table = "passwordtoken";
}