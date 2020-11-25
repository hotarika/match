@extends('layouts.app')
@section('title', 'マイページ')

@section('content')
<main class="l-main p-login">
   <div class="container">
      <div class="l-main__mainArea -oneColumn_auth">
         <section class="c-h2__sec">
            <h2 class="c-h2__head">ログイン</h2>
            <div class="c-h2__oneRowBody p-login__body">
               <form class="p-login__form" method="POST" action="">
                  <!-- メール -->
                  <div class="p-login__inputWrap -email">
                     <input
                        id="email"
                        type="email"
                        class="c-form__input"
                        name="email"
                        value=""
                        required
                        autocomplete="email"
                        autofocus
                        placeholder="メールアドレス" />
                     <span class="c-form__invalid is-invalid" role="alert">
                        <strong>入力してください</strong>
                     </span>
                  </div>

                  <!-- パスワード -->
                  <div class="p-login__inputWrap -pass">
                     <input
                        id="pass"
                        type="password"
                        class="c-form__input"
                        name="pass"
                        required
                        autocomplete="current-password"
                        placeholder="パスワード" />
                     <span class="c-form__invalid is-invalid" role="alert">
                        <strong>入力してください</strong>
                     </span>
                  </div>

                  <!-- ログイン記録 -->
                  <div class="p-login__rememberWrap">
                     <input type="checkbox" class="p-login__remember" name="remember" id="remember" />
                     <label class="p-login__rememberLabel" for="remember">ログイン状態を保持する</label>
                  </div>

                  <!-- ログインボタン -->
                  <button type="submit" class="c-btn p-login__submitBtn">ログイン</button>

                  <!-- パスワードリマインダー -->
                  <a class="c-link p-login__passReminder" href="">パスワードを忘れた方はこちら</a>
               </form>
            </div>
         </section>
      </div>
   </div>
</main>
@endsection
