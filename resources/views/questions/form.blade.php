@extends('layout')

@section('title', 'Posez votre question')

@section('content')
     <form action="{{ route('questions.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        
        @if($errors->any())
            <aside class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </aside>
        @endif
        
        <div class="form-group">
            <label for="title">Titre de la question</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        
        <div class="form-group">
            <label for="content">Contenu de l'article</label>
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
        </div>
        
        <div class="form-group">
            <label for="categories">Catégorie(s)</label>
            <select multiple class="form-control" id="categories" name="categories">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->content }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Poster la question</button>
    </form>



@endsection