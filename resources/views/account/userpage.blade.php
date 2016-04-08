@extends('master')

@section('head-title')
	Overview: {{ $user->name }}
@endsection

@section('content')


<h3>{{ $user->name }}'s Posts</h3>
@foreach($userposts as $post)
<div class="content-item" id="post">
	<div id="post_details">
		<div id="post_title">
			<span>
			<h3><a href="{{ $post->post_imgurl }}">{{ $post->post_title }}</a>
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


@endsection