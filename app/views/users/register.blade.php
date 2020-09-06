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
                <form action="/" method="POST" class="box">
                    <div class="field">
                        <label for="" class="label">Full Name</label>
                        <div class="control">
                        <input type="text" name="name" placeholder="e.g. Bob Smith" class="input" required>
                        </div>
                    </div>

                    <div class="field">
                        <label for="" class="label">Email</label>
                        <div class="control">
                        <input type="email" name="email" placeholder="e.g. bobsmith@gmail.com" class="input" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Password</label>
                        <div class="control">
                        <input type="password" name="password" placeholder="*******" class="input" required>
                        </div>
                    </div>
                    <div class="field">
                        <label for="" class="label">Confirm Password</label>
                        <div class="control">
                        <input type="password" name="password-confirmation" placeholder="*******" class="input" required>
                        </div>
                    </div>
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