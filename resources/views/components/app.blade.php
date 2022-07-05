<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daily Works</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/table.css') }}">
  <link rel="stylesheet" href="{{ asset('css/button.css') }}">
  <link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
  <link rel="stylesheet" href="{{ asset('css/template.css') }}">

  <script src="{{ asset('js/app.js') }}" defer></script>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  {{ $slot }}
</body>
</html>
