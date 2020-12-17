@extends('layouts.app')
@section('title', 'プロフィール')

@section('content')
<main class="l-main p-profile">
   <div class="container">
      <h1 class="c-h1__head">プロフィール</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         <div class="l-main__mainArea -twoColumns">
            <!-- 新着通知 -->
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-profile__proBody">
                  <div class="p-profile__proFirst">
                     <img
                        class="c-img p-profile__proImg"
                        @if($user->image === null)
                     src="{{asset('images/no-image.png')}}"
                     @else
                     src="{{ asset('storage/user_img/'.$user->image) }}"
                     @endif
                     alt="ユーザーの画像" />
                  </div>
                  <div class="p-profile__proSecond">
                     {{-- 名前 --}}
                     <div class="p-profile__proNameWrap">
                        <div class="p-profile__proNameHead">名前</div>
                        <div class="p-profile__proName">{{$user->name}}</div>
                     </div>

                     {{-- 実績 --}}
                     <div class="p-profile__proResult">
                        <div class="p-profile__proResultHead">実績</div>
                        <table class="p-profile__proResultBody">
                           <tr>
                              <th>発注実績</th>
                              <td>{{$ordersCount}} 件</td>
                           </tr>
                           <tr>
                              <th>受注実績</th>
                              <td>{{$ordersReceivedCount}} 件</td>
                           </tr>
                        </table>
                     </div>

                     {{-- 自己紹介 --}}
                     <div class="p-profile__proIntroduction">
                        <div class="p-profile__proIntroductionHead">自己紹介</div>
                        <pre class="p-profile__proIntroductionBody">{{$user->introduction}}</pre>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
