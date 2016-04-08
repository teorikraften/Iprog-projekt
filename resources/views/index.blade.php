@extends('master')

@section('head-title') 
Home
@endsection

@section('content')

@foreach($posts as $post)
<div class="content-item" id="post">
	<div id="post_details">
		<div id="post_title">
			<span>
			<h3><a href="{{ $post->post_imgurl }}">{{ $post->post_title }}</a>
			@if(Auth::check())
				@if(in_array($post->id, array_pluck($favorites, 'postid')))
					<a href="{{ URL::route('favorites-remove', $post->id) }}" title="UnFavorite">★</a></h3>
				@else
					<a href="{{ URL::route('favorites-add', $post->id) }}" title="Favorite">☆</a></h3>
				@endif
			@endif
			</span>
		</div>
		<div id="post_text">
			<span>{{ $post->post_text }}</span>
		</div>
		<div id="post_date">
			<span>Posted by <b>{{ $post->user->name }}</b> at {{ $post->created_at }}</span>
		</div>
	</div>
</div>
@endforeach
<center><?php echo $posts->render(); ?></center>
@endsection