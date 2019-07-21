@extends('layouts.app')

@section('content')

	<div class="container">
		@foreach($cards as $card)
			<a href='/cards/{{$card->id}}'><img src='{{ url("/images/".$card->name.".jpg") }}' class="image"/></a>
		@endforeach
	</div>

@endsection