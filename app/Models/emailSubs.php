<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class emailSubs extends Model
{
    use HasFactory;

    protected $table = 'tb_emailsubscription';
    protected $primaryKey = 'id_email';

    protected $fillable = ['email'];
}
