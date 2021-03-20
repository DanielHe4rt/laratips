<?php

namespace App\Http\Controllers;


use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function getProfile(string $username)
    {
        $user = User::where('name', $username)->first();

        if (!$user) {
            return redirect('/');
        }

        return view('profile', compact('user'));
    }

    public function postQuestion(Request $request, User $user)
    {
        $data = $request->all();
        $data['questioner_ip'] = $request->getClientIp();

        $user->questions()->create($data);

        return redirect('/' . $user->name);
    }

    public function postAnswerQuestion(Request $request, User $user, Question $question)
    {
        $validate = $user->questions()->find($question);

        if (!$validate) {
            abort(401);
        }

        $question->answer($request->input('answer'));

        return back();
    }
}
