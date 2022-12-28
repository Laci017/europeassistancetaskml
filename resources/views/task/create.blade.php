@extends('layouts.app')

@section('content')
    <form action="{{ route('task.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card col-md-6">
            <div class="card-header">Új feladat rögzítése</div>
            <div class="card-body">
                {!! simpleFormInput('name', 'Feladat megnevezése', $model->name ?? null) !!}
                {!! simpleFormInput('description', 'Feladat leírása', $model->description ?? null) !!}
                {!! html_select('priority_id', $data->priorities, $model->priority_id ?? -1, $errors, 'Prioritás') !!}
                {!! html_select('status_id', $data->statuses, $model->status_id ?? -1, $errors, 'Státusz') !!}
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_multi_resp" name="is_multi_resp">
                    <label class="form-check-label" for="is_multi_resp">Több személy megadható felelősnek?</label>
                </div>
                <div class="form-group col-md-8">
                    <div class="form_item">
                <label for="deadline">Határidő:</label>
                <input type="datetime-local" id="deadline" name="deadline" class="form-control form-control-lg">
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-footer">
                <button id="btn_save" class="btn btn-primary">Mentés</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Mégsem</a>
            </div>
        </div>
    </form>
@endsection
