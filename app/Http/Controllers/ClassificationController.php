<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    public $isPerfect;
    public $isPrime;
     public function index($temp)
     {

        if($this->isPrime($temp) == 1){
            $this->isPrime = 'Is Prime';
        }else{
            $this->isPrime = 'Is not Prime';
        }

        return response()->json( [
            'number'=>$temp,
            'is_prime'=>$this->isPrime,
            // 'is_perfect'=>
            // 'properties'=>[],
        ],200);

     }


     public function isPrime($temp){
        for($x=2; $x<$temp; $x++){
            if($temp % $x == 0) return 0;
        }
       return 1;
     }

   
}
