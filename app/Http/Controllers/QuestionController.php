<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with('user')->latest()->Paginate(10);
        
        return view('questions.index', [
            'questions' => $questions    
        ]);
    }
    
    public function form()
    {
        $categories = DB::table('categories')->get();
        
        return view('questions.form', [
            'categories' => $categories    
        ]);
    }
    public function show(string $slug)
    {
        $question = Question::where('slug', $slug)->firstOrFail();
        
        // Liste des commentaires du plus récent au plus ancien
        $comments = $question->answers()->latest()->get();
        
        // Récupération de la liste des catégories
        $categories = $question->categories;
        
        return view('questions.show', [
            'question' => $question,
            'comments' => $comments,
            'categories' => $categories
        ]);
    }
}
