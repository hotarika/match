@extends('layouts.app')
@section('title', 'プロフィール編集')

@section('content')
<main class="l-main p-profileEdit">
   <div class="container">
      <h1 class="c-h1__head">プロフィール編集</h1>
      <div class="l-main__mainAreaWrap">
         {{-- サイドバー --}}
         @include('components/sidebar-settings')

         {{-- メインエリア --}}
         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-profileEdit__body">
                  <form class="p-profileEdit__form" action="" enctype="multipart/form-data">
                     <!-- 画像 -->
                     <image-edit-component></image-edit-component>

                     <!-- 名前 -->
                     <div class="p-profileEdit__wrap -name">
                        <label class="p-profileEdit__label -name" for="name">名前<span>[必須]</span></label>
                        <div class="p-profileEdit__inputWrap">
                           <input
                              id="name"
                              class="c-form__input p-profileEdit__input -name"
                              type="text"
                              name="name"
                              value=""
                              required
                              autofocus
                              autocomplete="name"

                              placeholder="名前を記入" />
                           <span class="c-form__invalid is-invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                        </div>
                     </div>

                     <!-- メールアドレス -->
                     <div class="p-profileEdit__wrap -email">
                        <label class="p-profileEdit__label -email" for="email">メールアドレス<span>[必須]</span></label>
                        <div class="p-profileEdit__inputWrap">
                           <input
                              id="email"
                              class="c-form__input p-profileEdit__input -email"
                              type="email"
                              name="email"
                              required
                              autocomplete="email"
                              placeholder="メールアドレスを記入" />
                           <span class="c-form__invalid is-invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                        </div>
                     </div>

                     <!-- 自己紹介 -->
                     <div class="p-profileEdit__wrap -introduce">
                        <label class="p-profileEdit__label -introduce" for="introduce">自己紹介文</label>
                        <div class="p-profileEdit__inputWrap">
                           <textarea
                              id="introduce"
                              class="c-form__textarea p-profileEdit__textarea"
                              name="introduce"
                              cols="30"
                              rows="10"
                              placeholder="自己紹介文を記入"></textarea>
                        </div>
                     </div>
                     <button class="c-btn p-profileEdit__editBtn" type="submit">編集する</button>
                  </form>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
