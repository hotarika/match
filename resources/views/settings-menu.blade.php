@extends('layouts.app')
@section('title', '設定メニュー')

@section('content')
<main class="l-main">
   <div class="container">
      <h1 class="c-h1__head">アカウント設定</h1>
      <div class="l-main__mainAreaWrap">
         <div class="l-main__mainArea -settings">
            <!-- 新着通知 -->
            <section class="c-h2__sec">
               <aside class="l-side -settings">
                  <ul class="p-side__lists -settings">
                     <li>
                        <a class="c-btn p-side__link -settings" href="{{route('users.edit', 1)}}"><i
                              class="fas fa-address-card"></i><span>プロフィール編集</span></a>
                     </li>
                     <li>
                        <a class="c-btn p-side__link -settings" href="{{route('change-pass', 1)}}"><i
                              class="fas fa-id-badge u-ml2"></i><span class="u-ml3">パスワード変更</span></a>
                     </li>
                  </ul>
               </aside>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
