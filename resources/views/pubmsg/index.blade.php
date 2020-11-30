@extends('layouts.app')
@section('title', 'パブリックメッセージ一覧')

@section('content')
<main class="l-main p-pubmsgList">
   <div class="container">
      <h1 class="c-h1__head">パブリックメッセージ一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec p-pubmsgList__sec">
               @foreach ( $pubmsgs as $pubmsg )
               <!-- ダイレクトメッセージ一覧 -->
               <a class="c-card c-msgCard" href="{{url('works/'.$pubmsg->work_id.'#pub-msg')}}">
                  <div class=" c-pubMsgCard__infoWrap">
                     <div class="c-pubMsgCard__basicInfo">
                        {{$pubmsg->user_name}} / {{$pubmsg->work_name}}
                     </div>
                     <time class="c-pubMsgCard__msgTime">{{$pubmsg->latest_date}}</time>
                  </div>
                  <div class="c-pubMsgCard__msgTitle">
                     {{$pubmsg->title}}
                  </div>
                  <div class="c-pubMsgCard__pubMsg">
                     {{$pubmsg->latest_content}}
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
