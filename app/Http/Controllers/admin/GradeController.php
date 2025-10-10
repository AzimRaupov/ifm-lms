<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradeController extends Controller
{
    public function add(Request $request)
    {
       $user=Auth::user();

       Grade::query()->create($request->all());
        dd($request->all());

    }
}
