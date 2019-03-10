<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BeginnerController extends Controller
{
	//
   public function index()
  {

  	//配列の初期化
  	$data = array();

  	// データ格納
  	$data["name"] = "kohei";
  	$data["message"] = "こんにちは";

  	// 現在日時
  	$today = date('Y年m月d日 H:i:s');

    return view('beginner' ,['data' => $data, 'today' => $today]);
  }
}
