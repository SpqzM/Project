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
}
