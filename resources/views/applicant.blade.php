@extends('layouts.app')
@section('title', '応募者一覧')

@section('content')
<main class="l-main p-applicant">
   <div class="container">
      <h1 class="c-h1__head">応募者一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         <sidebar-component></sidebar-component>

         <!-- main -->
         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-applicant__body">
                  <h2 class="c-h2__head p-applicant__head">
                     カーナビシステムを作成した後に、業務システムを作成して欲しい
                  </h2>
                  <div class="p-applicant__lists">
                     <div class="p-applicant__list">
                        <div class="p-applicant__userWrap">
                           <div class="p-applicant__user">
                              <img
                                 class="c-img p-applicant__userImg"
                                 src="{{ asset('images/home_img.jpg') }}"
                                 alt="ユーザーの画像" />
                              <a class="c-link p-applicant__userName" href="profile">
                                 山田太郎ああああああああ
                              </a>
                           </div>
                           <a class="p-applicant__msgBtn" href="dm">
                              <i class="fas fa-envelope"></i>
                           </a>
                        </div>
                        <button class="c-btn p-applicant__decideBtn -decide -decided -wait" type="submit">
                           決定する
                        </button>
                     </div>
                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
