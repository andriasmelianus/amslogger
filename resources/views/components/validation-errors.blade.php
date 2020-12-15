@props(['values'])

@if($values->has('email') || $values->has('password'))
<div {{ $attributes }}>
    <ul>
        @foreach($values->all() AS $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif