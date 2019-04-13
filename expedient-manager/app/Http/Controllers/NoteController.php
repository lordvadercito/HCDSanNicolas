<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $notes = Note::orderBy('creation_date', 'DESC')
            ->paginate(10);

        return View('notes.index', compact('notes'));
    }
}
