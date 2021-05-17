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
                <h3><a href="#">{{ $question->title }}</a></h3>
                <small>Rédigé par {{ $question->user->name }} le {{ $question->created_at->format('d/m/Y H:i') }}</small>
            </header>
            {!! nl2br(e($question->content)) !!}
        </article>
    @endforeach




@endsection