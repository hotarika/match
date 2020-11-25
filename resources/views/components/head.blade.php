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

   <!-- ソーシャルメディアの設定 -->
   <meta property="og:url" content="ページのURL" />
   <meta property="og:title" content="ページのタイトル" />
   <meta property="og:type" content="ページのタイプ" />
   <meta property="og:description" content="記事の抜粋" />
   <meta property="og:image" content="画像のURL" />
   <meta name="twitter:card" content="カード種類" />
   <meta name="twitter:site" content="@Twitterユーザー名" />
   <meta property="og:site_name" content="サイト名" />
   <meta property="og:locale" content="ja_JP" />
   <meta property="fb:app_id" content="appIDを入力" />
</head>
