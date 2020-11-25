@extends('layouts.app')
@section('title', 'ホーム')

@section('content')
<main class="p-home">
   <!-- トップ画像 -->
   <section class="p-home__topImgSec">
      <img class="p-home__topImg" src="{{ asset('images/home_img.jpg') }}" alt="" />
      <div class="p-home__topMsg">
         <small class="p-home__smallMsg">サイト・Webアプリ・<br />Webデザイン・ロゴ製作など</small><br />
         <p class="p-home__mainMsg">ITをもっと気軽に・簡単に</p>
         <p class="p-home__subMsg">あなたのスキルを求めている人を、<br />簡単に探すことができます</p>
         <p class="p-home__subMsg">あなたが困ったときに、<br />気軽にお仕事をお願いすることができます</p>
      </div>
      <div class="p-home__freeBtnWrap -top">
         <a class="c-btn p-home__freeBtn -top" href="register">まずは無料で会員登録</a>
      </div>
   </section>

   <!-- スキル・職種一覧 -->
   <section class="p-home__skillSec">
      <div class="container">
         <!-- 見出し -->
         <div class="p-home__skillSecHead">
            あなたの<span>スキル</span>を<br />生かせる場所がここにあります
         </div>
         <div class="p-home__skillCards">
            <!-- 左カード -->
            <div class="p-home__skillCard -left">
               <div class="p-home__skillCardHead">ホームページ製作・デザイン</div>
               <div class="p-home__skillCardContents">
                  <div class="p-home__skillCardContent -left_top u-ml4">
                     <i class="fab fa-html5 p-home__skillCardIcon -size_s"></i>
                     <span class="u-ml1">HTML・CSSコーディング</span>
                  </div>
                  <div class="p-home__skillCardContent -left_middle">
                     <i class="fas fa-palette p-home__skillCardIcon"></i>
                     <span>Webデザイン</span>
                  </div>
                  <div class="p-home__skillCardContent -left_bottom">
                     <i class="fas fa-paint-brush p-home__skillCardIcon"></i>
                     <span>ロゴ・バナー・イラスト製作</span>
                  </div>
               </div>
            </div>

            <!-- 中央カード -->
            <div class="p-home__skillCard -left">
               <div class="p-home__skillCardHead">アプリ開発・システム開発</div>
               <div class="p-home__skillCardContents">
                  <div class="p-home__skillCardContent -center_top u-ml7">
                     <i class="fas fa-mobile-alt p-home__skillCardIcon -size_s"></i>
                     <span class="u-ml7">iPhone・iPadアプリ製作 </span>
                  </div>
                  <div class="p-home__skillCardContent -center_middle">
                     <i class="fab fa-android p-home__skillCardIcon"></i>
                     <span>アンドロイドアプリ製作 </span>
                  </div>
                  <div class="p-home__skillCardContent -center_bottom">
                     <i class="fas fa-shopping-cart p-home__skillCardIcon"></i>
                     <span class="u-ml2">ECサイト構築 </span>
                  </div>
               </div>
            </div>
            <!-- 右カード -->
            <div class="p-home__skillCard -left">
               <div class="p-home__skillCardHead">運用・管理</div>
               <div class="p-home__skillCardContents">
                  <div class="p-home__skillCardContent -right_top">
                     <i class="far fa-chart-bar p-home__skillCardIcon"></i>
                     <span class="u-ml9">SNSマーケティング </span>
                  </div>
                  <div class="p-home__skillCardContent -right_middle">
                     <i class="fas fa-chart-pie p-home__skillCardIcon"></i>
                     <span class="u-ml6">アクセス解析 </span>
                  </div>
                  <div class="p-home__skillCardContent -right_bottom">
                     <i class="far fa-handshake p-home__skillCardIcon"></i>
                     <span>各種運用代行</span>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- できること一覧 -->
   <section class="p-home__canSec">
      <div class="container">
         <!-- 見出し -->
         <div class="p-home__canSecHead">
            <img
               class="p-home__canSecHeadLogo"
               src="{{ asset('images/logo/logo-blue.svg') }}"
               alt="ロゴ" />
            で出来ること
         </div>

         <div class="p-home__canCards">
            <!-- 左カード -->
            <div class="p-home__canCard -left">
               <div class="p-home__canCardHead">
                  <span>とにかく簡単・シンプルに<br />発注・受注ができます</span>
               </div>
               <div class="p-home__canCardWrap -left">
                  <img
                     class="p-home__canCardImg"
                     src="{{ asset('images/img1.png') }}"
                     alt="説明のイメージ画像" />
                  <div class="p-home__canCardText">
                     matchでは、多くの不要な入力項目やオプションを除くことにより、とてもシンプル・簡単に利用できるように設計しています。<br />
                     利用のハードルを少しでも下げることによって快適にご利用することが可能です。
                  </div>
               </div>
            </div>

            <!-- 中央カード -->
            <div class="p-home__canCard -center">
               <div class="p-home__canCardHead">
                  <span>どんな小さなお仕事も<br />気軽にご利用いただけます</span>
               </div>
               <div class="p-home__canCardWrap -center">
                  <img
                     class="p-home__canCardImg"
                     src="{{ asset('images/img2.png') }}"
                     alt="説明のイメージ画像" />
                  <div class="p-home__canCardText">
                     家にいながら隙間時間で出来る小さな仕事を受けることも可能です。子育て中で時間がないときでも、自分のライフスタイルに合わせて受注してみましょう。<br />
                     どんな小さな仕事でも、matchではとても歓迎しています。
                  </div>
               </div>
            </div>

            <!-- 右カード -->
            <div class="p-home__canCard -right">
               <div class="p-home__canCardHead">
                  <span>あなたに合った契約手段で<br />発注・受注できます</span>
               </div>
               <div class="p-home__canCardWrap -right">
                  <img
                     class="p-home__canCardImg"
                     src="{{ asset('images/img3.png') }}"
                     alt="説明のイメージ画像" />
                  <div class="p-home__canCardText">
                     仕事の依頼者は、単発での仕事依頼とレベニューシェア（協力しながら、お金を分け合っていく仕組み）を選択することができます。<br />
                     あなたの考え方に合った契約方法で事業を育てていくことが可能です。
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- 新着の案件一覧 -->
   <newly-workcard-section></newly-workcard-section>

   <!-- 会員登録ボタン -->
   <section class="p-home__btnSec">
      <div class="p-home__freeBtnWrap">
         <a class="c-btn p-home__freeBtn -bottom" href="register">まずは無料で会員登録</a>
      </div>
   </section>
</main>
@endsection
