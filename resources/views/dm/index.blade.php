@extends('layouts.app')
@section('title', 'DM一覧')

@section('content')
<main class="l-main p-dmList">
   <div class="container">
      <h1 class="c-h1__head">ダイレクトメッセージ一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec p-dmList__sec">
               <!-- ダイレクトメッセージ一覧 -->
               @foreach ($boards as $board)
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
               @endforeach
            </section>

            <!-- ページネーション -->
            {{-- @include('components/pagination') --}}
         </div>
      </div>
   </div>
</main>
@endsection
