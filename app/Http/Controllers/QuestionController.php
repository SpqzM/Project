<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


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
        $questions = Question::with('user', 'categories')->latest()->Paginate(10);
        
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
        
        // Liste des réponses de la plus récente à la plus ancienne
        $answers = $question->answers()->with('user')->latest()->get();
        
        // Récupération de la liste des catégories
        $categories = $question->categories;
        
        return view('questions.show', [
            'question' => $question,
            'answers' => $answers,
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
        $question->slug = Str::slug($question->title, '-');
        $question->content = $request->input('content');
        $question->user_id = auth()->user()->id;
        $question->save();
        
        $question->categories()->attach($request->input('categories'));
        
        // Redirection vers la page d'accueil
        return redirect()->route('home');
    }
    
}
