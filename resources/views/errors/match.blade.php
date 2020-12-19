@extends('layouts.app')

@section('content')
<div class="p-errors__wrap">
   <div class="p-errors__code">
      @yield('code')
   </div>

   <div class="p-errors__message">
      @yield('message')
   </div>
</div>
@endsection
