<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function showForm()
    {
        return view('comments.form');
    }

    public function create(Request $request)
    {
        $user = Auth::user();
        $comment =new Comment(['body' => $request->comment]);

        $user->comments()->save($comment);

        return redirect()->route('comment.thanks');
    }

    public function thanks()
    {
        $comment = Auth::user()
            ->comments()
            ->orderby('id', 'desc')
            ->first();

        return view('comments.thanks', compact('comment'));
    }
}
