<?php

namespace App\Http\Controllers;

use App\Models\Pointer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class FloorController extends BaseController
{

    // LT

    public function getFirstFloorPage()
    {
        return view('welcome');
    }

    public function getFirstHalfFloorPage()
    {
        return view('first_half_floor');
    }

    public function getSecondFloorPage()
    {
        return view('second_floor');
    }

    public function getThirdFloorPage()
    {
        return view('third_floor');
    }

    // EN
    public function getFirstFloorPageEN()
    {
        return view('first_floor_en');
    }

    public function getFirstHalfFloorPageEN()
    {
        return view('first_half_floor_en');
    }

    public function getSecondFloorPageEN()
    {
        return view('second_floor_en');
    }

    public function getThirdFloorPageEN()
    {
        return view('third_floor_en');
    }

//    public function showBulletData()
//    {
//        $pointers = Pointer::all();
//
//        return view('welcome', [
//            'premises' => $pointers
//        ]);
//    }
}
