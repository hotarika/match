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
                     @method('PUT')
                     @csrf

                     <!-- 画像 -->
                     <edit-image-component
                        :image-path="{{json_encode(asset('/storage/user_img/'. $user->image))}}"></edit-image-component>
                     @error('image')
                     <span class="c-form__invalid" role="alert">
                        <strong>{{$message}}</strong>
                     </span>
                     @enderror

                     <!-- 名前 -->
                     <div class="p-profileEdit__wrap -name">
                        <label class="p-profileEdit__label -name" for="name">名前<span>[必須]</span></label>
                        <div class="p-profileEdit__inputWrap">
                           <input
                              id="name"
                              class="c-form__input p-profileEdit__input -name"
                              type="text"
                              name="name"
                              value="{{old('name',$user->name ?? '')}}"
                              required
                              autofocus
                              autocomplete="name"
                              placeholder="名前を記入" />
                           @error('name')
                           <span class="c-form__invalid" role="alert">
                              <strong>{{$message}}</strong>
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
                              value="{{old('email',$user->email ?? '')}}"
                              required
                              autocomplete="email"
                              placeholder="メールアドレスを記入" />
                           @error('email')
                           <span class="c-form__invalid is-invalid" role="alert">
                              <strong>{{$message}}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 自己紹介 -->
                     <div class="p-profileEdit__wrap -introduction">
                        <label class="p-profileEdit__label -introduction" for="introduction">自己紹介文</label>
                        <div class="p-profileEdit__inputWrap">
                           <textarea
                              id="introduction"
                              class="c-form__textarea p-profileEdit__textarea"
                              name="introduction"
                              cols="30"
                              rows="10"
                              placeholder="自己紹介文を記入">{{old('introduction',$user->introduction ?? '')}}</textarea>
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
