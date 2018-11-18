@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>@lang('newsletter_subscriber.index.title')</h1>

        <p>
            <a href="{{ route('newsletter_subscribers.create') }}">@lang('newsletter_subscriber.index.add')</a>
        </p>

        @if ($newsletterSubscribers->count() == 0)
            <p class="lead"><i>@lang('newsletter_subscriber.index.none')</i></p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>@lang('validation.attributes.name')</th>
                    <th>@lang('validation.attributes.profile_url')</th>
                    <th>@lang('validation.attributes.post_url')</th>
                    <th>@lang('validation.attributes.comment')</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($newsletterSubscribers as $newsletterSubscriber)
                        <tr>
                            <td>{{ $newsletterSubscriber->name }}</td>
                            <td>{{ Html::link($newsletterSubscriber->profile_url) }}</td>
                            <td>{{ Html::link($newsletterSubscriber->post_url) }}</td>
                            <td>
                                @if ($newsletterSubscriber->comment)
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-container="body" data-toggle="popover" data-placement="top" data-content="{{ $newsletterSubscriber->comment }}">
                                        @lang('common.show')
                                    </button>
                                @endif
                            </td>
                            <td>
                                {{ Html::linkRoute('newsletter_subscribers.edit', __('common.edit'), $newsletterSubscriber) }}
                            </td>
                            <td>
                                @include('shared._delete_link', ['route' => ['newsletter_subscribers.destroy', $newsletterSubscriber]])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection