{{-- PC用アカウント設定 --}}
{{-- PC用とスマホ用の「アカウント設定」はレスポンシブ対応のため、別々に設定してあります。もし追加が必要な場合は、「sp-settings-menu.blade.php」にも同様の記述をする必要があります。 --}}
<aside class="l-side">
   <ul class="p-side__lists">
      <li>
         <a class="c-btn p-side__link @if(Request::is('*/edit')) is-active @endif"
            href="{{ route('users.edit', Auth::id()) }}"><i
               class="fas fa-address-card"></i><span>プロフィール編集</span></a>
      </li>
      <li>
         <a class="c-btn p-side__link @if(Request::is('password/change')) is-active @endif"
            href="{{ route('password.form') }}"><i class="fas fa-id-badge u-ml2"></i><span
               class="u-ml3">パスワード変更</span></a>
      </li>
   </ul>
</aside>
