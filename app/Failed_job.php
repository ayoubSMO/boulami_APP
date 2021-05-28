<?php

 namespace App;

use Illuminate\Database\Eloquent\Model;


class Failed_job extends Model {
	
    protected $primaryKey = 'id';
    protected $fillable = [
	'id',
	'uuid',
	'connection',
	'queue',
	'payload',
	'exception',
	'failed_at',
	];
}