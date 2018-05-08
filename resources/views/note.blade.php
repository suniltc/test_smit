@extends('layouts.app')

@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Note</div>

                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-12">
                            {{ $note->note }}
                        </div>
                    </div>

                    <form method="POST" action="{{ url('comment/'.$note->slug) }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <textarea id="comment" type="comment" class="form-control{{ $errors->has('comment') ? ' is-invalid' : '' }}" name="comment" required autofocus placeholder="Comment">{{ old('comment') }}</textarea>

                                @if ($errors->has('comment'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('comment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>

                    <section class="comment-list">
                    <h2 class="page-header mt-4">Comments</h2>
                    @if(count($comments))
                        @foreach($comments as $comment)
                            <header class="text-left">
                                <div class="comment-user"><i class="fa fa-user"></i> {{ $comment->users->name }}</div>
                                <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> {{ $comment->created_at }} </time>
                            </header>
                            <div class="comment-post">
                                <p>{{ $comment->comment }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>No comments</p>
                    @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection