@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('task.create') }}" role="button" class="btn btn-primary">Új feladat rögzítése</a>
    <table class="table">
        <thead>
            <th>Feladat megnevezése</th>
            <th>Prioritás</th>
            <th>Státusz</th>
            <th>Határidő</th>
            <th>Felelős</th>
            <th>Szerkesztés</th>
        </thead>
        <tbody>
            @foreach($tasks as $t)
             <tr>
                <td>{{ $t->name }}</td>
                <td>{{ $t->priority->name }}</td>
                <td>{{ $t->status->name }}</td>
                <td>{{ $t->deadline }}</td>
                 <td>
                     @if(!$t->responsible->count())
                         Nincs megadva felelős.
                     @else
                         @foreach($t->responsible as $r)
                             {{ $r->user->name }}
                         @endforeach
                     @endif
                 </td>
                 <td><i class="fa-solid fa-pen-to-square"></i></td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
<main-component></main-component>
@endsection
