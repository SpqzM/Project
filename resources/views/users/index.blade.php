@extends('layout')

@section('title', 'Liste des utilisateurs')


@section('content')
    <h3>Liste des utilisateurs</h3>

    <form id="search-user" class="form-inline mb-3">
        <label for="search" class="sr-only">Filtrer</label>
        <input type="search" id="search" name="search" class="form-control" placeholder="Nom utilisateur">
    </form>
    <table id="user-list" class="table table-striped"> 
        <thead>
            <tr>
                <th>Nom d'utilisateur</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
             @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
        
@endsection