@extends('layouts.app')
@section('title', 'ホーム')

@section('content')
<main class="l-main p-dm">
   <div class="container">
      <h1 class="c-h1__head p-dm__h1">ダイレクトメッセージ</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         <sidebar-component></sidebar-component>
         <div class="l-main__mainArea -twoColumns">
            <!-- ダイレクトメッセージ -->
            <dm-component></dm-component>
         </div>
      </div>
   </div>
</main>
@endsection
