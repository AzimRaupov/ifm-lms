<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sinf;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class SinfController extends Controller
{

    public function showLiterals($literal_int)
    {
        $classes=Sinf::query()->where('literal_int',$literal_int)->
            with('students')
            ->get();
       $teachers=User::query()->where('role','teacher')->get();
       $subjects=Subject::all();
        return view('admin.class.showLiterals',compact('classes','teachers','subjects'));
    }

    public function class_teachers($id)
    {
        $class=Sinf::query()->where('id',$id)->
        with(['teachers','magazines'])->
        first();
        $subjects = Subject::query()
            ->whereNotIn('id', function ($query) use ($id) {
                $query->select('subject_id')
                    ->from('magazines')
                    ->where('class_id', $id);
            })
            ->get();
        $teachers=User::query()->where('role','teacher')->select(['name','id'])->get();
        return view('admin.class.teachers',compact('class','subjects','teachers'));
    }

    public function index(Request $request)
    {
        dd($request->all());
    }
    public function create(Request $request)
    {
        return view('admin.class.create');
    }

    public function store(Request $request)
    {
        $class=Sinf::query()->create($request->all());
        return redirect()->route('dashboard');
    }
    public function edit(Request $request)
    {
        return view('admin.class.create');

    }

}
