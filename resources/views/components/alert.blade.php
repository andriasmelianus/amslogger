@if(Session::has('info-message'))
<div {{ $attributes->merge(['class' => 'alert alert-info']) }}>
    {{ Session::get('info-message') }}
</div>
@elseif(Session::has('success-message'))
<div {{ $attributes->merge(['class' => 'alert alert-success']) }}>
    {{ Session::get('success-message') }}
</div>
@elseif(Session::has('error-message'))
<div {{ $attributes->merge(['class' => 'alert alert-danger']) }}>
    {{ Session::get('error-message') }}
</div>
@elseif(Session::has('fail-message'))
<div {{ $attributes->merge(['class' => 'alert alert-danger']) }}>
    {{ Session::get('fail-message') }}
</div>
@endif