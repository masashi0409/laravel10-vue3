<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    public function index () 
    {
        $words = Word::orderBy('created_at', 'desc')->get();

        return Inertia::render('Words/Index',['words' => $words]);
    }
    
    public function search ($queryWord)
    {
        $searchedWords = Word::Where('content', 'like', '%' . $queryWord . '%')->get();
        
        return Inertia::render('Words/Index', [
            'words' => $searchedWords
        ]);
    }
    
    public function store (Request $request)
    {
        $word = new Word;
        $word->user_id = Auth::id();
        $word->user_name = $request->userName ? $request->userName : 'ななし';
        $word->content = $request->content;
        $word->save();
        
        return redirect()->route('word.index', $parameters = [], $status = 303, $headers = []);
    }
    
    public function destroy ($id) 
    {
        Word::destroy($id);
        return redirect()->route('word.index', $parameters = [], $status = 303, $headers = []);
    }
}
