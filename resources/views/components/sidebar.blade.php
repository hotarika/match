<aside class="l-side">
   <ul class="p-side__lists">
      <a class="c-btn p-side__link @if(Request::is('mypage')) is-active @endif" href="{{ route('mypage') }}">
         <li><i class="fas fa-user"></i><span class="u-ml4">マイページ</span></li>
      </a>
      <a class="c-btn p-side__link @if(Request::is('pubmsg')) is-active @endif" href="{{route('pubmsg.index')}}">
         <li><i class="fas fa-users"></i><span>パブリックメッセージ</span></li>
      </a>
      <a class="c-btn p-side__link @if(Request::is('dm')) is-active @endif" href="{{route('dm.index')}}">
         <li><i class="fas fa-comments"></i><span>ダイレクトメッセージ</span></li>
      </a>
      <a class="c-btn p-side__link" href="{{route('users.edit', Auth::id())}}">
         <li><i class="fas fa-cog"></i><span class="u-ml2">アカウント設定</span></li>
      </a>
   </ul>

</aside>
