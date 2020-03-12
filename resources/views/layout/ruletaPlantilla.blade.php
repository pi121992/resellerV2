<!DOCTYPE html>
<html>
<head>
	<title>Ruleta</title>

<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>
<body>

<nav class="navbar  navbar-primary bg-primary-dark">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <img  class=" navbar-toggler-icon" src="https://i1.pngguru.com/preview/261/453/106/macos-app-icons-plex-media-server-png-icon.jpg">

   <img  class=" navbar-toggler-icon" src="data:image/png;base64,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">
   <br>Menu
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
     
  </div>
</nav>

@yield('body')




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>