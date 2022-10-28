<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        ///////////////////////////////////////
        // display only notes for logged in user
        // latest, sorted by the 'update_at' column
        // $notes = Note::where('user_id', Auth::id())->latest('updated_at')->get();
        
        ///////////////////////////////////////
        // paginate added to display only 'x' amount of notes per page
        // paginate() take arguement, num of notes to be displayed
        $notes = Note::where('user_id', Auth::id())->latest('updated_at')->paginate(5);



        // linking the view for the notes to be displayed
        return view('notes.index')->with('notes', $notes);

        // can use alternatively include in view()
        // return view('notes.index', $notes);


        // Displaying notes
        // dd($notes);


        // Displaying notes titles only
        // each function loops through the notes
        $notes->each(function($notes) {

            // shows the title attribute/field for the note 
            dump($notes->title);

        });
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validates the fields are filled, title max 120 char
        $request->validate([
            'title'=> 'required|max:120',
            'text'=> 'required'
        ]);

        // Creates note, passing the user_id
        Note::create([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'title' => $request->title,
            'text' => $request->text
        ]);

        // Return to the notes page after note is added
        return to_route('notes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        // Auth::id() needed to only show authorised users note.
        // Otherwise user could put any note id in url and access it.
        // firstOrFail displays a 404 error if the first note is unavailable.
        $note = Note::where('uuid',$uuid)->where('user_id', Auth::id())->firstOrFail();

        // Return the note view page with variable 'note' from above
        return view('notes.show')->with('note', $note);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
