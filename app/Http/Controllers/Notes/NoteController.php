<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Model\Note;
use App\Model\Subject;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function store()
    {
        //Cara 1
        /*$note = Note::create([
            'subject_id' => request('subject'),
            'title' => \request('title'),
            'slug' => \Str::slug(\request('title')),
            'description' => \request('description'),
        ]);
        return \response()->json([
            'message' => 'ur note was created',
            'notes' => $note,
        ]);*/

        //Cara 2
        $subject = Subject::findOrFail(\request('subject'));
        // $note = $subject->notes()->create([
        $note = Note::create([
            'subject_id' => $subject->id,
            'title' => \request('title'),
            'slug' => \Str::slug(\request('title')),
            'description' => \request('description'),
        ]);
        return \response()->json([
            'message' => 'ur note was created',
            'note' => $note,
        ]);
    }
}
