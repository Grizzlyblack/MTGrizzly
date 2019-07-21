@extends('layouts.app')

@section('content')

    <div class='container'>
        @if(count($cards) >= 6)
        	<p>Newly Added</p>
			<div class="carousel slide" data-ride="carousel" id="multi_item">
		    	<div class="carousel-inner">
		    		<div class="carousel-item active">
		        		<div class="row">
		        			@for($i = 0; $i < 3; $i++)
			        			<div class="carousel-image"><img class="image" src="{{url('/images/'.$cards[$i]->name.'.jpg')}}" alt=""></div>
			          		@endfor
		        		</div>
		      		</div>

			      	<div class="carousel-item">
			        	<div class="row">
			        		@for($i = 3; $i < count($cards); $i++)
				          		<div class="carousel-image"><img class="image" src="{{url('/images/'.$cards[$i]->name.'.jpg')}}" alt=""></div>
				          	@endfor
			        	</div>
			      	</div>
		    	</div>

		    	<a class="carousel-control-prev" href="#multi_item" role="button" data-slide="prev">
		      		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		      		<span class="sr-only">Previous</span>
		    	</a>
		    	<a class="carousel-control-next" href="#multi_item" role="button" data-slide="next">
		      		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		      		<span class="sr-only">Next</span>
		    	</a>
		  	</div>
		@endif
    </div>

@endsection('content')