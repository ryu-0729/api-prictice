<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">今日の日付</div>

          <div class="card-body">
            {{ day }}
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        day: '0:0',
      }
    },
    mounted() {
      let d = new Date();
      this.day = d.getFullYear().toString() + "/" + (d.getMonth()+1).toString() + "/" + d.getDate().toString();
    }
  }
</script>
