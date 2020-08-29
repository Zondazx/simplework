<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/*
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/*
	 * The attributes that are mass assignable.
	 * 
	 * @var array
	*/
	protected $fillable = array("name", "email", "password");

	/*
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/*
	 * The attributes that should be cast to native types.
	 * 
	 * @var array 
	 */
	protected $casts = array("email_verified_at" => "datetime");

	public function articles() {
		return $this->hasMany(Article::class);
	}

	public function projects() {
		return $this->hasMany(Project::class);
	}
}
