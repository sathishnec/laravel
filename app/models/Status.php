<?php

class Status extends Eloquent {
	
	protected $table = 'status';
	protected $fillable = array('name', 'description');
	public $timestamps = false;

	public function user()
	{
		return $this->hasOne('User');
	}
}