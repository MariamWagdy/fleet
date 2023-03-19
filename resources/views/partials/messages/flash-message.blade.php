@if(isset($validation_msg))
    <div id="validation_msg" class="alert {{ isset($alert_type) ? $alert_type : 'alert-warning' }}" role="alert">{{$validation_msg}}</div>
@endif

