<?php

 namespace App;

 use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Doctor extends Model {
	
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
	'speciality',
	'city',
	'quote',
	'user_id',
	];
	use HasFactory;
}