<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'alias', 'intro', 'body', 'image'];
    //protected $guarded ['alias'];
/*public function getRouteKeyName()
    {
        return 'alias';
    }*/

}
