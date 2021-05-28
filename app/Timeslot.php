<?php

 namespace App;

use Illuminate\Database\Eloquent\Model;


class Timeslot extends Model {
	
    protected $primaryKey = 'id';
    protected $fillable = [
	'id',
	'day',
	'startHour',
	'endHour',
	'isDisponible',
	'cin_doc'
	];
}