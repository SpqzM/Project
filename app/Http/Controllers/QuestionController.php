<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->latest()->simplePaginate(10);
        
        return view('questions.index', [
            'questions' => $questions    
        ]);
    }
}
