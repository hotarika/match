<template>
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
               data-hashtags="match"
               >Tweet</a
            >

            <!-- お気に入りボタン -->
            <div class="p-workDetail__favBtn">
               <i class="fas fa-star p-workDetail__favBtnIcon -true" v-show="this.isActive" @click="favToggle"></i>
               <i class="fas fa-star p-workDetail__favBtnIcon -false" v-show="!this.isActive" @click="favToggle"></i>
            </div>
         </div>

         <!-- 仕事詳細説明 -->
         <h2 class="c-h2__head p-workDetail__head">
            カーナビシステムを作成した後に、業務システムを作成して欲しい
         </h2>
         <div class="p-workDetail__infoWrap">
            <!-- 仕事情報 上部 -->
            <div class="p-workDetail__startRecruitment">募集開始：<time>2020/11/13</time></div>
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
                     <time>2020/11/13</time>
                  </div>
                  <div class="p-workDetail__infoDate -hopeDeadline">
                     <div class="p-workDetail__infoDateHead">希望納期</div>
                     <time>2020/11/13</time>
                  </div>
               </div>
            </div>
            <!-- 仕事情報 下部 -->
            <div class="p-workDetail__infoLower">
               <div class="p-workDetail__infoLowerItem -remainDate">
                  <div class="p-workDetail__infoLowerHead">残り日数</div>
                  <div class="p-workDetail__infoLowerBody">あと6日</div>
               </div>
               <div class="p-workDetail__infoLowerItem -tieUp">
                  <div class="p-workDetail__infoLowerHead">提携方法</div>
                  <!-- <div class="p-workDetail__infoLowerBody">レベニューシェア</div> -->
                  <div class="p-workDetail__infoLowerBody -tieUp">
                     <div class="p-workDetail__infoLowerBodyOneoff">単発案件</div>
                     <div class="p-workDetail__infoLowerBodyMoney">（1,000 ~ 2,000千円）</div>
                  </div>
               </div>
               <div class="p-workDetail__infoLowerItem -appNum">
                  <div class="p-workDetail__infoLowerHead">応募人数</div>
                  <div class="p-workDetail__infoLowerBody">2人</div>
               </div>
               <div class="p-workDetail__infoLowerItem -favNum">
                  <div class="p-workDetail__infoLowerHead">お気に入り人数</div>
                  <div class="p-workDetail__infoLowerBody">2人</div>
               </div>
            </div>
         </div>
         <div class="p-workDetail__requestWrap">
            <div class="p-workDetail__requestHead">依頼内容</div>
            <p class="p-workDetail__requestBody">
               テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト
            </p>
         </div>
         <button class="c-btn p-workDetail__appBtn" type="submit">応募する</button>
      </div>
   </section>
</template>

<script>
export default {
   data() {
      return {
         isActive: false
      };
   },
   methods: {
      favToggle() {
         this.isActive = !this.isActive;
      }
   }
};
</script>
