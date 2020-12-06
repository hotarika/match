@extends('layouts.app')
@section('title', 'マイページ')

@section('content')
<main class="l-main p-mypage">
   <div class="container">
      <h1 class="c-h1__head">マイページ</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         {{-- メインエリア --}}
         <div class="l-main__mainArea -twoColumns">
            {{-- --------------------------------- --}}
            {{-- 試着通知                            --}}
            {{-- --------------------------------- --}}
            <notification-component
               :public_path="{{ json_encode(asset('')) }}"
               :notification="{{json_encode($notification)}}">
            </notification-component>

            {{-- --------------------------------- --}}
            {{-- 発注した仕事                        --}}
            {{-- --------------------------------- --}}
            <works-list-of-order-in-mypage-component
               :public-path="{{ json_encode(asset('')) }}">
            </works-list-of-order-in-mypage-component>

            {{-- --------------------------------- --}}
            {{-- 応募中の仕事                        --}}
            {{-- --------------------------------- --}}
            <works-list-of-contract-in-mypage-component
               :public-path="{{ json_encode(asset('')) }}">
            </works-list-of-contract-in-mypage-component>

            {{-- --------------------------------- --}}
            {{-- パブリックメッセージ                  --}}
            {{-- --------------------------------- --}}
            <public-messages-list-in-mypage-component
               :public-path="{{ json_encode(asset('')) }}">
            </public-messages-list-in-mypage-component>

            {{-- --------------------------------- --}}
            {{-- ダイレクトメッセージ                  --}}
            {{-- --------------------------------- --}}
            <section class="c-h2__sec">
               <a class="c-btn c-h2__seeMore" href="{{route('dm-boards.index')}}">
                  <i class="fas fa-chevron-right"></i>
               </a>
               <h2 class="c-h2__head">ダイレクトメッセージ</h2>
               <div class="c-h2__body p-mypage__secBody">
                  <!-- ダイレクトメッセージ一覧 -->
                  @forelse ($boards as $board)
                  <a class="c-card c-msgCard c-dmMsgCard__msgItem" href="{{route('dm-contents.show',$board->id)}}">
                     <img class="c-img c-dmMsgCard__userImg" src={{asset('storage/user_img/'.$board->image)}}
                        alt="ユーザーの画像" />
                     <div class="c-dmMsgCard__mainAreaWrap">
                        <div class="c-dmMsgCard__infoWrap">
                           <div class="c-dmMsgCard__basicInfo">{{$board->user_name}} / {{$board->work_name}}</div>
                           <time class="c-dmMsgCard__time">{{$board->latest_date}}</time>
                        </div>
                        <div class="c-dmMsgCard__dm">
                           {{$board->latest_content}}
                        </div>
                     </div>
                  </a>
                  @empty
                  <div class="c-h2__noItems -dm">
                     ダイレクトメッセージはありません。
                  </div>
                  @endforelse
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
