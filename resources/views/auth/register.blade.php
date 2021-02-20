@extends('layouts.app')
@section('title', 'ユーザ登録')

@section('content')
<main class="l-main p-register">
   <div class="container">
      <div class="l-main__mainArea -oneColumn_auth">
         <form action="{{route('login')}}" method="post">
            @csrf
            <input type="hidden" name="email" value="guest@example.com">
            <input type="hidden" name="password" value="password">
            <button type="submit" class="c-guestLogin -register">会員登録せずにログイン</button>
         </form>
         <section class="c-h2__sec">
            <h2 class="c-h2__head">ユーザー登録</h2>
            <div class="c-h2__oneRowBody p-register__body">
               <form class="p-register__form" method="POST" action="{{ route('register') }}">
                  @csrf

                  <!-- 名前 -->
                  <div class="p-register__inputWrap -name ">
                     <span class="c-form__description">※ 20文字以内</span>
                     <input
                        id="name"
                        type="text"
                        class="c-form__input @error('name') is-invalid @enderror"
                        name="name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        autofocus
                        placeholder="名前 [必須]" />

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
                        autocomplete="email"
                        placeholder="メールアドレス [必須]" />

                     @error('email')
                     <span class="c-form__invalid" role="alert">
                        <strong>{{ $message }}</strong>
                     </span>
                     @enderror
                  </div>

                  <!-- パスワード -->
                  <div class="p-register__inputWrap -pass ">
                     <span class="c-form__description">※ 8文字~20文字以内・半角英数字のみ<br>（記号は使用できません）</span>
                     <input
                        id="password"
                        type="password"
                        class="c-form__input @error('password') is-invalid @enderror"
                        name="password"
                        placeholder="パスワード [必須]" />

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
                        placeholder="パスワード再入力 [必須]" />
                  </div>

                  <!-- 登録ボタン -->
                  <button type="submit" class="c-btn c-authSendBtn">ユーザー登録</button>
               </form>
            </div>
         </section>
      </div>
   </div>
</main>
@endsection
