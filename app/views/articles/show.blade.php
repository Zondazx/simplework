@extends("layout")

@section("content")
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>{{ $article->title }}</h2>
				
			<p><img src="/images/{{ $article->thumbnail }}" alt="" class="image image-full" /> </p>
			<p>Created at: {{ date("d-m-Y", strtotime($article->created_at)) }}</p>
			{{ $article->body }}

			<p style="margin-top: 1em">
				@foreach ($article->tags as $tag)
					<a href="{{ URL::route("articles.index", ["tag" => $tag->name]) }}">{{ $tag->name }}</a> 
				@endforeach		
			</p>
		</div>
	</div>
</div>
@endsection