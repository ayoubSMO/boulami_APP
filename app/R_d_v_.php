<?php

 namespace App;

use Illuminate\Database\Eloquent\Model;


class R_d_v_ extends Model {
	protected $table = "r_d_v_s";
    protected $primaryKey = 'id';
    protected $fillable = [
	'id',
	'timeslot',
	'isAbort',
	'cin_doc',
	'cin_pat'
	];

	public static function contains_($id,$list)
	{
		foreach($list as $elem)
		{
			if($elem->timeslot == $id) return true;
		}
		return false;
	}
}