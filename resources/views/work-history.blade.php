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
            <!-- 発注した仕事 -->
            <section class="c-h2__sec">
               <h2 class="c-h2__head">履歴 - 発注した仕事</h2>
               <div class="c-h2__workCardBody">
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
               </div>
               <!-- ページネーション -->
               <pagination-component></pagination-component>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
