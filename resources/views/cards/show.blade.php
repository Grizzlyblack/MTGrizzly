@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="card-view">
			<img src="{{url('/images/'.$card->name.'.jpg')}}"></img>
		</div>
		<div class="card-details">
				<h1>{{$card->name}}</h1>
				<hr>
				<div class="card-keys">
					<p>Rarity:</p>
					<p>Card Type:</p>
					<p>P/T:</p>
					<p>Description:</p>
					<p>Sets:</p>
				</div>
				<div class="card-values">
					<p>{{$card->rarity}}</p>
					<p>{{$card->type}}--{{$card->sub_type}}</p>
					<p>{{$card->power}}/{{$card->toughness}}</p>
					<p>{{$card->rules_text}}</p>
					<p>
						@foreach($sets as $set)
							{{$set}},
						@endforeach
					</p>
				</div>
			</ul>
		</div>
	</div>

@endsection