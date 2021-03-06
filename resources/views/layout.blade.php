<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    
    <!-- My own CSS -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Cinzel" rel="stylesheet"> 

    <!-- Stripe link -->
    <script src="https://js.stripe.com/v3/"></script>

    <title>@yield('title', 'Roman Webshop')</title>

  </head>
  <body>

  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h1 class="display-4">Rome's Armory</h1>
      <p class="lead">The premier place for your daily needs.</p>
    </div>
  </div>

  @yield('content')

  <nav class="navbar fixed-bottom navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="#">Rome's Armory</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto navbar-right">
        <li class="nav-item">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/shop">Shop page</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/cart">Shopping cart</a>
        </li>
      </ul>
    </div>
  </nav> 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    
    @yield('extra-js')
    
  </body>