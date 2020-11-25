<!DOCTYPE html>
<html lang="ja">

@include('components/head')

<body>
   <div id="app">
      <header-component></header-component>

      @if(session('flash_message'))
      <div class="flash" role="alert">{{ session('flash_message') }}</div>
      @endif
      @if(session('error_message'))
      <div class="error" role="alert">{{ session('error_message') }}</div>
      @endif

      @yield('content')

      <!-- footer -->
      <footer-component></footer-component>
   </div>

   <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
   <script src="{{ asset('/js/app.js') }}" defer></script>
</body>

</html>
