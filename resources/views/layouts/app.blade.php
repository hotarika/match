<!DOCTYPE html>
<html lang="ja">

@include('components/head')

<body>
   <div id="app">
      {{-- header --}}
      @include('components/header')

      {{-- ログアウト処理 --}}
      {{-- headerの中の「ログアウト」ボタンをクリックすると、下記のフォームが送信される --}}
      <form class="js-click-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
         @csrf
      </form>

      {{-- フラッシュメッセージ --}}
      @if(session('flash_message'))
      <div class=" flash" role="alert">{{ session('flash_message') }}
      </div>
      @endif
      @if(session('error_message'))
      <div class="error" role="alert">{{ session('error_message') }}</div>
      @endif

      @yield('content')

      {{-- footer --}}
      @include('components/footer')
   </div>
</body>

</html>
