<header class="l-header" id="header">
   <div class="container">
      <div class="p-header">

         <!-- ロゴ -->
         <a class="p-header__logo"
            @guest href="{{route('home')}}"
            @else href="{{route('mypage')}}"
            @endguest>
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

         {{-- ナビゲーション --}}
         <div class="p-header__rightWrap">
            <!-- ログイン後 -->
            <nav class="p-header__nav js-nav">
               <i class="far fa-times-circle p-header__menuClose js-closeIcon"></i>
               <ul class="p-header__items">

                  {{-- スマホのみ表示（仕事詳細の設定） --}}
                  @if(
                  !Request::is('works/create') &&
                  !Request::is('works/*/edit') &&
                  Request::is('works/*') &&
                  $work->orderer_id === Auth::id()
                  )
                  <div class="p-header__orderMenuWrap">
                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="{{route('applicants.show',$work->w_id)}}">
                           <i class="fas fa-list-alt p-header__navIcon"></i>
                           <div class="p-header__navName u-ml2">応募者一覧</div>
                        </a>
                     </li>

                     <!-- スマホのみ表示 -->
                     <li class="p-header__item -sp">
                        <a class="c-link p-header__navLink" href="{{ route('works.edit', $work->w_id) }}">
                           <i class="fas fa-edit p-header__navIcon"></i>
                           <div class="p-header__navName">編集</div>
                        </a>
                     </li>
                     <hr class="p-header__navHr" />
                  </div>
                  @endif

                  <!-- 全ての端末で表示 -->
                  <li class="p-header__item -user">
                     <a class="c-link p-header__navLink -user" href="{{ route('users.show',Auth::id()) }}">
                        <img class="c-img p-header__userImg"
                           @if(Auth::user()->image === null)
                        src="{{asset('images/no-image.png')}}"
                        @else
                        src="{{asset('storage/user_img/'.Auth::user()->image)}}"
                        @endif
                        alt="">
                        <div class="p-header__navName -user u-ml4">{{Auth::user()->name}}</div>
                     </a>
                  </li>

                  <!-- 全ての端末で表示 -->
                  <li class="p-header__item">
                     <a class="c-link p-header__navLink" href="{{ route('works.index') }}">
                        <i class="fas fa-list p-header__navIcon -workList"></i>
                        <div class="p-header__navName u-ml4">仕事一覧</div>
                     </a>
                  </li>

                  <!-- 全ての端末で表示 -->
                  <li class="p-header__item">
                     <a class="c-link p-header__navLink" href="{{ route('mypage') }}">
                        <i class="fas fa-user p-header__navIcon -mypage"></i>
                        <div class="p-header__navName u-ml4">マイページ</div>
                     </a>
                  </li>

                  <!-- 全ての端末で表示 -->
                  <notifications-badge-component
                     :public-path="{{ json_encode(asset('')) }}"
                     :mypage-url="{{json_encode(route('mypage'))}}">
                  </notifications-badge-component>

                  <!-- スマホのみ表示 -->
                  <li class="p-header__item -sp">
                     <a class="c-link p-header__navLink" href="{{ route('pubmsgs.index') }}">
                        <i class="fas fa-users p-header__navIcon"></i>
                        <div class="p-header__navName">パブリックメッセージ</div>
                        <public-messages-badge-in-sidebar-component
                           :public-path="{{json_encode(asset(''))}}">
                        </public-messages-badge-in-sidebar-component>
                     </a>
                  </li>

                  <!-- スマホのみ表示 -->
                  <li class="p-header__item -sp">
                     <a class="c-link p-header__navLink" href="{{ route('dm-boards.index') }}">
                        <i class="fas fa-comments p-header__navIcon"></i>
                        <div class="p-header__navName u-ml2">ダイレクトメッセージ</div>
                        <direct-messages-badge-in-sidebar-component
                           :public-path="{{json_encode(asset(''))}}">
                        </direct-messages-badge-in-sidebar-component>
                     </a>
                  </li>

                  <!-- スマホのみ表示 -->
                  <li class="p-header__item -sp">
                     <a class="c-link p-header__navLink" href="{{route('sp-settings-menu')}}">
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
            <img class="p-header__menuOpen js-openIcon" src="{{asset('images/icon/bars-solid.svg')}}"
               alt="ハンバーガーメニュー" />
         </div>
         @endguest
      </div>
   </div>
</header>
