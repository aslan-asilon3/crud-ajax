<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomRatePlan;
use App\Models\RoomType;
use App\Models\Allotment;

class AllotmentController extends Controller
{
    public function index()
    {
        $allotments = Allotment::all();
        return view('allotments.index', compact('allotments'));
    }
}
