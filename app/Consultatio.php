<?php

 namespace App;

use Illuminate\Database\Eloquent\Model;


class Consultatio extends Model {
	
    protected $primaryKey = ['cin_doc','cin_pat'];
	public $incrementing = false;
	// protected $primaryKey = 'cin_pat';
	// public $incrementing = false;
    protected $fillable = [
	'cin_doc',
	'cin_pat',
	'date',
	'ord',
	];
}