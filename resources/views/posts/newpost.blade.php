@extends('master')

@section('head-title') 
New post
@endsection

@section('content')
<div class="content-item" id="post-creation">
@if(Auth::check())
<fieldset>
	<legend>New post</legend>
	<form method="POST" action="{{ URL::route('post-create') }}">
		{!! csrf_field() !!}
		<span>
		<h3>Title:</h3>
		<input type="text" placeholder="Write your title here..." name="post_title">
		</span>
		<span>
		<h3>Text:</h3>
		<textarea type="text" placeholder="Write your post here..." name="post_text"></textarea>
		</span>
		<span>
		<h3>Image URL (optional):</h3>
		<input type="url" placeholder="Write your URL here..." name="post_imgurl">
		</span>
		<span>
			<input type="submit" value="Submit Post">
		</span>
	</form>
</fieldset>
@else
Login required!
@endif
</div>
@endsection