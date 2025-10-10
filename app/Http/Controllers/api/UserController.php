<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Teacher_Subject;
use App\Models\User;
use App\Models\UserActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function ping()
    {
        $user = Auth::user();
        $today = now()->toDateString();
        $activity = UserActivity::query()
            ->where('user_id', $user->id)
            ->whereDate('date', $today)
            ->first();
        if ($activity) {
            if ($activity->updated_at->diffInMinutes(now()) >= 1) {
                $activity->increment('minutes', 1);
                $activity->touch(); }
        } else {
            $activity = UserActivity::query()->create([
                'user_id'  => $user->id,
                'date'     => $today,
                'minutes'  => 1,
            ]);
        }
        return response()->json(['minutes' => $activity->minutes]);
    }

    public function add(Request $request)
    {
        $user=User::query()->create([
            'name'=>$request->name,
            'email'=>$request->email,
            'number'=>$request->number,
            'old'=>$request->old,
            'password'=>Str::random(8),
            'role'=>$request->old
        ]);
        $data=[];
        foreach ($request->subjects as $subject)
        {
            $data[]=[
                'teacher_id'=>$user->id,
                'subject_id'=>$subject
            ];
        }
        Teacher_Subject::query()->insert($data);
        return redirect()->route('admin.teacher.index');
    }
}
