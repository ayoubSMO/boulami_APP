<?php

 namespace App;

use Illuminate\Database\Eloquent\Model;


class Patient extends Model {
	
    protected $primaryKey = 'cin';
public $incrementing = false;
    protected $fillable = [
	'cin',
	'fname',
	'lname',
	'email',
	'phone',
	'fonction',
	'login',
	'password',
	'user_id',
	];
}