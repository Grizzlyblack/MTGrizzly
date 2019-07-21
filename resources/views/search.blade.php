@extends('layouts.form')

@section('title')
	{{__('Search')}}
@endsection

@section('form')

	<form method="GET" action="/search/results">
		@foreach($cardValues as $cardValue)
			<div class="form-group row">
	        	<label for="{{$cardValue}}" class="col-md-4 col-form-label text-md-right">{{ $cardValue }}</label>

	            <div class="col-md-6">
	                <input id="{{$cardValue}}" type="text" class="form-control" name="{{$cardValue}}" autofocus>
	            </div>
	    	</div>
	    @endforeach

	    <div class="form-group row">
	    	<label for="Set" class="col-md-4 col-form-label text-md-right">Set</label>
	    	<div class="col-md-6">
	    		<select id="Set" name="Set">
	    			<option value="">All Sets</option>
	    			@foreach ($sets as $set)
	    				<option value="{{$set}}">{{$set}}</option>
	    			@endforeach
	    		</select>
	    	</div>
	    </div>

	    <div class="form-group row">
        	<label for="Rules Text" class="col-md-4 col-form-label text-md-right">Rules Text</label>

            <div class="col-md-6">
                <textarea id="Rules Text" type="text" class="form-control" name="Rules Text" autofocus></textarea>
            </div>
    	</div>

    	<div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Search') }}
            </button>

        </div>
    </div>

	</form>


@endsection