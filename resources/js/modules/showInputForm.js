window.addEventListener('DOMContentLoaded', () => {
   const contract = document.querySelector('.js-contract'); // 値を取得
   const active = document.querySelector('.js-showInput'); // is-active挿入

   // 金額の表示は「単発案件」のみで必要になるため、それを選択した場合に表示させるよう制御する
   if (contract) {
      contract.addEventListener('change', e => {
         if (e.target.value === '1') {
            active.classList.add('is-active');
            active.style.transition = '0.2s';
         } else {
            active.classList.remove('is-active');
            active.style.transition = '0.2s';
         }
      });

      // submitした時に、「単発案件」を指定た場合に再表示する
      // 単発案件を指定後のsubmit時に、表示が少し遅れて表示されるのは、スタイルをjsで制御しているため
      // jsは一番最後に読み込んでいるので、表示が反映されるまで少し時間がかかる
      window.onload = function() {
         if (document.querySelector('.js-contract').value === '1') {
            active.style.transition = '0s';
            active.classList.add('is-active');
         }
      };
   }
});
