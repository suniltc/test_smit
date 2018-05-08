<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Comment;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {   
        $input=$request->all();
        $input['slug']=str_random(10);
        $input['user_id']=Auth::user()->id;
        Note::create($input);

        return redirect('/home')->with('success', 'added successfully');
    }

    public function notes()
    {   
        $notes=Note::Where('visibility', '=', 0)->orwhere(function ($query) {
                $query->where('user_id', Auth::user()->id);
            })->get();

        return view('view_notes', [
            'notes' => $notes
        ]);
    }

    public function note($slug)
    {   
        $note=Note::where('slug', $slug)->first();
        $comments=Comment::where('note_id', $note->id)->get();

        return view('note', [
            'note' => $note,
            'comments' => $comments
        ]);
    }

    public function addComment(Request $request, $slug)
    {   
        $note=Note::where('slug', $slug)->first();

        $input=$request->all();
        $input['user_id']=Auth::user()->id;
        $input['note_id']=$note->id;

        Comment::create($input);

        return redirect('/note/'.$slug);
    }
}
