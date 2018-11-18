@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>@lang('newsletter_subscriber.code.title')</h1>

        <p>
            <textarea class="form-control" rows="20">{{ $newsletterSubscriberCode }}</textarea>
        </p>

        <p>
            {{ Html::linkRoute('newsletter_subscribers.index', __('common.back'), null, ['class' => 'btn btn-primary']) }}
        </p>
    </div>
@endsection