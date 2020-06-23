<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';


    protected $fillable = [
        'title', 'content','categories', 'image'
    ];

    public function translate(){

        return $this->hasOne('App\NewsTranslate');

    }

}
