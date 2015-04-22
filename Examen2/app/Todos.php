<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model {

	protected $fillable = [

		'title',
		'user_id',
		'done'

	];

	public function user(){

		return $this->belongsTo('App\User');

	}

}
