@extends('layouts.app')
@section('title', 'パブリックメッセージ一覧')

@section('content')
<main class="l-main p-dmLists">
   <div class="container">
      <h1 class="c-h1__head">パブリックメッセージ一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         <sidebar-component></sidebar-component>

         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec">
               <!-- ダイレクトメッセージ一覧 -->
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>
               <pubmsg-card-component></pubmsg-card-component>

               <!-- ページネーション -->
               <pagination-component></pagination-component>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
