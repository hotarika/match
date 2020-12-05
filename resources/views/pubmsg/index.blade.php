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
            <public-messages-list
               :public-path="{{json_encode(asset(''))}}"></public-messages-list>
            {{-- <section class="c-h2__sec p-pubmsgList__sec">
               @foreach ( $pubmsgs as $pubmsg )
               <!-- ダイレクトメッセージ一覧 -->
               <a class="c-card c-msgCard" href="{{url('works/'.$pubmsg->w_id.'#pub-msg')}}">
            <div class=" c-pubMsgCard__infoWrap">
               <div class="c-pubMsgCard__basicInfo">
                  {{$pubmsg->u_name}} / {{$pubmsg->w_name}}
               </div>
               <time class="c-pubMsgCard__msgTime">{{$pubmsg->cm_latest_date}}</time>
            </div>
            <div class="c-pubMsgCard__msgTitle">
               {{$pubmsg->pm_title}}
            </div>
            <div class="c-pubMsgCard__pubMsg">
               {{$pubmsg->cm_latest_content}}
            </div>
            </a>
            @endforeach
            </section> --}}
         </div>
      </div>
   </div>
</main>
@endsection
