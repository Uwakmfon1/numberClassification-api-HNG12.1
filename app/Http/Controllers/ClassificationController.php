<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ClassificationController extends Controller
{

     public function index($number)
     {

        $properties = [];
        $isPrime = $this->prime($number);
        $isOdd = $this->isOdd($number);
        $isPerfect = $this->perfect($number);
        $isArmstrong =$this->isArmstrong($number);
        $properties[] = $isArmstrong ? 'armstrong':'not armstrong';
        $properties[] = $isOdd ? "odd":"even";


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


     public function prime($num){
        if ($num < 2) return false;
        if ($num == 2) return true;
        if ($num % 2 == 0) return false;

        for ($x = 3; $x <= sqrt($num); $x += 2) {
            if ($num % $x == 0) return false;
        }
        return true;
     }

     public function perfect($num)
     {
        if ($num < 2) return false;
        $sum = 1;
        for ($i = 2; $i * $i <= $num; $i++) {
            if ($num % $i == 0) {
                $sum += $i;
                if ($i != $num / $i) $sum += $num / $i;
            }
        }
        return $sum == $num;
     }


    //  public function isPrime($num){
    //     for($x=2; $x<$num; $x++){
    //         if($num % $x == 0) return false;
    //     }
    //    return true;
    //  }

    //  public function isPerfect($num)
    //  {
    //     $sum = 0;
    //     for($i=1;$i<$num;$i++)
    //     {
    //         if($num % $i == 0){
    //             $sum +=$i;
    //         }
    //     }
    //     return $sum == $num;
    //  }

     public function isOdd($num){
       return $num % 2 != 0;
     }

    public function isArmstrong($number){
        $sum = 0;
        $x = $number;
        while($x != 0)
        {
            $rem = $x % 10;
            $sum += $rem*$rem*$rem;
            $x /= 10;
        }
        if ($number == $sum) return true;

        return false;
    }
}
