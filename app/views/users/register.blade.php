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
                <form action="create" method="POST" class="box">
                    <div class="field">
                        <label for="" class="label">Full Name</label>
                        <div class="control">
                        <input 
                            type="text" 
                            name="name" 
                            placeholder="e.g. Bob Smith" 
                            class="input {{ $errors->has("name") ? "is-danger" : "" }}" 
                            value="{{ Input::old("name") }}">

                        @if ($errors->has("name"))
                            <p class="help is-danger">{{ $errors->first("name") }}</p>
                        @endif
                        </div>
                    </div>

                    <div class="field">
                        <label for="" class="label">Email</label>
                        <div class="control">
                        <input 
                            type="email" 
                            name="email" 
                            placeholder="e.g. bobsmith@gmail.com" 
                            class="input {{ $errors->has("email") ? "is-danger" : "" }}"
                            value = "{{ Input::old("email") }}"
                            >

                        @if ($errors->has("email"))
                            <p class="help is-danger">{{ $errors->first("email") }}</p>
                        @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Password</label>
                        <div class="control">
                        <input 
                            type="password" 
                            name="password" 
                            placeholder="*******" 
                            class="input {{ $errors->has("password") ? "is-danger" : "" }}"
                            value="{{ Input::old("password") }}"
                            >

                        @if ($errors->has("password"))
                            <p class="help is-danger">{{ $errors->first("password") }}</p>
                        @endif
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Confirm Password</label>
                        <div class="control">
                        <input 
                            type="password" 
                            name="password_confirmation" 
                            placeholder="*******" 
                            class="input {{ $errors->has("password_confirmation") ? "is-danger" : "" }}"
                            value="{{ Input::old("password_confirmation") }}">
                        
                        @if ($errors->has("password_confirmation"))
                            <p class="help is-danger">{{ $errors->first("password_confirmation") }}</p>    
                        @endif
                        </div>
                    </div>

                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                    <div class="field">
                        <button class="button is-success">
                            Register
                        </button>
                        <p class="my-3 is-info">Forgot your password? Well, fuck you.</p>
                    </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
@endsection