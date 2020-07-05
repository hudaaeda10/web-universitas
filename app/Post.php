<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $dates = ['created_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function thumbnail()
    {
    	if (!$this->thumbnail) {
    		return asset('images/no-thumbnail.png');
    	}
    	$this->thumbnail;
    }
}
