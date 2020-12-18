@extends('layouts.app')
@section('title', 'パスワード変更')

@section('content')
<main class="l-main p-changePass">
   <div class="container">
      <h1 class="c-h1__head">パスワード変更</h1>
      <div class="l-main__mainAreaWrap">
         @include('components/sidebar-settings')

         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-changePass__body">
                  <form method="POST" class="p-changePass__form" action="{{route('password.change')}}">
                     @csrf

                     <!-- 現在のパスワード -->
                     <div class="p-changePass__inputWrap -currentPass">
                        <input
                           id="current_password"
                           class="c-form__input p-changePass__input -currentPass"
                           type="password"
                           name="current_password"
                           autofocus
                           autocomplete="current-password"
                           placeholder="現在のパスワード" />

                        @error('current_password')
                        <span class="c-form__invalid" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                     <!-- 現在のパスワード -->
                     <div class="p-changePass__inputWrap -newPass">
                        <span class="c-form__description">※ 8文字~20文字以内・半角英数字のみ（記号は使用できません）</span>
                        <input
                           id="password"
                           class="c-form__input p-changePass__input -newPass"
                           type="password"
                           name="password"
                           placeholder="新しいパスワード" />

                        @error('password')
                        <span class="c-form__invalid" role="alert">
                           <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                     </div>

                     <!-- 現在のパスワード -->
                     <div class="p-changePass__inputWrap -confirmPass">
                        <input
                           id="password-confirm"
                           class="c-form__input p-changePass__input -confirmPass"
                           type="password"
                           name="password_confirmation"
                           placeholder="新しいパスワードの再入力" />
                     </div>

                     <button class="c-btn p-changePass__submitBtn" type="submit">変更する</button>
                  </form>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
