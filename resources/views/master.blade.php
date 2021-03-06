<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LaravelSample - 出席管理</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
  <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
  <header class="global-header">
    <section class="header-text">
      <h1><a href="{{ route('home') }}">出席管理</a></h1>

      <div class="tag-line">出席とるよ！！</div>
    </section>
  </header>

  <main id="app" class="container">
    @yield('content')
  </main>
</body>

</html>
