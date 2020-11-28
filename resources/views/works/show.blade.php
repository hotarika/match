@extends('layouts.app')
@section('title', '仕事詳細')

@section('content')
<main class="l-main p-workDetail">
   <div class="container">
      <!-- 契約ボタン -->
      <div class="p-workDetail__contractBtnSec is-active">
         <p class="p-workDetail__contractMsg">
            現在応募している下記の案件にあなたが選ばれました！<br />契約するには、「契約する」ボタンを押してください。
         </p>
         <div class="p-workDetail__contractBtnWrap">
            <button
               class="c-btn p-workDetail__contractOkBtn"
               type="submit"
               onclick="confirm('契約します。よろしいですか？')">
               契約する
            </button>
            <button
               class="c-btn p-workDetail__contractNoBtn"
               type="submit"
               onclick="confirm('辞退します。よろしいですか？')">
               辞退する
            </button>
         </div>
      </div>

      <!-- 仕事詳細 -->
      <h1 class="c-h1__head">仕事詳細</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         {{-- メインエリア --}}
         <div class="l-main__mainArea -twoColumns">
            <!-- 仕事詳細 -->
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-workDetail__workBody">
                  <div class="p-workDetail__assetBtnWrap">
                     <!-- ツイートボタン  -->
                     <a
                        href="https://twitter.com/share?ref_src=twsrc%5Etfw"
                        class="twitter-share-button"
                        data-show-count="false"
                        data-lang="ja"
                        data-text="【match】カーナビシステムを作成した後に、業務システムを作成して欲しい"
                        data-url="http://localhost:8000/work-detail"
                        data-hashtags="match">Tweet</a>

                     <!-- お気に入りボタン -->
                     <favorite-component :public_path="{{ json_encode(asset('')) }}"
                        :work="{{json_encode($work)}}" :user_id="{{json_encode(Auth::id())}}"></favorite-component>
                  </div>

                  <!-- 仕事詳細説明 -->
                  <h2 class="c-h2__head p-workDetail__head">{{$work->work_name}}</h2>
                  <div class="p-workDetail__infoWrap">
                     <!-- 仕事情報 上部 -->
                     <div class="p-workDetail__startRecruitment">募集開始：<time>{{$work->created_at}}</time></div>
                     <div class="p-workDetail__infoUpper">
                        <div class="p-workDetail__infoUpperItem -left">
                           <span>依頼者：</span>
                           <div class="p-workDetail__userInfoWrap">
                              <img class="c-img p-workDetail__infoImg" :src="'../images/home_img.jpg'" alt="ユーザーの画像" />
                              <a href="profile" class="c-link p-workDetail__infoName">山田たろう</a>
                           </div>
                        </div>
                        <div class="p-workDetail__infoUpperItem -right">
                           <div class="p-workDetail__infoDate -endRecruitment">
                              <div class="p-workDetail__infoDateHead">募集終了</div>
                              <time>{{$work->end_date}}</time>
                           </div>
                           <div class="p-workDetail__infoDate -hopeDeadline">
                              <div class="p-workDetail__infoDateHead">希望納期</div>
                              <time>{{$work->hope_date}}</time>
                           </div>
                        </div>
                     </div>
                     <!-- 仕事情報 下部 -->
                     <div class="p-workDetail__infoLower">
                        <div class="p-workDetail__infoLowerItem -remainDate">
                           <div class="p-workDetail__infoLowerHead">残り日数</div>
                           <div class="p-workDetail__infoLowerBody">{{$work->remaining_date}}</div>
                        </div>
                        <div class="p-workDetail__infoLowerItem -contract">
                           <div class="p-workDetail__infoLowerHead">提携方法</div>
                           <!-- <div class="p-workDetail__infoLowerBody">レベニューシェア</div> -->
                           <div class="p-workDetail__infoLowerBody -contract">
                              <div class="p-workDetail__infoLowerBodyOneoff">{{$work->type}}</div>
                              @if($work->type==='単発案件')
                              <div class="p-workDetail__infoLowerBodyMoney">（{{$work->money_lower}} ~
                                 {{$work->money_upper}}千円）</div>
                              @endif
                           </div>
                        </div>
                        <div class="p-workDetail__infoLowerItem -appNum">
                           <div class="p-workDetail__infoLowerHead">応募人数</div>
                           <div class="p-workDetail__infoLowerBody">20000人</div>
                        </div>
                        <div class="p-workDetail__infoLowerItem -favNum">
                           <div class="p-workDetail__infoLowerHead">お気に入り人数</div>
                           <div class="p-workDetail__infoLowerBody">20000人</div>
                        </div>
                     </div>
                  </div>
                  <div class="p-workDetail__requestWrap">
                     <div class="p-workDetail__requestHead">依頼内容</div>
                     <p class="p-workDetail__requestBody">{{$work->content}}</p>
                  </div>
                  <button class="c-btn p-workDetail__appBtn" type="submit">応募する</button>
               </div>
            </section>

            <!-- パブリックメッセージ -->
            <pubmsg-area-section></pubmsg-area-section>
         </div>
      </div>
   </div>
</main>
@endsection
