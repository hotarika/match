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
         <sidebar-component></sidebar-component>

         {{-- メインエリア --}}
         <div class="l-main__mainArea -twoColumns">
            <!-- 仕事詳細 -->
            <work-detail-section></work-detail-section>

            <!-- パブリックメッセージ -->
            <pubmsg-area-section></pubmsg-area-section>
         </div>
      </div>
   </div>
</main>
@endsection
