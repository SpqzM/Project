<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;

class AnswerController extends Controller
{
    public function store(int $id, Request $request)
    {
        // méthode de validation du formulaire (gestion erreurs de saisie)
        $request->validate([
            'content' => 'required|min:5|max:150'
        ]);
        
        // On récupère la question, si elle n'existe pas, on renvoie une page 404
        $question = Question::findOrFail($id);
            
        //Enregistrer un nouveau commentaire
        $answer = new Answer();
        $answer->pseudo = $request->input('pseudo');
        $answer->content = $request->input('content');
        $answer->question_id = $id;
        $answer->save();
        
        // Redirection vers la page de l'article
        return redirect()->route('questions.show', ['slug' => $question->slug]);
    }
