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
                                 src="{{url('/').'/storage/user_img/'.$applicant->image}}" alt="ユーザーの画像" />
                              <a class="c-link p-applicant__userName" href="profile">
                                 {{$applicant->user_name}}
                              </a>
                           </div>

                           @if ($applicant->board_id)
                           <a class="c-btn p-applicant__msgBtn" href="{{route('dm.show',$applicant->board_id)}}">
                              <i class="fas fa-envelope"></i>
                           </a>
                           @else
                           <form method="POST" action="{{route('dm-board.store')}}"
                              class="p-applicant__dmBoardCreateForm">
                              @csrf
                              <input type="hidden" name="work_id" value="{{$work->id}}">
                              <input type="hidden" name="owner_user_id" value="{{Auth::id()}}">
                              <input type="hidden" name="order_user_id" value="{{$applicant->applicant_id}}">
                              <button class="c-btn p-applicant__msgBtn -create" type="submit">
                                 <i class="fas fa-envelope"></i>
                              </button>
                           </form>
                           @endif

                        </div>

                        <form action="" class="p-applicant__decideForm -decide -decided -wait">
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
