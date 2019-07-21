@extends('layouts.form')
@section('title')
{{ __('Add Card') }}
@endsection
@section('form')

<form method="POST" action="/cards/store" enctype="multipart/form-data">
	@csrf
	@foreach($cardValues as $cardValue)
		<div class="form-group row">
        	<label for="{{$cardValue}}" class="col-md-4 col-form-label text-md-right">{{ $cardValue }}</label>

            <div class="col-md-6">
                <input id="{{$cardValue}}" type="text" class="form-control" name="{{$cardValue}}" autofocus>
            </div>
    	</div>
    @endforeach

    <div class="form-group row">
    	<label for="rules_text" class="col-md-4 col-form-label text-md-right">rules_text</label>

        <div class="col-md-6">
            <textarea id="rules_text" class="form-control" name="rules_text" autofocus></textarea>
        </div>
	</div>

    <div class="form-group row">
    	<label for="image" class="col-md-4 col-form-label text-md-right">Image</label>

        <div class="col-md-6">
            <input id="image" type="file" class="form-control" name="image" autofocus>
        </div>
	</div>

    <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Add') }}
            </button>

        </div>
    </div>
</form>

@endsection