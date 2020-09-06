@extends("layout")

@section("bulma-style")
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.0/css/bulma.min.css">
@endsection

@section("content")
<section class="hero">
    <div class="hero-body">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-5-tablet is-4-desktop is-3-widescreen">
            <form action="signin" method="POST" class="box">
              <div class="field">
                <label for="" class="label">Email</label>
                <div class="control">
                  <input 
                    type="email" 
                    name="email" 
                    placeholder="e.g. bobsmith@gmail.com" 
                    class="input"
                    value="{{ Input::old("email") }}" 
                    >
                </div>
              </div>
              <div class="field">
                <label for="" class="label">Password</label>
                <div class="control">
                  <input 
                    type="password" 
                    name="password" 
                    placeholder="*******" 
                    class="input"
                    value="{{ Input::old("password") }}"
                    >
                </div>
              </div>

              <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

              <div class="field">
                <button class="button is-success">
                  Login
                </button>
              </div>

            @if ($errors->has("message"))
                <p class="help is-danger">{{ $errors->first("message") }}</p>
            @endif
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection