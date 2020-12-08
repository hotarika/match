<template>
   <section class="c-h2__sec">
      <!-- 絞り込みフォーム -->
      <form class="p-workList__orderForm" action="" onsubmit="return false;">
         <div class="p-workList__checkbox -oneoff">
            <input
               type="checkbox"
               name="work"
               id="oneoff"
               value="oneoff"
               v-model="oneoff_checkbox"
            />
            <label for="oneoff">単発案件</label>
         </div>
         <div class="p-workList__checkbox -share">
            <input
               type="checkbox"
               name="work"
               id="share"
               value="share"
               v-model="share_checkbox"
            />
            <label for="share">レベニューシェア</label>
         </div>
         <button
            class="c-btn p-workList__formBtn"
            type="submit"
            @click.prevent="searchListClick"
         >
            検索
         </button>
      </form>

      <!-- 仕事カード -->
      <div class="p-workList__workCardWrap">
         <div class="c-h2__workCardBody p-workList__workCardBody">
            <span
               v-for="work in showList.slice(minCardNum, maxCardNum)"
               :key="work.id"
            >
               <!-- 仕事カードをコンポーネント化 -->
               <works-card-component
                  :work="work"
                  :public-path="publicPath"
               ></works-card-component>
            </span>
         </div>
      </div>
      <pagination-component
         :page="page"
         :total-page="totalPage"
         @change="searchListClick"
      >
      </pagination-component>
   </section>
</template>

<script>
import axios from 'axios';

export default {
   props: {
      publicPath: String
   },
   data() {
      return {
         allData: [], // 全データ（このデータを元に検索を行う）
         showList: [], // 並び替えするための空の配列
         oneoff_checkbox: true, // 単発案件チェックボックス
         share_checkbox: true, // レベニューシェアチェックボックス
         page: 1,
         perPage: 9
      };
   },
   computed: {
      totalPage() {
         return Math.ceil(this.showList.length / this.perPage);
      },
      minCardNum() {
         // 表示カードが何枚目から始まるのか定義
         return this.page === 1
            ? this.page - 1
            : this.perPage * (this.page - 1);
      },
      maxCardNum() {
         // 表示カードが何枚目で終わるのか定義
         return this.perPage * this.page;
      }
   },
   methods: {
      searchListClick(refs) {
         this.page = Number.isInteger(refs) ? refs : 1;

         // チェックボックスに応じて、表示カード変更（絞り込み機能）
         this.showList = this.allData.filter(val => {
            if (this.oneoff_checkbox === false && val.contract_id === 1) {
               return;
            }
            if (this.share_checkbox === false && val.contract_id === 2) {
               return;
            }
            return val;
         });
      }
   },
   mounted() {
      // 非同期取得
      axios
         .get(this.publicPath + 'async/works')
         .then(res => {
            console.log(res);
            this.allData = res.data; // 全データを格納
            this.showList = res.data; // 表示リストを格納
         })
         .catch(err => {
            console.log(err);
         });
   }
};
</script>
