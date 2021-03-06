{!! Form::errors($errors) !!}

@if (isset($model))
    {!! Form::model($model, ['route' => ['admin.events.update', $model->id], 'files' => true, 'method' => 'PUT']) !!}
@else
    {!! Form::open(['url' => 'admin/events', 'files' => true]) !!}
@endif
    {!! Form::smartText('title', trans('app.title')) !!}

    {!! Form::smartTextarea('text', trans('app.text')) !!}

    {!! Form::smartText('url', trans('app.url')) !!}

    {!! Form::smartText('location', trans('app.location')) !!}

    {!! Form::smartDateTime('starts_at', trans('app.starts_at')) !!}

    {!! Form::smartImageFile('image', trans('app.image')) !!}

    {!! Form::actions() !!}
{!! Form::close() !!}