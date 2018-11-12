<template>
  <form>
    <div class="form-group"> 
      <label for="username">username</label>
      <input type="text" id="username" name="username" class="form-control" v-model="username">
    </div>

    <div class="form-group"> 
      <label for="email">email</label>
      <input type="email" id="email" name="email" class="form-control" v-model="email">
    </div>

    <div class="form-group"> 
      <label for="password">password</label>
      <input type="password" id="password" name="password" class="form-control" v-model="password">
    </div>

    <button type="submit" class="btn" @click.prevent="signUp">signup</button>
  </form>
</template>

<script>
import axios from 'axios';

  export default{
    data () {
    return{
      username: '',
      email : '',
      password: ''
    }
    },
    methods: {
      signUp () {
          axios.post('http://laravelVue.local:8012/api/user' , {
          name: this.username,
          email: this.email,
          password: this.password
	      },
	      {headers: {'X-Request-With': 'XMLHttpRequest'}}
	      )
	      .then(response => console.log(response))
	      .catch(err=>console.log(err));
      }
    }
  }
</script>




















