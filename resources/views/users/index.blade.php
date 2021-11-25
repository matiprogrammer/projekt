@extends('layouts.app')

@section('content')
<div>
    <div class="center">
        <h1 class="text-center">Użytkownicy:</h1>
    </div>
    <div>
        
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Login</th>
                <th scope="col">Imię</th>
                <th scope="col">Nazwisko</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
              </tr>
            </thead>
            @foreach ($users as $user )
            <tbody>
              <tr>
                <td>{{ $user->login }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td><a href="users/{{$user->id }}/edit/">Edytuj użytkownika</a><span>|</span><a href="rental/user/{{$user->id }}">Wypożyczenia</a>  </td>
                
              </tr>
              @endforeach
            </tbody>

          </table>
    </div>
</div>
@endsection