<template>
   <!-- 発注した仕事 -->
   <section class="c-h2__sec">
      <h2 class="c-h2__head">{{ head }}</h2>
      <div class="c-h2__workCardBody">
         <work-card-component></work-card-component>
         <work-card-component></work-card-component>
         <work-card-component></work-card-component>
         <work-card-component></work-card-component>
         <work-card-component></work-card-component>
      </div>
   </section>
</template>

<script>
export default {
   props: {
      head: {
         type: String,
         required: true
      }
   }
};
</script>
