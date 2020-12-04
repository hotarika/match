<template>
   <a class="c-workCard" href="work-detail.html">
      <div class="c-workCard__decisionTag">決定</div>
      <div class="c-workCard__nameWrap">
         <img class="c-img c-workCard__img" :src="require('../../images/img2.png').default" alt="ユーザーのアイコン" />
         <span class="c-workCard__name">山田たろう</span>
      </div>

      <div class="c-workCard__head">
         カーナビシステムあああああああああああ
      </div>
      <!-- 単発案件 -->
      <div class="c-workCard__contract">
         <div class="c-workCard__contractIconWrap">
            <i class="fas fa-male c-workCard__contractIcon -oneoff"></i>
         </div>
         <div class="c-workCard__contractWayWrap">
            <div class="c-workCard__contractWay">単発案件</div>
            <div class="c-workCard__contractMoney">1,000~2,000千円</div>
         </div>
      </div>
      <!-- レベニューシェア -->
      <!-- <div class="c-workCard__contract">
      <div class="c-workCard__contractIconWrap">
         <i class="fas fa-people-arrows c-workCard__contractIcon -share"></i>
      </div>
      <div class="c-workCard__contractWayWrap">
         <div class="c-workCard__contractWay -share">レベニューシェア</div>
      </div>
   </div> -->
      <!-- その他情報 -->
      <div class="c-workCard__info">
         <div class="c-workCard__infoItem -left">残り12日</div>
         <div class="c-workCard__infoItem -right">応募者5人</div>
      </div>
   </a>
</template>
