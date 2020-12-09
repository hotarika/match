@extends('layouts.app')
@section('title', 'パスワードリセット ')

@section('content')
<main class="l-main p-passEmail">
   <div class="container">
      <div class="l-main__mainArea -oneColumn_auth">
         <section class="c-h2__sec">
            <div class="row justify-content-center">
               <h2 class="c-h2__head">パスワードをリセット</h2>
               <div class="c-h2__oneRowBody p-passEmail__body">
                  @if (session('status'))
                  <div class="p-passEmail__resetMsg" role="alert">
                     {{ session('status') }}
                  </div>
                  @endif
                  <form method="POST" action="{{ route('password.email') }}">
                     @csrf
                     <div class="p-passEmail__inputWrap">
                        <input
                           id="email"
                           type="email"
                           class="c-form__input @error('email') is-invalid @enderror"
                           name="email"
                           value="{{ old('email') }}"
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
                     <button type="submit" class="c-btn c-authSendBtn">リセット</button>
                  </form>
               </div>

            </div>
         </section>
      </div>
   </div>
</main>
@endsection
