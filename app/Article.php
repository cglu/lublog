<?php namespace lublog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	//
    protected $fillable = ['title', 'category_id', 'description','content'];

    public function categories()
    {
       
        return $this->hasOne('lublog\Categories','id','category_id');
    }
    
}
