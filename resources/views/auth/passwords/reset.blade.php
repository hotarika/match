@extends('layouts.app')
@section('title', 'パスワード再設定')

@section('content')
<main class="l-main p-passReset">
   <div class="container">
      <div class="l-main__mainArea -oneColumn_auth">
         <section class="c-h2__sec">
            <h2 class="c-h2__head">パスワード再設定</h2>

            <div class="c-h2__oneRowBody p-login__body">
               <form method="POST" action="{{ route('password.update') }}">
                  @csrf

                  <input type="hidden" name="token" value="{{ $token }}">

                  {{-- メールアドレス --}}
                  <div class="p-login__inputWrap -email">
                     <input
                        id="email"
                        type="email"
                        class="c-form__input @error('email') is-invalid @enderror"
                        name="email"
                        value="{{ $email ?? old('email') }}"
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

                  {{-- パスワード --}}
                  <div class="p-login__inputWrap -pass">
                     <span class="c-form__description">※ 8文字~20文字以内・半角英数字のみ<br>（記号は使用できません）</span>
                     <input
                        id="password"
                        type="password"
                        class="c-form__input @error('password') is-invalid @enderror"
                        name="password"
                        autocomplete="current-password"
                        placeholder="パスワード" />

                     @error('password')
                     <span class="c-form__invalid" role="alert">
                        <strong>{{$message}}</strong>
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
                        placeholder="パスワード再入力" />
                  </div>
                  <button type="submit" class="c-btn c-authSendBtn">パスワード再設定</button>

               </form>
            </div>
         </section>
      </div>
   </div>
   </div>
</main>
@endsection
