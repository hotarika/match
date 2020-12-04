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
            <!-- 新着通知 -->
            <notification-component :public_path="{{ json_encode(asset('')) }}"
               :notification="{{json_encode($notification)}}">
            </notification-component>
            {{-- --------------------------------- --}}
            {{-- 発注した仕事                        --}}
            {{-- --------------------------------- --}}
            <section class="c-h2__sec">
               <h2 class="c-h2__head">発注した仕事</h2>
               <div class="c-h2__workCardBody p-mypage__secBody">
                  @forelse ($owner_works as $work)
                  <a class="c-workCard" href="{{route('works.show',$work->work_id)}}">
                     <div class="c-workCard__nameWrap">
                        <img class="c-img c-workCard__img" src="{{url('storage/user_img/'.$work->image)}}"
                           alt="ユーザーのアイコン" />
                        <span class="c-workCard__name">{{$work->user_name}}</span>
                     </div>

                     <div class="c-workCard__head">
                        {{$work->work_name}}
                     </div>
                     @if($work->contract_id === 1)
                     <!-- 単発案件 -->
                     <div class="c-workCard__contract">
                        <div class="c-workCard__contractIconWrap">
                           <i class="fas fa-male c-workCard__contractIcon -oneoff"></i>
                        </div>
                        <div class="c-workCard__contractWayWrap">
                           <div class="c-workCard__contractWay">単発案件</div>
                           <div class="c-workCard__contractPrice">{{$work->price_lower}}~{{$work->price_upper}}千円</div>
                        </div>
                     </div>
                     @endif
                     @if($work->contract_id === 2)
                     <!-- レベニューシェア -->
                     <div class="c-workCard__contract">
                        <div class="c-workCard__contractIconWrap">
                           <i class="fas fa-people-arrows c-workCard__contractIcon -share"></i>
                        </div>
                        <div class="c-workCard__contractWayWrap">
                           <div class="c-workCard__contractWay -share">レベニューシェア</div>
                        </div>
                     </div>
                     @endif
                     <!-- その他情報 -->
                     <div class="c-workCard__info">
                        <div class="c-workCard__infoItem">
                           <div class="c-workCard__infoItemHead">締め切り日：</div>
                           <span class="c-workCard__endDate">{{$work->end_date}}</span>
                        </div>
                     </div>
                  </a>
                  @empty
                  <div class="c-h2__noItems -order">
                     発注している仕事はありません。
                  </div>
                  @endforelse
               </div>
            </section>


            {{-- --------------------------------- --}}
            {{-- 応募中の仕事                        --}}
            {{-- --------------------------------- --}}
            <section class="c-h2__sec">
               <h2 class="c-h2__head">応募中の仕事</h2>
               <div class="c-h2__workCardBody p-mypage__secBody">

                  @forelse ($order_works as $work)
                  <a class="c-workCard" href="work-detail">
                     <div class="c-workCard__nameWrap">
                        <img class="c-img c-workCard__img" src="{{url('storage/user_img/'.$work->image)}}"
                           alt="ユーザーのアイコン" />
                        <span class="c-workCard__name">{{$work->user_name}}</span>
                     </div>

                     <div class="c-workCard__head">
                        {{$work->work_name}}
                     </div>
                     <!-- 単発案件 -->
                     @if($work->contract_id === 1)
                     <div class="c-workCard__contract">
                        <div class="c-workCard__contractIconWrap">
                           <i class="fas fa-male c-workCard__contractIcon -oneoff"></i>
                        </div>
                        <div class="c-workCard__contractWayWrap">
                           <div class="c-workCard__contractWay">単発案件</div>
                           <div class="c-workCard__contractPrice">{{$work->price_lower}}~{{$work->price_upper}}千円</div>
                        </div>
                     </div>
                     @endif

                     <!-- レベニューシェア -->
                     @if($work->contract_id === 2)
                     <div class="c-workCard__contract">
                        <div class="c-workCard__contractIconWrap">
                           <i class="fas fa-people-arrows c-workCard__contractIcon -share"></i>
                        </div>
                        <div class="c-workCard__contractWayWrap">
                           <div class="c-workCard__contractWay -share">レベニューシェア</div>
                        </div>
                     </div>
                     @endif

                     <!-- その他情報 -->
                     <div class="c-workCard__info">
                        <div class="c-workCard__infoItem">
                           <div class="c-workCard__infoItemHead">締め切り日：</div>
                           <span class="c-workCard__endDate">{{$work->end_date}}</span>
                        </div>
                     </div>
                  </a>
                  @empty
                  <div class="c-h2__noItems -apply">
                     応募中の仕事はありません。
                  </div>
                  @endforelse
               </div>
            </section>

            {{-- --------------------------------- --}}
            {{-- パブリックメッセージ                  --}}
            {{-- --------------------------------- --}}
            <!-- パブリックメッセージ -->
            <section class="c-h2__sec">
               <a class="c-btn c-h2__seeMore" href="work-detail#pub-msg">
                  <i class="fas fa-chevron-right"></i>
               </a>
               <h2 class="c-h2__head">パブリックメッセージ</h2>
               <div class="c-h2__body p-mypage__secBody">
                  @forelse ( $pubmsgs as $pubmsg )
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
                  @empty
                  <div class="c-h2__noItems -pubmsg">
                     パブリックメッセージはありません。
                  </div>
                  @endforelse
               </div>
            </section>

            {{-- --------------------------------- --}}
            {{-- ダイレクトメッセージ                  --}}
            {{-- --------------------------------- --}}

            <section class="c-h2__sec">
               <a class="c-btn c-h2__seeMore" href="dm-list">
                  <i class="fas fa-chevron-right"></i>
               </a>
               <h2 class="c-h2__head">ダイレクトメッセージ</h2>
               <div class="c-h2__body p-mypage__secBody">
                  <!-- ダイレクトメッセージ一覧 -->
                  @forelse ($boards as $board)
                  <a class="c-card c-msgCard c-dmMsgCard__msgItem" href="{{route('dm.show',$board->id)}}">
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
