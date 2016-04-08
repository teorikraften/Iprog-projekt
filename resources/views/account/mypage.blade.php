@extends('master')

@section('head-title')
	Overview: {{ $user->name }}
@endsection

@section('content')

<h3>Account</h3>
<div id="account">
<ul class="list-group">
  <li class="list-group-item">
    <span class="label label-default label-pill pull-xs-right">{{ $userposts->count() }}</span>
    posts posted.
  </li>
  <li class="list-group-item">
    <span class="label label-default label-pill pull-xs-right">{{ $favorites->count() }}</span>
    posts favorited.
  </li>
</ul>
</div>

<h3>My Posts</h3>
@foreach($userposts as $post)
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
</fieldset>

@endsection