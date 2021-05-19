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
    
    public function store(Request $request)
    {
        // Conditions de validation du formulaire de question
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required|min:5|max:280',
        ]);
        
        // Enregistrer la nouvelle question
        $question = new Question();
        $question->title = $request->input('title');
        $question->content = $request->input('content');
        $question->categories = $request->input('categories');
        $question->user_id = 1;
        $question->save();
        
        // Redirection vers la page d'accueil
        return redirect()->route('home');
    }
}
