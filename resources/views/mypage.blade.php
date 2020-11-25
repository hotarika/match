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
            <!-- 新着通知 -->
            <notification-component></notification-component>

            <!-- 発注した仕事 -->
            <section class="c-h2__sec">
               <a class="c-btn c-h2__seeMore" href="work-history.html">
                  <i class="fas fa-chevron-right"></i>
               </a>
               <h2 class="c-h2__head">発注中の仕事</h2>
               <div class="c-h2__workCardBody">
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
               </div>
            </section>

            <!-- 受注し仕事 -->
            <section class="c-h2__sec">
               <a class="c-btn c-h2__seeMore" href="work-history.html">
                  <i class="fas fa-chevron-right"></i>
               </a>
               <h2 class="c-h2__head">応募中の仕事</h2>
               <div class="c-h2__workCardBody">
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
                  <work-card-component></work-card-component>
               </div>
            </section>

            <!-- パブリックメッセージ -->
            <section class="c-h2__sec">
               <a class="c-btn c-h2__seeMore" href="work-detail.html#pub-msg">
                  <i class="fas fa-chevron-right"></i>
               </a>
               <h2 class="c-h2__head">パブリックメッセージ</h2>
               <div class="c-h2__body">
                  <pubmsg-card-component></pubmsg-card-component>
                  <pubmsg-card-component></pubmsg-card-component>
                  <pubmsg-card-component></pubmsg-card-component>
                  <pubmsg-card-component></pubmsg-card-component>
                  <pubmsg-card-component></pubmsg-card-component>
               </div>
            </section>

            <!-- ダイレクトメッセージ -->
            <section class="c-h2__sec">
               <a class="c-btn c-h2__seeMore" href="dm-list.html">
                  <i class="fas fa-chevron-right"></i>
               </a>
               <h2 class="c-h2__head">ダイレクトメッセージ</h2>
               <div class="c-h2__body">
                  <dm-list-component></dm-list-component>
                  <dm-list-component></dm-list-component>
                  <dm-list-component></dm-list-component>
                  <dm-list-component></dm-list-component>
                  <dm-list-component></dm-list-component>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
