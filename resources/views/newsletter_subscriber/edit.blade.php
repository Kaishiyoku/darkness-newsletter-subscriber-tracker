@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit subscriber “{{ $newsletterSubscriber->name }}”</h1>

        {{ Form::open(['route' => ['newsletter_subscribers.update', $newsletterSubscriber], 'method' => 'put', 'role' => 'form']) }}
            @include('newsletter_subscriber._form', ['submitTitle' => __('common.update')])
        {{ Form::close() }}
    </div>
@endsection