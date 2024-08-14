<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Musicials extends Model
{
    use HasFactory, softDeletes;

    protected $table = "musicials";

    protected $fillable = [
        'name',
        'profile_picture',
        'birth_date',
        'instrument',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
