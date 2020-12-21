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
                     @error('image')
                     <div class="c-form__invalid -image" role="alert">
                        <strong>{{$message}}</strong>
                     </div>
                     @enderror
                     <edit-image-component
                        :public-path="{{ json_encode(asset('')) }}"
                        :user-image="{{json_encode($user->image)}}">
                     </edit-image-component>

                     <!-- 名前 -->
                     <div class="p-profileEdit__wrap -name">
                        <label class="p-profileEdit__label -name" for="name">名前<span>[必須]</span></label>
                        <div class="p-profileEdit__inputWrap">
                           <span class="c-form__description">※ 20文字以内</span>
                           <input
                              id="name"
                              class="c-form__input @error('name') is-invalid @enderror"
                              type="text"
                              name="name"
                              value="{{old('name',$user->name ?? '')}}"
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
                           <span class="c-form__description -empty"></span>
                           <input
                              id="email"
                              class="c-form__input @error('email') is-invalid @enderror"
                              type="email"
                              name="email"
                              value="{{old('email',$user->email ?? '')}}"
                              autocomplete="email"
                              placeholder="メールアドレスを記入" />
                           @error('email')
                           <span class="c-form__invalid" role="alert">
                              <strong>{{$message}}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 自己紹介 -->
                     <div class="p-profileEdit__wrap -introduction">
                        <label class="p-profileEdit__label -introduction"
                           for="introduction">自己紹介文<span>[任意]</span></label>
                        <div class="p-profileEdit__inputWrap">
                           <span class="c-form__description">※ 3000文字以内</span>
                           <textarea
                              id="introduction"
                              class="c-form__textarea p-profileEdit__textarea @error('introduction') is-invalid @enderror"
                              name="introduction"
                              cols="30"
                              rows="20"
                              placeholder="自己紹介文を記入">{{old('introduction',$user->introduction ?? '')}}</textarea>
                           @error('introduction')
                           <span class="c-form__invalid" role="alert">
                              <strong>{{$message}}</strong>
                           </span>
                           @enderror
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
