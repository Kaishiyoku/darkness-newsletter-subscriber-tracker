@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>

        {{ Html::linkRoute('newsletter_subscribers.index', __('common.nav.newsletter_subscribers'), null, ['class' => 'btn btn-outline-primary']) }}
    </div>
@endsection
