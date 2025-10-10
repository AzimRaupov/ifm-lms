<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sinf;
use App\Models\Student;
use App\Models\Teacher_Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $class=Sinf::query()->where('id',$request->id)->
            with('students')->first();
        return view('admin.class.student.index',compact('class'));
      }

      public function addStudent(Request $request)
      {
          $user=User::query()->create([
              'name'=>$request->name,
              'email'=>$request->email,
              'number'=>$request->number,
              'old'=>$request->old,
              'password'=>Str::random(8),
              'role'=>'student'
          ]);
          Student::query()->create([
              'user_id'=>$user->id,
              'class_id'=>$request->class_id
          ]);

          return redirect()->route('admin.class.show',$request->class_id);
      }
}
