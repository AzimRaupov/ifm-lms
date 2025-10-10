<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Magazine;
use App\Models\Sinf;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    public function magazine_class($id)
    {
        $magazine=Magazine::query()->where('id',$id)->
            with(['class'=>function ($q) {
            $q->with('students');
        },'subject'])->first();
      return view('teacher.class.magazine.show',compact('magazine'));
    }
    public function create_magazine(Request $request)
    {
        Magazine::query()->create($request->all());
        return redirect()->route('admin.class.teachers',$request->class_id);
    }
}
