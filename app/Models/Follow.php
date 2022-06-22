<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    public $timestamps = false;
    protected $table = 'follow';

    protected $guarded = ['id'];

    protected $fillable = [
        'follow_user_id',
        'follow_page_id',
        'follower_id',
        'follow_type'
    ];

    public function followUser()
    {
        return $this->belongsTo(User::class, 'follow_user_id');
    }

    public function followPage()
    {
        return $this->belongsTo(Page::class, 'follow_page_id');
    }

    public function follower()
    {
        return $this->belongsTo(User::class, 'follower_id');
    }
}
