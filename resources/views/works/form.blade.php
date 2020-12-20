@extends('layouts.app')
@section('title', '仕事フォーム')

@section('content')
<main class="l-main p-workForm">
   <div class="container">
      <h1 class="c-h1__head">
         @if (request()->is('*edit*')) 仕事編集 @else 仕事登録 @endif
      </h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-workForm__body">
                  <form
                     method="POST"
                     class="p-workForm__form"
                     action="@if ( request()->is('*edit*') ){{route('works.update',$work->id)}} @else {{route('works.store')}} @endif">

                     @if( request()->is('*edit*') ) @method('PUT') @endif
                     @csrf

                     <!-- 案件名 -->
                     <div class="p-workForm__wrap -work">
                        <label class="p-workForm__label -work" for="work">仕事名<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <span class="c-form__description">※ 60文字以内</span>
                           <textarea name="work" class="c-form__textarea p-workForm__textarea" id="work" cols="30"
                              rows="2" placeholder="仕事名を記入" autofocus>{{ old('work',$work->name ?? '') }}</textarea>
                           @error('work')
                           <span class="c-form__invalid" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 募集終了 -->
                     <div class="p-workForm__wrap -endDate">
                        <label class="p-workForm__label -endDate"
                           for="end-date">募集終了<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <input
                              id="end-date"
                              class="c-form__input p-workForm__input -endDate"
                              type="date"
                              name="end_date"
                              value="{{ old('end_date',$work->end_date ?? '') }}"
                              placeholder="例：{{$oneMonthLater}}" />

                           @error('end_date')
                           <span class="c-form__invalid" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 希望納期 -->
                     <div class="p-workForm__wrap -hopeDate">
                        <label class="p-workForm__label -hopeDate"
                           for="hope-date">希望納期<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <input
                              id="hope-date"
                              class="c-form__input p-workForm__input -hopeDate"
                              type="date"
                              name="hope_date"
                              value="{{ old('hope_date',$work->hope_date ??  '') }}"
                              placeholder="例：{{$threeMonthsLater}}" />

                           @error('hope_date')
                           <span class="c-form__invalid" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 提携方法 -->
                     <div
                        class="p-workForm__wrap -contract">
                        <label class=" p-workForm__label -contract" for="contract">提携方法<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <select
                              id="contract"
                              class="c-form__input p-workForm__input -contract js-contract"
                              name="contract_id">
                              <option value="" selected>選択してください</option>
                              <option value="1" @if(old('contract_id',$work->contract_id ?? '')=='1' ) selected
                                 @endif>単発案件
                              </option>
                              <option value="2" @if(old('contract_id',$work->contract_id ?? '')=='2' ) selected
                                 @endif>レベニューシェア
                              </option>
                           </select>

                           @error('contract_id')
                           <span class="c-form__invalid" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 金額 -->
                     <div class="p-workForm__wrap -price js-showInput">
                        <label class="p-workForm__label -price" for="price">金額<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <div class="p-workForm__priceWrap">
                              <input
                                 id="price"
                                 class="c-form__input p-workForm__input -price"
                                 type="number"
                                 name="price_lower"
                                 value="{{ old('price_lower',$work->price_lower ?? '') }}"
                                 placeholder="例：500" /><span>千円〜</span>
                              <input
                                 id="price"
                                 class="c-form__input p-workForm__input -price"
                                 type="number"
                                 name="price_upper"
                                 value="{{ old('price_upper',$work->price_upper ?? '') }}"
                                 placeholder="例：1000" /><span>千円</span>
                           </div>

                           @if($errors->has('price_lower') || $errors->has('price_upper'))
                           <span class="c-form__invalid" role="alert">
                              <strong class="c-form__error -priceLower">{{ $errors->first('price_lower') }}</strong>
                              <strong class="c-form__error -priceUpper">{{ $errors->first('price_upper') }}</strong>
                           </span>
                           @endif
                        </div>
                     </div>

                     <!-- 依頼内容 -->
                     <div class="p-workForm__wrap -orderContent">
                        <label class="p-workForm__label -orderContent" for="order-content">依頼内容<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <span class="c-form__description">※ 3000文字以内</span>
                           <textarea
                              id="order-content"
                              class="c-form__textarea p-workForm__textarea u-mb5"
                              name="order_content"
                              cols="30"
                              rows="10"
                              placeholder="具体的に依頼内容を記入&#10;（例：どのような仕事を依頼したいのか・期待する効果は何か・仕事の規模はどれくらいか などご自由にご記入ください）">{{ old('order_content',$work->content ?? '') }}</textarea>

                           @error('order_content')
                           <span class="c-form__invalid" role="alert">
                              <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <button class="c-btn p-workForm__editBtn" type="submit">
                        @if ( request()->is('*edit*') )編集する @else 登録する @endif
                     </button>
                  </form>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
