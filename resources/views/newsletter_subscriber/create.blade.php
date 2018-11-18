@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add subscriber</h1>

        {{ Form::open(['route' => 'newsletter_subscribers.store', 'method' => 'post', 'role' => 'form']) }}
            @include('newsletter_subscriber._form', ['submitTitle' => __('common.create')])
        {{ Form::close() }}
    </div>
@endsection