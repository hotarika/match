@extends('layouts.app')
@section('title', '仕事一覧')

@section('content')
<main class="l-main p-workList">
   <div class="container">
      <h1 class="c-h1__head">仕事一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         {{-- メインエリア --}}
         <div class="l-main__mainArea -twoColumns">
            <work-component
               :public-path="{{ json_encode(asset('')) }}"></work-component>
         </div>

      </div>
</main>
@endsection
