{{-- 仕事詳細（url の works/*）は、サイドバーの他に、設定メニューを配置する必要があり、直接仕事詳細で<aside>が定義されているため不要 --}}

@if(
!Request::is('works/*') ||
Request::is('works/*/edit') ||
Request::is('works/create'))
<aside class="l-side">
   @endif

   <ul class="p-side__lists">
      <a class="c-btn p-side__link @if(Request::is('mypage')) is-active @endif" href="{{ route('mypage') }}">
         <li><i class="fas fa-user"></i><span class="u-ml4">マイページ</span></li>
      </a>
      <a class="c-btn p-side__link @if(Request::is('parent-pubmsgs')) is-active @endif"
         href="{{route('parent-pubmsgs.index')}}">
         <li><i class="fas fa-users"></i><span>パブリックメッセージ</span></li>
      </a>
      <a class="c-btn p-side__link @if(Request::is('dm')) is-active @endif" href="{{route('dm.index')}}">
         <li><i class="fas fa-comments"></i><span>ダイレクトメッセージ</span></li>
      </a>
      <a class="c-btn p-side__link" href="{{route('users.edit', Auth::id())}}">
         <li><i class="fas fa-cog"></i><span class="u-ml2">アカウント設定</span></li>
      </a>
   </ul>

   @if(
   !Request::is('works/*') ||
   Request::is('works/*/edit') ||
   Request::is('works/create'))
</aside>
@endif
