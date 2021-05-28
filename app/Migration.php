<?php

 namespace App;

use Illuminate\Database\Eloquent\Model;


class Migration extends Model {
	
    protected $primaryKey = 'id';
    protected $fillable = [
	'id',
	'migration',
	'batch',
	];
}