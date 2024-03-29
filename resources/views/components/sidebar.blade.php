{{-- 仕事詳細画面（url の works/*）は、サイドバーの他に、設定メニューを配置する必要があり、直接仕事詳細で<aside>が定義されているため不要 --}}

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
      <a class="c-btn p-side__link @if(Request::is('pubmsgs')) is-active @endif"
         href="{{route('pubmsgs.index')}}">
         <li><i class="fas fa-users"></i><span>パブリックメッセージ</span></li>
         <public-messages-badge-in-sidebar-component
            :public-path="{{json_encode(asset(''))}}">
         </public-messages-badge-in-sidebar-component>
      </a>
      <a class="c-btn p-side__link @if(Request::is('dm-boards')) is-active @endif" href="{{route('dm-boards.index')}}">
         <li><i class="fas fa-comments"></i><span>ダイレクトメッセージ</span></li>
         <direct-messages-badge-in-sidebar-component
            :public-path="{{json_encode(asset(''))}}">
         </direct-messages-badge-in-sidebar-component>
      </a>
      <a class="c-btn p-side__link" href="{{route('users.edit', (Auth::id())?? '')}}">
         <li><i class="fas fa-cog"></i><span class="u-ml2">アカウント設定</span></li>
      </a>
   </ul>

   @if(
   !Request::is('works/*') ||
   Request::is('works/*/edit') ||
   Request::is('works/create'))
</aside>
@endif
