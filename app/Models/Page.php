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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post()
    {
        return $this->hasMany(Post::class, 'publisher_page_id');
    }

    public function followPage()
    {
        return $this->hasMany(Follow::class, 'follow_page_id');
    }

}
