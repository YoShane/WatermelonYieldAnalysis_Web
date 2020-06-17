<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Auth;

class HomeController extends Controller
{
    
    public function Index() {

        if (!Auth::check()) {

            return view('index');

        }else{
            $url = 'http://163.18.42.219:5000/getRecent?user='. Auth::user()->email;
            $result=file_get_contents($url);

            $obj = json_decode($result);
            if(sizeof($obj)==0){
                return View::make('index', [
                    'isNull' => true
                ]);
            }elseif(sizeof($obj)==1){
                return View::make('index', [
                    'list1' => $obj[0],
                    'isNull' => false
                ]);
            }elseif(sizeof($obj)==2){
                return View::make('index', [
                    'list1' => $obj[0],
                    'list2' => $obj[1],
                    'isNull' => false
                ]);
            }else{
                return View::make('index', [
                    'list1' => $obj[0],
                    'list2' => $obj[1],
                    'list3' => $obj[2],
                    'isNull' => false
                ]);
            }
    
        }
    }

}
