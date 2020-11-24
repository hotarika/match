module.exports = {
   root: true, // これより親階層の設定ファイルを探しにいかない
   env: {
      // 動作する環境を指定
      browser: true,
      es6: true,
      node: true
   },
   parserOptions: {
      sourceType: 'module' // ES Modules を利用してもエラーが発生しなくなる
   },
   extends: [
      'eslint:recommended',
      'plugin:prettier/recommended', // prettier + eslintのフォーマットを無効
      'plugin:vue/essential'
   ],
   rules: {
      'prefer-const': 'error' // 更新しない変数宣言に、const以外を利用した場合はエラー
   }
};
