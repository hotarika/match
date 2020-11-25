@extends('layouts.app')
@section('title', 'マイページ')

@section('content')
<main class="l-main p-register">
   <div class="container">
      <div class="l-main__mainArea -oneColumn_auth">
         <section class="c-h2__sec">
            <h2 class="c-h2__head">ユーザー登録</h2>
            <div class="c-h2__oneRowBody p-register__body">
               <form class="p-register__form" method="POST" action="">
                  <!-- 名前 -->
                  <div class="p-register__inputWrap -name">
                     <input
                        id="name"
                        type="text"
                        class="c-form__input"
                        name="name"
                        value=""
                        required
                        autocomplete="name"
                        autofocus
                        placeholder="名前" />
                     <span class="c-form__invalid is-invalid" role="alert">
                        <strong>入力してください</strong>
                     </span>
                  </div>

                  <!-- メール -->
                  <div class="p-register__inputWrap -email">
                     <input
                        id="email"
                        type="email"
                        class="c-form__input"
                        name="email"
                        value=""
                        required
                        autocomplete="email"
                        placeholder="メールアドレス" />
                     <span class="c-form__invalid is-invalid" role="alert">
                        <strong>入力してください</strong>
                     </span>
                  </div>

                  <!-- パスワード -->
                  <div class="p-register__inputWrap -pass">
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

                  <!-- パスワード再入力 -->
                  <div class="p-register__inputWrap -passConfirm">
                     <input
                        id="pass-confirm"
                        type="password"
                        class="c-form__input"
                        name="pass-confirm"
                        required
                        autocomplete="current-password"
                        placeholder="パスワード再入力" />
                     <span class="c-form__invalid is-invalid" role="alert">
                        <strong>入力してください</strong>
                     </span>
                  </div>

                  <!-- ログインボタン -->
                  <button type="submit" class="c-btn p-register__submitBtn">ユーザー登録</button>
               </form>
            </div>
         </section>
      </div>
   </div>
</main>
@endsection
