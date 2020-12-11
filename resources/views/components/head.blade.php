<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <meta name="description" content="ページの内容を表す文章" />
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>@yield('title') | match</title>
   <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
      integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp"
      crossorigin="anonymous" />
   <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   <script async src="https://platform.twitter.com/widgets.js" charset="utf-8" defer></script>
   <script src="{{ asset('/js/app.js') }}" defer></script>
</head>
