<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class DefaultController extends Controller
{
    public function home()
    {
        // Récupère les 5 articles les plus récents avec les informations de l'utilisateur
        $questions = Question::latest()->take(5)->with('user')->get();
        
        return view('home', [
            'questions' => $questions   
        ]);
    }
}
