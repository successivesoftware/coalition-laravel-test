<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Coalition Test">
    <meta name="author" content="Nik">
    <title>Coalition Test - @yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
        @yield('content')
        
    </div>   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <link href="bootstrap-editable/css/bootstrap-editable.css" rel="stylesheet">
    <script src="bootstrap-editable/js/bootstrap-editable.js"></script>
    @yield('scripts')
   
  </body>
</html>