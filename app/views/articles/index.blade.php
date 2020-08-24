@extends("layout")

@section("content")
<div id="wrapper">
    <div id="page" class="container">
        @foreach($articles as $article)
            <div class="content">
                <div class="title">
                    <h2><a href="{{ URL::route("articles.show", $article->id) }}">{{ $article->title }}</a></h2>
                </div>
                <p><img src="/images/{{ $article->thumbnail }}" alt="" class="img image-full"></p>
                <p>Created at: {{ date("d-m-Y", strtotime($article->created_at)) }}</p>
                {{ $article->excerpt}}
            </div>
        @endforeach
    </div>
</div>
@endsection