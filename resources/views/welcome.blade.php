<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Join us!</title>

        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>

    <link rel="stylesheet" href="assets/css/stylesheet.css">

    <body>
    <div class="jumbotron jumbotron-extend">
    <div class="container-fluid jumbotron-container">
    <h1 class="site-name">新しい仲間と繋がろう。</h1>
    <p><a href="{{ route('register') }}" class="btn-square-slant"></i>新規ユーザー登録</a></p>
    <p><a href="{{ route('login') }}" class="btn-square-slant">ログイン</a></p>
    </div>
    </div>

</body>
</html>

