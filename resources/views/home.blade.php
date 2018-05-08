@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (Session::has('message'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif

            @if (Session::has('success'))
                <div class="alert alert-success">
                    <ul>
                        <li>{!! Session::get('success') !!}</li>
                    </ul>
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">Add Note</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('add-note') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="note" class="col-sm-4 col-form-label text-md-right">Note</label>

                            <div class="col-md-6">
                                <textarea id="note" type="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note" required autofocus placeholder="Add note">{{ old('note') }}</textarea>

                                @if ($errors->has('note'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('note') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="visibility" class="col-md-4 col-form-label text-md-right">Visibility</label>

                            <div class="col-md-6">
                                <select class="form-control" id="visibility" name="visibility" required autofocus>
                                    <option value="">Visibility</option>
                                    <option {{ (old('visibility') == 'public' ? "selected":"") }} value="0">Public</option>
                                    <option {{ (old('visibility') == 'private' ? "selected":"") }} value="1">Private</option>
                                </select>

                                @if ($errors->has('visibility'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('visibility') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection