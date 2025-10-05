<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $subjects=Subject::all();
        $teachers=User::query()->where('role','teacher')->get();
        return view('admin.teacher.index',compact('subjects','teachers'));
    }
    public function store(Request $request)
    {
        $user=User::query()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'number'=>$request->number,
            'old'=>$request->old
        ]);
        dd($request->all());
    }
}
