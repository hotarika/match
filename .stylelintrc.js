module.exports = {
   plugins: ['stylelint-scss'],
   rules: {
      'declaration-block-no-shorthand-property-overrides': true, // CSSが適切な順番か
      'declaration-colon-newline-after': null, // コロンのあとに空欄を入れてはいけない
      'at-rule-no-unknown': null, // cssルール無効
      'scss/at-rule-no-unknown': true, // scssルール追加（stylelint-scss）
      'no-empty-source': null,
      'declaration-empty-line-before': 'never',
      'comment-empty-line-before': null,
      'font-family-no-duplicate-names': [
         true,
         {
            // normalize.cssのmonospace重複対策
            ignoreFontFamilyNames: ['monospace']
         }
      ]
   },
   extends: [
      'stylelint-config-standard', // 基本的な設定
      'stylelint-config-recess-order',
      'stylelint-prettier/recommended' // prettier + stylelintのフォーマットを無効
   ]
};
