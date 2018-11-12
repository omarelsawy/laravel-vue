<template>
  <form>
    
    <div class="form-group"> 
      <label for="email">email</label>
      <input type="email" id="email" name="email" class="form-control" v-model="email">
    </div>

    <div class="form-group"> 
      <label for="password">password</label>
      <input type="password" id="password" name="password" class="form-control" v-model="password">
    </div>

    <button type="submit" class="btn" @click.prevent="signIn">signin</button>
  </form>
</template>

<script>
import axios from 'axios';

  export default{
    data () {
    return{
      email : '',
      password: ''
    }
    },
    methods: {
      signIn () {
          axios.post('http://laravelVue.local:8012/api/user/signIn' , {
          email: this.email,
          password: this.password
	      },
	      {headers: {'X-Request-With': 'XMLHttpRequest'}}
	      )
	      .then(response => {
           const token = response.data.token;
           const base64Url = token.split('.')[1];
           const base64 = base64Url.replace('-' , '+').replace('_' , '/');
           console.log(JSON.parse(window.atob(base64)));
           localStorage.setItem('token' , token);
        })
	      .catch(err=>console.log(err));
      }
    }
  }
</script>




















