@extends('layouts.app')
@section('title', 'ユーザ登録')

@section('content')
<main class="l-main p-register">
   <div class="container">
      <div class="l-main__mainArea -oneColumn_auth">
         <section class="c-h2__sec">
            <h2 class="c-h2__head">ユーザー登録</h2>
            <div class="c-h2__oneRowBody p-register__body">
               <form class="p-register__form" method="POST" action="{{ route('register') }}">
                  @csrf

                  <!-- 名前 -->
                  <div class="p-register__inputWrap -name ">
                     <input
                        id="name"
                        type="text"
                        class="c-form__input @error('name') is-invalid @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autocomplete="name"
                        autofocus
                        placeholder="名前" />

                     @error('name')
                     <span class="c-form__invalid" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <!-- メール -->
                  <div class="p-register__inputWrap -email">
                     <input
                        id="email"
                        type="email"
                        class="c-form__input @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="email"
                        placeholder="メールアドレス" />

                     @error('email')
                     <span class="c-form__invalid" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <!-- パスワード -->
                  <div class="p-register__inputWrap -pass ">
                     <input
                        id="password"
                        type="password"
                        class="c-form__input @error('password') is-invalid @enderror"
                        name="password"
                        required
                        placeholder="パスワード" />

                     @error('password')
                     <span class="c-form__invalid" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <!-- パスワード再入力 -->
                  <div class="p-register__inputWrap -passConfirm">
                     <input
                        id="password-confirm"
                        type="password"
                        class="c-form__input"
                        name="password_confirmation"
                        required
                        placeholder="パスワード再入力" />
                  </div>

                  <!-- 登録ボタン -->
                  <button type="submit" class="c-btn p-register__submitBtn">ユーザー登録</button>
               </form>
            </div>
         </section>
      </div>
   </div>
</main>
@endsection
