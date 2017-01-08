<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Laravel Application</title>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" />
</head>
<body>
  @include('partials.nav')
  <div class="container">
    @include('flash::message')
    @yield('content')
  </div>

 <script src="//code.jquery.com/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script>
    //$('div.alert').not('.alert-important').delay(3000).slideup(300);
    //$('#flash-overlay-modal').modal();
  </script>

  @yield('footer')


</body>
</html>
