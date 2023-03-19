@extends('layouts.app')
@section('content')
    <script type="text/javascript">
        function load_crossover() {
            var source_city = $('#source_city').find(":selected").val();
            var destination_city = $('#destination_city').find(":selected").val();

            if ((source_city !== '' && destination_city !== '')) {
                $.ajax({
                    url: "getCrossoverCities",
                    data: {source_city: source_city, destination_city: destination_city},
                    success: function (result) {
                        if (result.message) {
                            $('#flash-message').html(result.message);
                        } else {
                        }
                    }
                });
            }
        }
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Make Reservation') }}</div>
                    <div class="card-body">
                        <div class="form-row">
                            {{ Form::open(array('url' => 'foo/bar')) }}
                            @csrf
                            <div id="flash-message"></div>
                            <div class="row">
                                <div
                                    class=" col-md-6"> {{Form::select('source_city_id', $cities, null, ['class' => 'form-select', 'id'=>'source_city', 'onchange' => 'load_crossover()', 'placeholder' => 'From'])}} </div>
                                <div
                                    class=" col-md-6"> {{Form::select('destination_city_id', $cities, null, ['class' => 'form-select','id'=>'destination_city','onchange' => 'load_crossover()', 'placeholder' => 'To'])}}
                                </div>
                            </div>
                            <div class="row">
                                <div
                                    class="but col-md-6"> {{Form::Submit('Book', ['class' => 'btn btn-primary'])}} </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

