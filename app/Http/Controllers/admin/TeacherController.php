<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'old'=>$request->old,
            'password'=>Str::random(8),
            'role'=>'teacher'
        ]);
        $data=[];
        foreach ($request->subjects as $subject)
        {
            $data[]=[
                    'teacher_id'=>$user->id,
                    'subject_id'=>$subject
                ];
        }
        TeacherSubject::query()->insert($data);
        return redirect()->route('admin.teacher.index');
    }

    public function edit($id)
    {
        $teacher=User::query()->with('subjects')->find($id);
        $subjects=Subject::all();

        return view('admin.teacher.edit',compact('teacher','subjects'));
    }
    public function update($id,Request $request)
    {
        $teacher=User::query()->find($id);

        if(isset($request->destroy) and $request->destroy=='1'){
            dd($teacher);
        }

        else{
            $teacher->update($request->only(['name','email','number','old']));

            if($request->has('subjects')){
                $teacher->subjects()->sync($request->subjects);
            }
        }
    }

}
