@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>
            @lang('newsletter_subscriber.index.title')

            <small>{{ $newsletterSubscribers->count() }}</small>
        </h1>

        <p>
            {{ Html::linkRoute('newsletter_subscribers.create', __('newsletter_subscriber.index.add'), null, ['class' => 'btn btn-sm btn-outline-primary']) }}

            {{ Html::linkRoute('newsletter_subscribers.code', __('newsletter_subscriber.index.get_code'), null, ['class' => 'btn btn-sm btn-outline-primary mr-3']) }}

            @if (env('NEWSLETTER_SUBSCRIBER_FORUM_THREAD'))
                {{ Html::link(env('NEWSLETTER_SUBSCRIBER_FORUM_THREAD'), __('newsletter_subscriber.index.forum_thread'), ['class' => 'btn btn-sm btn-outline-info']) }}
            @endif
        </p>

        @if ($newsletterSubscribers->count() == 0)
            <p class="lead"><i>@lang('newsletter_subscriber.index.none')</i></p>
        @else
            <table class="table table-striped table-hover table-sm">
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
                    @foreach ($newsletterSubscribers->get() as $newsletterSubscriber)
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