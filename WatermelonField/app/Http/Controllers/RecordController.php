<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;
use Carbon\Carbon;

class RecordController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function Index() {

            $url = 'http://163.18.42.219:5000/getAll?user='. Auth::user()->email;
            $result=file_get_contents($url);

            $obj = json_decode($result);

            $totalMin = 0;
            $totalMax = 0;
            $yield = 0;
            foreach ($obj as $data){
                $dt = Carbon::createFromTimeStamp($data->createTime)->timezone('Asia/Taipei');
                $data->createTime = $dt->toDateTimeString();
                $yield = $yield + (int)$data->count;

                $str_sec = explode("-",$data->priceRange);
                $totalMin = $totalMin+(int)$str_sec[0];
                $totalMax = $totalMax+(int)$str_sec[1];
            }

            return View::make('showRecord', [
                'recordData' => $obj,
                'yield' => $yield,
                'totalMin' => $totalMin,
                'totalMax' => $totalMax
            ]);

    }

}