<template>
  <div class="heading">
    {{message}}
  </div>
</template>
<script>
const default_layout = "default";


export default {
  computed: {},
  data() {
      return {
          message:'Welcome to my Kanban board with Laravel, Vue.js & SCSS.'
      }
  }
};
</script>
