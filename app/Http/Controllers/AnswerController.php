<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    public function __construct()
    {
        // Middleware d'authentification
        // Avant d'appeler la méthode du contrôleur il vérifie qu'il peut le faire
        // Pour appeler les méthodes create et store il faut être authentifié
        // Sinon on est redirigé vers la page de login
        $this->middleware('auth')->only(['store']);
    }
    
    public function store(int $id, Request $request)
    {
        // méthode de validation du formulaire (gestion erreurs de saisie)
        $request->validate([
            'content' => 'required|min:5|max:2000'
        ]);
        
        // On récupère la question, si elle n'existe pas, on renvoie une page 404
        $question = Question::findOrFail($id);
            
        //Enregistrer un nouveau commentaire
        $answer = new Answer();
        $answer->content = $request->input('content');
        $answer->question_id = $id;
        $answer->user_id = auth()->user()->id;
        $answer->save();
        
        // Redirection vers la page de l'article
        return redirect()->route('questions.show', ['slug' => $question->slug]);
    }
}
