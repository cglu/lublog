<?php namespace lublog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	//
    protected $fillable = ['title', 'category_id', 'description','content', 'keywords'];

    public function categories()
    {
       
        return $this->hasOne('lublog\Categories','id','category_id');
    }
    public function getCreatedAtAttribute($value){
     
        return date('Y-m-d',strtotime($value));
    }
}
