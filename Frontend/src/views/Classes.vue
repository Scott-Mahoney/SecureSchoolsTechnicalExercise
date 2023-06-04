<template>
    <div class="classes">
      <img alt="Secure Schools Logo" style="width:200px" src="https://secureschools.com/svg/logo.svg" />
      <Class :currentID="this.id" />
    </div>
  </template>
  
  <script>
  import Class from '@/components/Classes.vue'

  export default {
    name: 'Classes',
    components: {
      Class
    },

    created() {
      this.id = this.$route.query.id ?? "A2082387062"
    }
  }
  </script>