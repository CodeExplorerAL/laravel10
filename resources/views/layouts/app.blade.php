<!DOCTYPE html>
<html>

<head>
  <title>Laravel App</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
  <nav>
    <ul>
      <li><a href="{{ route('books.index') }}">Books</a></li>
    </ul>
  </nav>

  <div class="container">
    @yield('content')
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>