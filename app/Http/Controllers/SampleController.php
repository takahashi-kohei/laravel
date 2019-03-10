<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Frameworks;

class SampleController extends Controller
{
	public function model($type = null){
		// Frameworksモデルのインスタンス化
		$md = new Frameworks();
		// データ取得
		$data = $md->getData($type);

		// viewを返す
		return view("sample.model",["data" => $data]);
	}

}
