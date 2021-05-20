@extends('layout')

@section('title', 'Liste des questions')

@section('content')
    <h1>Toutes les questions</h1>
    
    <nav>
        {{ $questions->links() }}
    </nav>
  
    
    @foreach($questions as $question)
        <article>
             
            <header>
                <h3><a href="{{ route('questions.show', ['slug' => $question->slug]) }}">{{ $question->title }}</a></h3>
                <small>Rédigé par {{ $question->user->name }} le {{ $question->created_at->format('d/m/Y H:i') }}</small>
            </header>
            <p>{!! nl2br(e($question->content)) !!}<a href="{{ route('questions.show', ['slug' => $question->slug]) }}">[...]</a></p>
            <aside class"mt-3 mb-3"> 
                @foreach($question->categories as $category)
                    <span class="badge badge-pill badge-success">{{ $category->content }}</span>
                @endforeach
            </aside>
             <a href="#" class="btn btn-primary mt-3">Voir la question</a>
        </article>
        
    @endforeach




@endsection