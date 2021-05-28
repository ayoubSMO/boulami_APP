<?php

 namespace App;

use Illuminate\Database\Eloquent\Model;


class Ord extends Model {
	
    protected $primaryKey = 'num';
public $incrementing = false;
    protected $fillable = [
	'num',
	'date',
	'desc',
	];
}