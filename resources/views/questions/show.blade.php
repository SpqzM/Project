@extends('layout')

@section('title', 'Posez votre question')
      
@section('content')
      <h1>{{ $question->title }}</h1>
      <p>Rédigé par {{ $question->user->name }} le {{ $question->created_at->format('d/m/Y H:i') }}</p>
      <hr>
      
      <p>{{ $question->content }}</p>
      <hr>
      
      <form action="{{ route('questions.answers', ['id'=>$question->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            
            <div class="form-group">
                  <label for="content">Tapez votre réponse</label>
                  <textarea class="form-control" id="content" rows="5" name="content"></textarea>
             </div>
             <button type="submit" class="btn btn-primary">Répondre</button> 
      </form>
      <ul class="list-group list-group-flush">
            @foreach($answers as $answer)
                  <li class="list-group-item">
                        <p>{{ $answer->content }}</p>
                        <small>Rédigé par {{ $answer->user->name }} le {{ $answer->created_at->format('d/m/Y H:i') }}</small>
                  </li>
            @endforeach
      </ul>


@endsection
