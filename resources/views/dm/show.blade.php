@extends('layouts.app')
@section('title', 'DM')

@section('content')
<main class="l-main p-dm">
   <div class="container">
      <h1 class="c-h1__head p-dm__h1">ダイレクトメッセージ</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         {{-- メインエリア --}}
         <div class="l-main__mainArea -twoColumns">
            <!-- ダイレクトメッセージ -->
            <dm-component
               :public_path="{{ json_encode(asset('')) }}"
               :contents="{{json_encode($contents)}}"
               :user_id="{{json_encode(Auth::id())}}" />
            </dm-component>
         </div>
      </div>
   </div>
</main>
@endsection
