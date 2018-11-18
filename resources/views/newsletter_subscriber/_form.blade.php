<div class="form-group row">
    {{ Form::label('name', __('validation.attributes.name'), ['class' => 'col-lg-2 col-form-label']) }}

    <div class="col-lg-10">
        {{ Form::text('name', old('name', $newsletterSubscriber->name), ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'required' => true]) }}

        @if ($errors->has('name'))
            <div class="invalid-feedback">
                {{ $errors->first('name') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('profile_url', __('validation.attributes.profile_url'), ['class' => 'col-lg-2 col-form-label']) }}

    <div class="col-lg-10">
        {{ Form::text('profile_url', old('profile_url', $newsletterSubscriber->profile_url), ['class' => 'form-control' . ($errors->has('profile_url') ? ' is-invalid' : ''), 'required' => true]) }}

        @if ($errors->has('profile_url'))
            <div class="invalid-feedback">
                {{ $errors->first('profile_url') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    {{ Form::label('post_url', __('validation.attributes.post_url'), ['class' => 'col-lg-2 col-form-label']) }}

    <div class="col-lg-10">
        {{ Form::text('post_url', old('post_url', $newsletterSubscriber->post_url), ['class' => 'form-control' . ($errors->has('post_url') ? ' is-invalid' : ''), 'required' => true]) }}

        @if ($errors->has('post_url'))
            <div class="invalid-feedback">
                {{ $errors->first('post_url') }}
            </div>
        @endif
    </div>
</div>

<div class="form-group row">
    <div class="offset-lg-2 col-lg-10">
        {!! Html::decode(Form::button($submitTitle, ['type' => 'submit', 'class' => 'btn btn-primary'])) !!}
    </div>
</div>