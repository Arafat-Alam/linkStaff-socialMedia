<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;
    protected $table = 'posts';

    protected $guarded = ['id'];

    protected $fillable = [
        'publisher_user_id',
        'publisher_page_id',
        'post_content',
        'post_type'
    ];

}
