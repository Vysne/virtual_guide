<?php

namespace App\Http\Controllers;

use App\Models\Pointer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class FloorController extends BaseController
{

    public function getPointersData()
    {
        $pointersData = DB::table('premises')
            ->get();

        return $pointersData;
    }

    public function getPointersDataEN()
    {
        $pointersData = DB::table('premises_en')
            ->get();

        return $pointersData;
    }

    // LT

    public function getFirstFloorPage()
    {
        $pointersData = $this->getPointersData();
        return view('welcome', [
            'pointers' => $pointersData
        ]);
    }

    public function getFirstHalfFloorPage()
    {
        $pointersData = $this->getPointersData();
        return view('first_half_floor', [
            'pointers' => $pointersData
        ]);
    }

    public function getSecondFloorPage()
    {
        $pointersData = $this->getPointersData();
        return view('second_floor', [
            'pointers' => $pointersData
        ]);
    }

    public function getThirdFloorPage()
    {
        $pointersData = $this->getPointersData();
        return view('third_floor', [
            'pointers' => $pointersData
        ]);
    }

    // EN
    public function getFirstFloorPageEN()
    {
        $pointersData = $this->getPointersDataEN();
        return view('first_floor_en', [
            'pointers' => $pointersData
        ]);
    }

    public function getFirstHalfFloorPageEN()
    {
        $pointersData = $this->getPointersDataEN();
        return view('first_half_floor_en', [
            'pointers' => $pointersData
        ]);
    }

    public function getSecondFloorPageEN()
    {
        $pointersData = $this->getPointersDataEN();
        return view('second_floor_en', [
            'pointers' => $pointersData
        ]);
    }

    public function getThirdFloorPageEN()
    {
        $pointersData = $this->getPointersDataEN();
        return view('third_floor_en', [
            'pointers' => $pointersData
        ]);
    }
}
