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
            <section class="c-h2__sec">
               <!-- ダイレクトメッセージ一覧 -->
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
               <dm-list-component></dm-list-component>
            </section>

            <!-- ページネーション -->
            @include('components/pagination')
         </div>
      </div>
   </div>
</main>
@endsection
