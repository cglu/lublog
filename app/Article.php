<?php namespace lublog;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	//
    protected $fillable = ['title', 'category_id', 'description','content'];
}
