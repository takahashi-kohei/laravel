<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class frameworks extends Model
{
	protected $table = 'frameworks';

	protected $guarded = array('id');

	public $timestamps = false;

	public function getData($type = null) {
		$data = DB::table($this->table);

		if($type != null)$data->where("type",$type);

		$data = $data->get();
		
		return $data;
	}
}
