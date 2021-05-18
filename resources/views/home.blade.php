@extends('layout')

@section ('title', 'Accueil')

@section('content')
    <h1>Projet "Debug moi"</h1>
    <p>Un forum d'entraide pour les développeurs.</p>
    <p>Vous êtes bloqué(e) et ne savez pas comment avancer ? Posez une question à la communauté !</p>
    <p><a href="{{ route('questions.form') }}" class="btn btn-primary">Poser une question</a> <a href="{{ route('questions.index') }}" class="btn btn-success ml-1">Voir toutes les questions</a></p>
    
    <section>
        <h2>Les 5 dernières questions</h2>
        
        @foreach($questions as $question)
            <article>
                <header>
                    <h3>{{ $question->title }}</h3>
                    <small>Rédigé par {{ $question->user->name }} le {{ $question->created_at->format('d/m/Y H:i') }}</small>
                </header>
                {{ $question->content }}
            </article>
        @endforeach
    </section>
@endsection