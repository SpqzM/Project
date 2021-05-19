@extends('layout')

@section('title', 'Posez votre question')
<h1>{{question->title}}</h1>
@section('content')

<p>Rédigé par {{question->user->name}} le {{question->created_at->format('d/m/Y H:i')}}</p>

<p>{{question->content}}</p>

<form action="{{ route('answers.store') }}" method="post" enctype="multipart/form-data">
      <p>Votre réponse</p>
      <div class="form-group">
            <label for="content">Tapez votre réponse</label>
            <textarea class="form-control" id="content" rows="5" name="content"></textarea>
       </div>
       <button type="submit" class="btn btn-primary">Répondre</button> 
</form>


@endsection
