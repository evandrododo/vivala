<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Ong extends Model {

	protected $fillable = ['nome'];
	
	/**
	 * Uma ong pertence a um usuário.
	 */
	public function user()
	{
		return $this->belongsTo('App\User')->withTimestamps();
	}

}
