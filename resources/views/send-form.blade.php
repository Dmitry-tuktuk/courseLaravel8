<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h1>Done!</h1>
    @if(!empty($_POST))
        {{dd($_POST)}}
    @endif


{{--    <form method="POST" action="/profile">--}}
{{--    @csrf--}}

{{--    <!-- Эквивалентно ... -->--}}
{{--        <input type="hidden" name="_token" value="{{ csrf_token() }}" />--}}
{{--    </form>--}}


</body>
</html>
