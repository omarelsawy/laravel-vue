<template>
  <div id="app">
    <div class="container">
      <div class="row">
            <router-link to="/">Quotes</router-link> |
            <router-link to="/new-quote">New Quote</router-link> |
            <router-link to="/signup">signUp</router-link> |
            <router-link to="/signin">signIn</router-link>
      </div>
      <hr>
      <div class="row">
            <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>

export default {
  data () {
    return {
      
    }
  }
}
</script>

<style>
  #app{
    margin: 30px;
  }
</style>
