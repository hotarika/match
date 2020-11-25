@extends('layouts.app')
@section('title', 'マイページ')

@section('content')
<main class="l-main p-mypage">
   <div class="container">
      <h1 class="c-h1__head">マイページ</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         <sidebar-component></sidebar-component>

         <div class="l-main__mainArea -twoColumns">
            {{-- 仕事カードセクション --}}
            <workcard-area-section head="履歴 - 発注した仕事"></workcard-area-section>

            <!-- ページネーション -->
            <pagination-component></pagination-component>
         </div>
      </div>
   </div>
</main>
@endsection
