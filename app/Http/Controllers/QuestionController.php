<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class QuestionController extends Controller
{
    public function __construct()
    {
        // Middleware d'authentification
        // Avant d'appeler la méthode du contrôleur il vérifie qu'il peut le faire
        // Pour appeler les méthodes create et store il faut être authentifié
        // Sinon on est redirigé vers la page de login
        $this->middleware('auth')->only(['form', 'store']);
    }
    
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
        $question->user_id = 1;
        $question->save();
        
        $question->categories()->attach($request->input('categories'));
        
        // Redirection vers la page d'accueil
        return redirect()->route('home');
    }
    
    public function show()
    {
        
    }
}
