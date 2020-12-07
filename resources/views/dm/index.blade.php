@extends('layouts.app')
@section('title', 'DM一覧')

@section('content')
<main class="l-main p-dmList">
   <div class="container">
      <h1 class="c-h1__head">ダイレクトメッセージ一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         <div class="l-main__mainArea -twoColumns">
            <direct-messages-list-component
               :public-path="{{json_encode(asset(''))}}"
               :auth-id="{{Auth::id()}}">
            </direct-messages-list-component>
         </div>
      </div>
   </div>
</main>
@endsection
