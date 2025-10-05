<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Sinf;
use Illuminate\Http\Request;

class SinfController extends Controller
{
    public function create(Request $request)
    {
        return view('admin.class.create');
    }

    public function store(Request $request)
    {
        $class=Sinf::query()->create($request->all());
        return redirect()->route('admin.class.edit',$class->id);
    }
    public function edit(Request $request)
    {
        return view('admin.class.create');

    }

}
