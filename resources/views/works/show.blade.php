@extends('layouts.app')
@section('title', '仕事詳細')

@section('content')
<main class="l-main p-workDetail">
   <div class="container">

      <!-- 仕事詳細 -->
      <h1 class="c-h1__head">仕事詳細</h1>
      <div class="l-main__mainAreaWrap">

         <!-- サイドバー -->
         <aside class="l-side">
            @include('components/sidebar')

            @if($work->orderer_id === Auth::id())
            <div class="p-side__linkHead">発注者メニュー</div>
            <ul class="p-side__lists">
               <a class="c-btn p-side__link" href="{{route('applicants.show',$work->w_id)}}">
                  <li><i class="fas fa-list-alt"></i><span class="u-ml1">応募者一覧</span></li>
               </a>
               <a class="c-btn p-side__link" href="{{route('works.edit',$work_id)}}">
                  <li><i class="fas fa-edit"></i><span>編集</span></li>
               </a>
            </ul>
            @endif
         </aside>

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
                        data-text="【match】{{$work->w_name}}"
                        data-url="http://localhost:8000/works/{{$work->w_id}}"
                        data-hashtags="match">
                        Tweet
                     </a>
                  </div>

                  <!-- 仕事詳細説明 -->
                  <h2 class="c-h2__head p-workDetail__head">{{$work->w_name}}</h2>
                  <div class="p-workDetail__infoWrap">
                     <!-- 仕事情報 上部 -->
                     <div class="p-workDetail__startRecruitment">募集開始：<time>{{$work->created_at}}</time></div>
                     <div class="p-workDetail__infoUpper">
                        <div class="p-workDetail__infoUpperItem -left">
                           <span>依頼者：</span>
                           <div class="p-workDetail__userInfoWrap">
                              <img class="c-img p-workDetail__infoImg"
                                 src="{{ asset('storage/user_img/'.$work->orderer_image) }}"
                                 alt="ユーザーの画像" />
                              <a href="{{route('users.show',1)}}"
                                 class="c-link p-workDetail__infoName">{{$work->orderer_name}}</a>
                           </div>
                        </div>
                        <div class="p-workDetail__infoUpperItem -right">
                           <div class="p-workDetail__infoDate -endDate">
                              <div class="p-workDetail__infoDateHead">募集終了</div>
                              <time>{{$work->end_date}}</time>
                           </div>
                           <div class="p-workDetail__infoDate -hopeDate">
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
                              <div class="p-workDetail__infoLowerBodyPrice">（{{$work->price_lower}} ~
                                 {{$work->price_upper}}千円）</div>
                              @endif
                           </div>
                        </div>
                        <div class="p-workDetail__infoLowerItem -appNum">
                           <div class="p-workDetail__infoLowerHead">応募人数</div>
                           <div class="p-workDetail__infoLowerBody">{{$countApplicants}}人</div>
                        </div>
                     </div>
                  </div>
                  <div class="p-workDetail__requestWrap">
                     <div class="p-workDetail__requestHead">依頼内容</div>
                     <pre class="p-workDetail__requestBody">{{$work->content}}</pre>
                  </div>

                  {{-- 応募ボタン --}}
                  @auth
                  @if ($work->orderer_id !== Auth::id())
                  @if($work->w_state === 1)

                  @if($applicant)
                  <form method="POST" action="{{route('applicants.destroy',$applicant->id)}}">
                     @method('DELETE')
                     @csrf
                     <button class="c-btn p-workDetail__appBtn -stop" type="submit">応募を取りやめる</button>
                  </form>
                  @else {{-- @if($applicant) --}}
                  <form method="POST" action="{{route('applicants.store')}}">
                     @csrf
                     <input type="hidden" name="work_id" value="{{$work->w_id}}">
                     <input type="hidden" name="owner_id" value="{{$work->orderer_id}}">
                     <button class="c-btn p-workDetail__appBtn -app" type="submit">応募する</button>
                  </form>
                  @endif {{-- @if($applicant) --}}

                  @else {{-- @if($work->w_state === 1) --}}
                  <div class="c-btn p-workDetail__appBtn -end">この仕事の応募は終了しました。</div>
                  @endif {{-- @if($work->w_state === 1) --}}
                  @endif {{-- @if ($work->orderer_id !== Auth::id()) --}}
                  @endauth
               </div>
            </section>

            <!-- パブリックメッセージ -->
            <public-messages-area-component
               :public-path="{{ json_encode(asset('')) }}"
               :work-id="{{json_encode((integer)$work_id)}}"
               :auth-user="{{json_encode($authUser)}}"
               :parent-msg="{{json_encode($parent_msg)}}"
               :child-msg="{{json_encode($child_msg)}}">
            </public-messages-area-component>
         </div>
      </div>
   </div>
</main>
@endsection
