@extends('layouts.app')
@section('title', 'パブリックメッセージ一覧')

@section('content')
<main class="l-main p-pubmsgList">
   <div class="container">
      <h1 class="c-h1__head">パブリックメッセージ一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         <div class="l-main__mainArea -twoColumns">
            <public-messages-list
               :public-path="{{json_encode(asset(''))}}"></public-messages-list>

         </div>
      </div>
   </div>
</main>
@endsection
