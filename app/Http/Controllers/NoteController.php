<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = Note::all();

        return response()->json(
            array(
                'status' => 'Success',
                'notes' => $notes->toArray()
            ),
            200
        );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $note = new Note;
        $note->user_id = $user_id;
        $note->message = $request->input('message');
        $note->save();

        $new_tags = explode(',', $request->input('tags'));
       
        foreach($new_tags as $tag)
        {
            $new_tag = new Tag;
            $new_tag->tag_title = $tag;
            $new_tag->save();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show($user_id, $note_id)
    {
        $test = Note::find($note_id);
        $note = Note::findorFail($note_id);
        return $note;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id, $note_id)
    {
        $note = Note::findorFail($note_id);
        $tags = $note->tag;
        //return $tags;
        $note->message = $request->input('message');
        $new_tags = explode(',', $request->input('tags'));
       
        foreach($new_tags as $tag)
        {
            if(count(Tag::where('tag_title', $tag)->get()))
            {
                Tag::where('tag_title', $tag)->delete();
            }
            $new_tag = new Tag;
            $new_tag->tag_title = $tag;
            $new_tag->save();
        }
        
        return $tags;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $note_id)
    {
        $note = Note::findorFail($note_id);
        $note->destroy($note_id);
    }
}
