<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ClassificationController extends Controller
{
    // public $isPerfect;
    // public $isPrime;
    // public $isOdd;
    // public $fun_fact;
    // public $isArmstrong;
     public function index($number)
     {

        $properties = [];
        $isPrime = $this->isPrime($number);
        $isOdd = $this->isOdd($number);
        $isPerfect = $this->isPerfect($number);
        $isArmstrong =$this->isArmstrong($number);
        $properties[] = $isArmstrong;
        $properties[] = $isOdd;



        // if($this->isPrime($number) == 1){
        //     $this->isPrime = true;
        // }

        // if($this->isOdd($number)){
        //    $this->isOdd = true;
        // }

        // if($this->isPerfect($number))
        // {
        //     $this->isPerfect =true;
        // }

        // if($this->isArmstrong($number)){
        //     // $this->isArmstrong = true;
        //     $properties[]= "armstrong";
        // }else{
        //     // $this->isArmstrong = false;
        //     $properties[]= "not armstrong";
        // }


        $fun_fact = Cache::remember("fun_fact_{$number}", 3600, function () use ($number) {
            return Http::get("http://numbersapi.com/{$number}")->body();
        });


        return response()->json( [
            'number' => (int)$number,
            'is_prime'=>$isPrime,
            'is_perfect'=>$isPerfect,
            'is_odd'=>$isOdd,
            'fun_fact'=>$fun_fact,
            'properties'=>$properties,
        ],200);

     }


     public function isPrime($num){
        for($x=2; $x<$num; $x++){
            if($num % $x == 0) return false;
        }
       return true;
     }

     public function isPerfect($num)
     {
        $sum = 0;
        for($i=1;$i<$num;$i++)
        {
            if($num % $i == 0){
                $sum +=$i;
            }
        }
        return $sum == $num;
     }

     public function isOdd($num){
       return $num % 2 != 0;
     }

     public function funFact($num){
       $fun_fact = "http://numbersapi.com/". $num;

        return  Http::get($fun_fact);
     }

    public function isArmstrong($number){
        $sum = 0;
        $x = $number;
        while($x != 0)
        {
            $rem = $x % 10;
            $sum = $sum + $rem*$rem*$rem;
            $x = $x / 10;
        }

        if ($number == $sum) return true;

        return false;
    }
}
