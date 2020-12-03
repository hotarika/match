@extends('layouts.app')
@section('title', 'ログイン')

@section('content')
<main class="l-main p-login">
   <div class="container">
      <div class="l-main__mainArea -oneColumn_auth">
         <section class="c-h2__sec">
            <h2 class="c-h2__head">ログイン</h2>
            <div class="c-h2__oneRowBody p-login__body">
               <form class="p-login__form" method="POST" action="{{ route('login') }}">
                  @csrf

                  <!-- メール -->
                  <div class="p-login__inputWrap -email">
                     <input
                        id="email"
                        type="email"
                        class="c-form__input @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        autofocus
                        placeholder="メールアドレス" />

                     @error('email')
                     <span class="c-form__invalid" role="alert">
                        <strong>{{$message}}</strong>
                     </span>
                     @enderror
                  </div>

                  <!-- パスワード -->
                  <div class="p-login__inputWrap -pass">
                     <input
                        id="password"
                        type="password"
                        class="c-form__input @error('password') is-invalid @enderror"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="パスワード" />

                     @error('password')
                     <span class="c-form__invalid" role="alert">
                        <strong>{{$message}}</strong>
                     </span>
                     @enderror
                  </div>

                  <!-- ログイン記録 -->
                  <div class="p-login__rememberWrap">
                     <input type="checkbox" class="p-login__remember" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }} />
                     <label class="p-login__rememberLabel" for="remember">ログイン状態を保持する</label>
                  </div>

                  <!-- ログインボタン -->
                  <button type="submit" class="c-btn c-authSendBtn">ログイン</button>

                  <!-- パスワードリマインダー -->
                  @if (Route::has('password.request'))
                  <a class="c-link p-login__passReminder" href="{{ route('password.request') }}">パスワードを忘れた方はこちら</a>
                  @endif
               </form>
            </div>
         </section>
      </div>
   </div>
</main>
@endsection
