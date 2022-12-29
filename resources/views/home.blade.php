@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('task.create') }}" role="button" class="btn btn-primary">Új feladat rögzítése</a>
    <table class="table">
        <thead>
            <th>Feladat megnevezése</th>
            <th>Határidő</th>
            <th>Leírás</th>
            <th>Prioritás</th>
            <th>Állapot</th>
            <th>Feladathoz rendelt személy(ek)</th>
            <th>Feladatot létrehozta</th>
            <th>Többszemélyes?</th>
            <th>Szerkesztés</th>
        </thead>
        <tbody>
            @foreach($tasks as $t)
             <tr>
                <td>{{ $t->name }}</td>
                <td>{{ $t->deadline }}</td>
                <td>{{ $t->description }}</td>
                <td class="{{ $t->priority->color }}">{{ $t->priority->name }}</td>
                <td>{{ $t->status->name }}</td>
                 <td>
                     @if(!$t->responsible->count())
                         Nincs megadva felelős.
                     @else
                         @foreach($t->responsible as $r)
                             {{ $r->user->name }}
                         @endforeach
                     @endif
                 </td>
                 <td>{{ $t->creator->name }}</td>
                 <td>{{ $t->is_multi_resp ? 'Igen' : 'Nem' }}</td>
                 <td><a href="{{ route('task.update', [$t->getKey()]) }}"><i class="fa-solid fa-pen-to-square"></i></a></td>
             </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('script')
    @if(Illuminate\Support\Facades\Session::get('message'))
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function (event) {
            Swal.fire({
                title: '{{ Session::get('message.title') }}',
                html: '{{ Session::get('message.body') }}',
                icon: 'success',
                confirmButtonText: '{{ Session::get('message.buttonText') }}'
            })
        });
    </script>
    @php
        Session::forget('message');
    @endphp
    @endif
@endsection
