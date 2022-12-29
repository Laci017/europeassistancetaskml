@extends('layouts.app')

@section('content')
    <form action="{{ route('task.store', ['task' => $model->id ?? null]) }}" method="post" enctype="multipart/form-data">
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
                <input type="datetime-local" id="deadline" name="deadline" class="form-control form-control-lg" value="{{ $model->deadline ?? null }}">
                    </div>
                </div>
                {!! html_select('user_id', $data->users, $model->responsible_array ?? null, $errors, 'Felelős', true) !!}
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

@section('script')
    <script type="text/javascript">
        window.addEventListener('load', function () {
            /*
            $("#user_id").select2({
                maximumSelectionLength: 5,
                allowClear: true,
                width: 'resolve',
                language: {
                    maximumSelected: function (e) {
                        let t = "Legfeljebb " + e.maximum + " kollégát jelölhetsz meg.";
                        e.maximum != 1 && (t += "");
                        return t;
                    }
                }
            });
            */
        function initializeSelect() {
            let val = 1;
            if($('#is_multi_resp').is(":checked")){
                val = 5;
            }
            $("#user_id").select2({
                maximumSelectionLength: val,
                allowClear: true,
                width: 'resolve',
                language: {
                    maximumSelected: function (e) {
                        let t = "Legfeljebb " + e.maximum + " kollégát jelölhetsz meg.";
                        e.maximum != 1 && (t += "");
                        return t;
                    }
                }
            });
        }
        initializeSelect();
            $('#is_multi_resp').change(function () {
                $("#user_id").val('').trigger('change');
                initializeSelect();
                console.log('megváltozott a helyzet');
            });
        });

    </script>
@endsection
