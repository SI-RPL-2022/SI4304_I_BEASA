<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::all();
        return view('feedback.view', compact('feedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'experience' => 'required',
            'comments' => 'required',
        ]);

        $feedback = new Feedback();
        if (Auth::check()) {
            $feedback->id_user = Auth::user()->id;
        }
        if ($request->has('name')) {
            $feedback->name = $request->name;
        }
        if ($request->has('email')) {
            $feedback->email = $request->email;
        }
        $feedback->rate = $request->experience;
        $feedback->feedback = $request->comments;
        $feedback->save();
        // return $feedback;
        return redirect()->route('feedback')->with('success', 'Feedback added successfully');
    }
}
