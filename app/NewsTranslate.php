<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsTranslate extends Model
{
    protected $table = 'newstranslate';


    protected $fillable = [
        'title', 'content','categories', 'news_id','image'
    ];

    public function news(){

        return $this->belongsTo('App\News');

    }

}
