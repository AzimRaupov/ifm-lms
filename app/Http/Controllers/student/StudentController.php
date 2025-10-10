<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function testroute(Request $request)
    {


        $grades=Grade::query()->where('student_id',$request->id)->get();

        dd($grades);
    }
}
