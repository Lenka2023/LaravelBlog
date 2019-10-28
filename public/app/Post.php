<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'alias', 'intro', 'body', 'category_id', 'image'];
    //protected $guarded ['alias'];
/*public function getRouteKeyName()
    {
        return 'alias';
    }*/
    public function category()
    {
    	return $this->belongsTo('App\Category','category_id');
    }

}
