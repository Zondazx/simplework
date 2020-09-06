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
                <button class="button is-success">
                  Login
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection