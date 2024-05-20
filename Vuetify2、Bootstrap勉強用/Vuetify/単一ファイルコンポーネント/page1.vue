<template>
  <div>
    <h1>{{ title }}</h1>
    <v-btn elevation="2">BUTTON</v-btn>
  </div>
</template>

<script>
module.exports = {
  data: function() {
    return {
      title: 'page1.vue'
    }
  }
}
</script>

<style scoped>
h1 {
    color: red;
}
</style>