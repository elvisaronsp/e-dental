<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * Columns fillable by this model
	 */
	protected $fillable = array(
		'username',
		'password',
		'email'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	/**
	 *
	 */
	public function records()
	{
		return $this->hasMany('Record');
	}

	/**
	 *
	 */
	public function doctors()
	{
		return $this->hasManyThrough('Doctor', 'Record');
	}

	/**
	 *
	 */
	public function services()
	{
		return $this->hasManyThrough('Service', 'Record');
	}

	/**
	 *
	 */
	public function schedules()
	{
		return $this->hasMany('Schedule');
	}

	/**
	 *
	 */
	public function profile()
	{
		return $this->hasOne('Profile');
	}

}
