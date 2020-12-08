@extends('layouts.app')
@section('title', '応募者一覧')

@section('content')
<main class="l-main p-applicant">
   <div class="container">
      <h1 class="c-h1__head">応募者一覧</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         {{-- メインエリア --}}
         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-applicant__body">
                  <h2 class="c-h2__head p-applicant__head">
                     {{$work->name}}
                  </h2>
                  <div class="p-applicant__lists">

                     @foreach ($applicants as $applicant)
                     <div class="p-applicant__list">
                        <div class="p-applicant__userWrap">
                           <div class="p-applicant__user">
                              <img class="c-img p-applicant__userImg"
                                 src="{{url('/').'/storage/user_img/'.$applicant->u_image}}" alt="ユーザーの画像" />
                              <a class="c-link p-applicant__userName" href="profile">
                                 {{$applicant->u_name}}
                              </a>
                           </div>

                           {{-- メールボタン --}}
                           <a class="c-btn p-applicant__msgBtn"
                              href="{{route('dm-contents.show',$applicant->board_id)}}">
                              <i class="fas fa-envelope"></i>
                           </a>
                        </div>

                        {{-- 決定ボタン --}}
                        <form method="POST" action="{{route('applicants.update',$applicant->applicant_id)}}"
                           class="p-applicant__decideForm -decide -decided -wait">
                           @method('PUT')
                           @csrf
                           <input type="hidden" name="board_id" value="{{$applicant->board_id}}">
                           <input type="hidden" name="w_id" value="{{$applicant->w_id}}">
                           <input type="hidden" name="w_name" value="{{$applicant->w_name}}">
                           <button class="c-btn p-applicant__decideBtn" type="submit">
                              決定する
                           </button>
                        </form>
                     </div>
                     @endforeach

                  </div>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
