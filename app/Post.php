<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{

    use Sluggable;

    protected $fillable = ['title','content','user_id','thumbnail','slug'];
    protected $dates = ['created_at'];
    
    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

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
