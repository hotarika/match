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
                  <form method="POST" class="p-profileEdit__form" action="{{route('users.update',Auth::id())}}"
                     enctype="multipart/form-data">
                     @csrf
                     @method('PUT')

                     <!-- 画像 -->
                     <image-edit-component :public_path="{{ json_encode(asset('')) }}"
                        :image_path="{{json_encode(asset('/storage/user_img/'. $user->image))}}"></image-edit-component>

                     <!-- 名前 -->
                     <div class="p-profileEdit__wrap -name">
                        <label class="p-profileEdit__label -name" for="name">名前<span>[必須]</span></label>
                        <div class="p-profileEdit__inputWrap">
                           <input
                              id="name"
                              class="c-form__input p-profileEdit__input -name"
                              type="text"
                              name="name"
                              value="{{$user->name}}"
                              required
                              autofocus
                              autocomplete="name"
                              placeholder="名前を記入" />
                           @error('name')
                           <span class="c-form__invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                           @enderror
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
                              value="{{$user->email}}"
                              required
                              autocomplete="email"
                              placeholder="メールアドレスを記入" />
                           @error('email')
                           <span class="c-form__invalid is-invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                           @enderror
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
                              placeholder="自己紹介文を記入">{{$user->introduce}}</textarea>
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
