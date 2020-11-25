@extends('layouts.app')
@section('title', 'プロフィール')

@section('content')
<main class="l-main p-profile">
   <div class="container">
      <h1 class="c-h1__head">プロフィール</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         <sidebar-component></sidebar-component>

         <div class="l-main__mainArea -twoColumns">
            <!-- 新着通知 -->
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-profile__proBody">
                  <div class="p-profile__proFirst">
                     <img
                        class="c-img p-profile__proImg"
                        src="{{ asset('../images/home_img.jpg') }}"
                        alt="ユーザーの画像" />
                     <div class="p-profile__proName">山田 太郎</div>
                  </div>
                  <div class="p-profile__proSecond">
                     <div class="p-profile__proResult">
                        <div class="p-profile__proResultHead">実績</div>
                        <table class="p-profile__proResultBody">
                           <tr>
                              <th>発注実績</th>
                              <td>1件</td>
                           </tr>
                           <tr>
                              <th>受注実績</th>
                              <td>1件</td>
                           </tr>
                        </table>
                     </div>
                     <div class="p-profile__proIntroduce">
                        <div class="p-profile__proIntroduceHead">自己紹介</div>
                        <div class="p-profile__proIntroduceBody">
                           テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
                        </div>
                     </div>
                  </div>
               </div>
            </section>

            <!-- 発注した案件 -->
            <workcard-area-section head="応募中の仕事"></workcard-area-section>
         </div>
      </div>
   </div>
</main>
@endsection
