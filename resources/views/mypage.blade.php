@extends('layouts.app')
@section('title', 'マイページ')

@section('content')
<main class="l-main p-mypage">
   <div class="container">
      <h1 class="c-h1__head">マイページ</h1>
      <div class="l-main__mainAreaWrap">
         {{-- サイドバー --}}
         @include('components/sidebar')

         {{-- メインエリア --}}
         <div class="l-main__mainArea -twoColumns">
            {{-- --------------------------------- --}}
            {{-- 試着通知                            --}}
            {{-- --------------------------------- --}}
            <notifications-list-component
               :public_path="{{ json_encode(asset('')) }}"
               :notification="{{json_encode($notification)}}">
            </notifications-list-component>

            {{-- --------------------------------- --}}
            {{-- 発注した仕事                        --}}
            {{-- --------------------------------- --}}
            <works-list-of-order-in-mypage-component
               :public-path="{{ json_encode(asset('')) }}">
            </works-list-of-order-in-mypage-component>

            {{-- --------------------------------- --}}
            {{-- 応募中の仕事                        --}}
            {{-- --------------------------------- --}}
            <works-list-of-application-in-mypage-component
               :public-path="{{ json_encode(asset('')) }}">
            </works-list-of-application-in-mypage-component>

            {{-- --------------------------------- --}}
            {{-- パブリックメッセージ                  --}}
            {{-- --------------------------------- --}}
            <public-messages-list-in-mypage-component
               :public-path="{{ json_encode(asset('')) }}"
               :auth-id="{{Auth::id()}}">
            </public-messages-list-in-mypage-component>

            {{-- --------------------------------- --}}
            {{-- ダイレクトメッセージ                  --}}
            {{-- --------------------------------- --}}
            <direct-messages-list-in-mypage-component
               :public-path="{{ json_encode(asset('')) }}"
               :auth-id="{{Auth::id()}}">
            </direct-messages-list-in-mypage-component>
         </div>
      </div>
   </div>
</main>
@endsection
