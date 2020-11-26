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
                  <form class="p-changePass__form" action="">
                     <!-- 現在のパスワード -->
                     <div class="p-changePass__inputWrap -currentPass">
                        <input
                           id="current-pass"
                           class="c-form__input p-changePass__input -currentPass"
                           type="password"
                           name="current-pass"
                           required
                           autofocus
                           autocomplete="current-password"
                           placeholder="現在のパスワード" />
                        <span class="c-form__invalid is-invalid" role="alert">
                           <strong>入力してください</strong>
                        </span>
                     </div>

                     <!-- 現在のパスワード -->
                     <div class="p-changePass__inputWrap -newPass">
                        <input
                           id="new-pass"
                           class="c-form__input p-changePass__input -newPass"
                           type="password"
                           name="new-pass"
                           required
                           placeholder="新しいパスワード" />
                        <span class="c-form__invalid is-invalid" role="alert">
                           <strong>入力してください</strong>
                        </span>
                     </div>

                     <!-- 現在のパスワード -->
                     <div class="p-changePass__inputWrap -confirmPass">
                        <input
                           id="confirm-pass"
                           class="c-form__input p-changePass__input -confirmPass"
                           type="password"
                           name="confirm-pass"
                           required
                           placeholder="新しいパスワードの再入力" />
                        <span class="c-form__invalid is-invalid" role="alert">
                           <strong>入力してください</strong>
                        </span>
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
