<template>
  <div>
    {{message}}
  </div>
</template>
<script>
const default_layout = "default";


export default {
  computed: {},
  data() {
      return {
          message:'Welcome to my Kanban board with Vue.js.'
      }
  }
};
</script>
