@extends('layouts.app')
@section('title', '仕事フォーム')

@section('content')
<main class="l-main p-workForm">
   <div class="container">
      <h1 class="c-h1__head">仕事登録</h1>
      <div class="l-main__mainAreaWrap">
         <!-- サイドバー -->
         @include('components/sidebar')

         <div class="l-main__mainArea -twoColumns">
            <section class="c-h2__sec">
               <div class="c-h2__oneRowBody p-workForm__body">
                  <form method="POST" class="p-workForm__form" action="{{route('works.store')}}">
                     @csrf

                     <!-- 案件名 -->
                     <div class="p-workForm__wrap -name">
                        <label class="p-workForm__label -name" for="name">仕事名<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <input
                              id="name"
                              class="c-form__input p-workForm__input -name"
                              type="text"
                              name="name"
                              value="{{ old('name') }}"
                              autofocus
                              placeholder="仕事名を記入" />

                           @error('name')
                           <span class="c-form__invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 募集終了 -->
                     <div class="p-workForm__wrap -endRecruitment">
                        <label class="p-workForm__label -endRecruitment"
                           for="end-recruitment">募集終了<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <input
                              id="end-recruitment"
                              class="c-form__input p-workForm__input -endRecruitment"
                              type="date"
                              name="endRecruitment"
                              value="{{ old('endRecruitment') }}"
                              placeholder="例：2021/01/01" />

                           @error('endRecruitment')
                           <span class="c-form__invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 希望納期 -->
                     <div class="p-workForm__wrap -hopeDeadline">
                        <label class="p-workForm__label -hopeDeadline"
                           for="hope-deadline">希望納期<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <input
                              id="hope-deadline"
                              class="c-form__input p-workForm__input -hopeDeadline"
                              type="date"
                              name="hopeDeadline"
                              value="{{ old('hopeDeadline') }}"
                              placeholder="例：2021/02/01" />

                           @error('hopeDeadline')
                           <span class="c-form__invalid" role="alert">
                              <strong>入力してください</strong>
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
                              name="contract">
                              <option value="" selected>選択してください</option>
                              <option value="1" @if(old('contract')=='1' ) selected @endif>単発案件</option>
                              <option value="2" @if(old('contract')=='2' ) selected @endif>レベニューシェア</option>
                           </select>

                           @error('contract')
                           <span class="c-form__invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                           @enderror
                        </div>
                     </div>

                     <!-- 金額 -->
                     <div class="p-workForm__wrap -money js-showInput">
                        <label class="p-workForm__label -money" for="money">金額<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <div class="p-workForm__moneyWrap">
                              <input
                                 id="money"
                                 class="c-form__input p-workForm__input -money"
                                 type="number"
                                 name="moneyLower"
                                 value="{{ old('moneyLower') }}"
                                 placeholder="例：1000" /><span>千円〜</span>
                              <input
                                 id="money"
                                 class="c-form__input p-workForm__input -money"
                                 type="number"
                                 name="moneyUpper"
                                 value="{{ old('moneyUpper') }}"
                                 placeholder="例：2000" /><span>千円</span>
                           </div>

                           @if($errors->has('moneyLower') || $errors->has('moneyUpper'))
                           <span class="c-form__invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                           {{-- @enderror --}}
                           @endif
                        </div>
                     </div>

                     <!-- 依頼内容 -->
                     <div class="p-workForm__wrap -content">
                        <label class="p-workForm__label -content" for="content">依頼内容<span>[必須]</span></label>
                        <div class="p-workForm__inputWrap">
                           <textarea
                              id="content"
                              class="c-form__textarea p-workForm__textarea u-mb5"
                              name="content"
                              cols="30"
                              rows="10"
                              placeholder="具体的に依頼内容を記入&#10;（例：どのような仕事を依頼したいのか・期待する効果は何か・仕事の規模はどれくらいか などご自由にご記入ください）">{{ old('content') }}</textarea>

                           @error('content')
                           <span class="c-form__invalid" role="alert">
                              <strong>入力してください</strong>
                           </span>
                           @enderror
                        </div>
                     </div>
                     <button class="c-btn p-workForm__editBtn" type="submit">編集する</button>
                  </form>
               </div>
            </section>
         </div>
      </div>
   </div>
</main>
@endsection
