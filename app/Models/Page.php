<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    public $timestamps = false;
    protected $table = 'pages';

    protected $guarded = ['id'];

    protected $fillable = [
        'page_name',
        'user_id',
        'profile_img',
        'cover_img'
    ];

}
