@extends('master')

@section('head-title')
Favorites
@endsection

@section('content')
@if(Auth::check() && !$favorites->isEmpty()))
@foreach($favorites as $favorite)
<div class="content-item" id="post">
	<div id="post_details">
		<div id="post_title">
			<span><h3><a href="{{ $favorite->post_imgurl }}">{{ $favorite->post_title }}</a> <a href="{{ URL::route('favorites-remove', $favorite->id) }}">★</a></h3></span>
		</div>
		<div id="post_text">
			<span>{{ $favorite->post_text }}</span>
		</div>
		<div id="post_date">
			<span>Posted: {{ $favorite->created_at }}</span>
		</div>
	</div>
</div>
@endforeach
<center><?php echo $favorites->render(); ?></center>
@elseif(Auth::check() && $favorites->isEmpty())
<div class="content-item">
No favorites yet!
</div>
@else
<div class="content-item">
Login required!
</div>
@endif

@endsection