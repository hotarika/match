<header class="l-header" id="header">
   <div class="container">
      <div class="p-header">
         <!-- ロゴ -->
         <a class="p-header__logo" href="/">
            <img src="{{ asset('images/logo/logo-blue.svg') }}" alt="ロゴ" />
         </a>

         {{-- 右側のアイテム --}}
         @guest
         <div class="p-header__rightWrap">
            <!-- ログイン前 -->
            <ul class="p-header__items -beforeLogin">
               <li class="p-header__item -beforeLogin">
                  <a class="c-link p-header__navLink -beforeLogin" href="{{route('login')}}">
                     ログイン
                  </a>
               </li>
               <li class="p-header__item -beforeLogin">
                  <a class="c-link p-header__navLink -beforeLogin" href="{{route('register')}}">
                     会員登録
                  </a>
               </li>
            </ul>
         </div>
         @else
         id-{{Auth::user()->id}} / 名前-{{Auth::user()->name}}
         {{-- ナビゲーション --}}
         <div class="p-header__rightWrap">
            <!-- ログイン後 -->
            <nav class="p-header__nav js-nav">
               <i class="far fa-times-circle p-header__menuClose js-closeIcon"></i>
               <ul class="p-header__items">
                  <div class="p-header__orderMenuWrap">
                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="{{ route('applicant') }}">
                           <i class="fas fa-list-alt p-header__navIcon"></i>
                           <div class="p-header__navName u-ml2">応募者一覧</div>
                        </a>
                     </li>
                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="{{ route('works.edit', 1) }}">
                           <i class="fas fa-edit p-header__navIcon"></i>
                           <div class="p-header__navName">編集</div>
                        </a>
                     </li>
                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="mypage">
                           <i class="fas fa-trash-alt p-header__navIcon"></i>
                           <div class="p-header__navName u-ml5">削除</div>
                        </a>
                     </li>
                     <hr class="p-header__navHr" />
                  </div>

                  <!-- 全ての端末で表示 -->
                  <li class="p-header__item">
                     <a class="c-link p-header__navLink" href="{{ route('works.index') }}">
                        <i class="fas fa-list p-header__navIcon"></i>
                        <div class="p-header__navName u-ml4">案件一覧</div>
                     </a>
                  </li>
                  <!-- 全ての端末で表示 -->
                  <li class="p-header__item">
                     <a class="c-link p-header__navLink" href="{{ route('mypage') }}">
                        <i class="fas fa-user p-header__navIcon"></i>
                        <div class="p-header__navName u-ml5">マイページ</div>
                     </a>
                  </li>
                  <!-- 全ての端末で表示 -->
                  <li class="p-header__item">
                     <a class="c-link p-header__navLink" href="{{ route('mypage') }}">
                        <span class="p-header__notificationNum">1</span>
                        <i class="fas fa-bell p-header__navIcon"></i>
                        <div class="p-header__navName u-ml6">新着通知</div>
                     </a>
                  </li>
                  <!-- スマホのみ表示 -->
                  <li class="p-header__item -sp">
                     <a class="c-link p-header__navLink" href="{{ route('works.index') }}">
                        <i class="fas fa-star p-header__navIcon"></i>
                        <div class="p-header__navName u-ml2">気になる案件</div>
                     </a>
                  </li>
                  <!-- スマホのみ表示 -->
                  <li class="p-header__item -sp">
                     <a class="c-link p-header__navLink" href="{{ route('pubmsg.index') }}">
                        <i class="fas fa-users p-header__navIcon"></i>
                        <div class="p-header__navName">パブリックメッセージ</div>
                     </a>
                  </li>
                  <!-- スマホのみ表示 -->
                  <li class="p-header__item -sp">
                     <a class="c-link p-header__navLink" href="{{ route('dm.index') }}">
                        <i class="fas fa-comments p-header__navIcon"></i>
                        <div class="p-header__navName u-ml2">ダイレクトメッセージ</div>
                     </a>
                  </li>
                  <!-- スマホのみ表示 -->
                  <li class="p-header__item -sp">
                     <a class="c-link p-header__navLink" href="{{route('settings-menu')}}">
                        <i class="fas fa-cog p-header__navIcon"></i>
                        <div class="p-header__navName u-ml4">アカウント設定</div>
                     </a>
                  </li>
                  <!-- 全ての端末で表示 -->
                  <li class="p-header__item">
                     <a
                        class="c-link p-header__navLink"
                        href=""
                        onclick="event.preventDefault(); document.querySelector('.js-click-logout').submit();">
                        <i class="fas fa-sign-out-alt p-header__navIcon"></i>
                        <div class="p-header__navName u-ml4">ログアウト</div>
                     </a>
                  </li>
                  <!-- 全ての端末で表示 -->
                  <li class="p-header__item -orderBtn">
                     <a href="{{ route('works.create') }}" class="p-header__orderBtn">仕事を依頼</a>
                  </li>
               </ul>
            </nav>
            <!-- <i class="fas fa-bars p-header__menuOpen js-openIcon"></i> -->
            <img class="p-header__menuOpen js-openIcon" :src="'/images/icon/bars-solid.svg'" alt="ハンバーガーメニュー" />
         </div>
         @endguest
      </div>
   </div>
</header>
