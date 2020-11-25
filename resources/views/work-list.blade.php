@extends('layouts.app')
@section('title', 'マイページ')

@section('content')

<main class="l-main p-workList">
   <div class="container">
      <h1 class="c-h1__head">仕事一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         <sidebar-component></sidebar-component>

         <div class="l-main__mainArea -twoColumns">
            <work-component></work-component>
         </div>
      </div>
   </div>
</main>
@endsection
