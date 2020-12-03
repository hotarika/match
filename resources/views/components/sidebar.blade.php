<aside class="l-side">
   <ul class="p-side__lists">
      <a class="c-btn p-side__link is-active" href="{{ route('mypage') }}">
         <li><i class="fas fa-user"></i><span class="u-ml4">マイページ</span></li>
      </a>
      <a class="c-btn p-side__link" href="{{route('pubmsg.index')}}">
         <li><i class="fas fa-users"></i><span>パブリックメッセージ</span></li>
      </a>
      <a class="c-btn p-side__link" href="{{route('dm.index')}}">
         <li><i class="fas fa-comments"></i><span>ダイレクトメッセージ</span></li>
      </a>
      <a class="c-btn p-side__link" href="{{route('users.edit',1)}}">
         <li><i class="fas fa-cog"></i><span class="u-ml2">アカウント設定</span></li>
      </a>
   </ul>
</aside>
