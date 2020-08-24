@extends("layout")

@section("create-article-style")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
@endsection

@section("content")
<div id="wrapper">
    <div id="page" class="container">
        <h1 class="heading has-text-weight-bold is-size-6">Edit Article</h1>

        <form action="{{ URL::route("articles.show", $article->id)  }}" method="POST">
            {{-- @csrf --}}
            {{-- @method('PUT') --}}
            <input type="hidden" name="_method" value="PUT">

            <div class="field">
                <label for="title" class="label">Title</label>
            
                <div class="control">
                    <input 
                        type="text" 
                        class="input {{ $errors->has("title") ? "is-danger" : "" }}" 
                        name="title" 
                        id="title" 
                        value="{{ $article->title }}">

                    @if ($errors->has("title"))
                        <p class="help is-danger">{{ $errors->first("title") }}</p>
                        @if (!empty(Input::old("title")))
                            <p class="help is-danger">The submited value "{{ Input::old("title") }}" is incorrect.</p>
                        @endif
                    @endif
                </div>
            </div>

            <div class="field">
                <label for="excerpt" class="label">Excerpt</label>

                <div class="control">
                    <textarea 
                        name="excerpt" 
                        id="excerpt" 
                        class="textarea {{ $errors->has("excerpt") ? "is-danger" : "" }}">{{ $article->excerpt }}</textarea>
                    
                    @if ($errors->has("excerpt"))
                        <p class="help is-danger">{{ $errors->first("excerpt") }}</p>
                        @if (!empty(Input::old("excerpt")))
                            <p class="help is-danger">The submited value "{{ Input::old("excerpt") }}" is incorrect.</p>
                        @endif
                    @endif
                </div>
            </div>

            <div class="field">
                <label for="body" class="label">Body</label>

                <div class="control">
                    <textarea 
                        name="body" 
                        id="body" 
                        class="textarea {{ $errors->has("body") ? "is-danger" : "" }}">{{ $article->body }}</textarea>
                    
                    @if ($errors->has("body"))
                            <p class="help is-danger">{{ $errors->first("body") }}</p>
                        @if (!empty(Input::old("body")))
                            <p class="help is-danger">The submited value "{{ Input::old("body") }}" is incorrect.</p>
                        @endif
                    @endif                        
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control"><button class="button is-link">Submit</button></div>
            </div>
        </form>
    </div>
</div>    
@endsection