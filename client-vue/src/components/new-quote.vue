<template>

  <form @submit.prevent="onSubmited">
    <div class="form-group">
       <label for="content">Content</label>
       <input id="content" class="form-control" type="text" v-model="content">
    </div>
    <button class="btn" type="submit">submit</button>
  </form>

</template>

<script>
import axios from 'axios';

export default {
  data () {
    return {
      'content': ''
    }
  },
  methods: {
    onSubmited(){
      const token = localStorage.getItem('token');
      axios.post('http://laravelVue.local:8012/api/quote?token=' +token, {
         content: this.content
      })
      .then(response => console.log(response))
      .catch(err=>console.log(err));
    }
  }
}
</script>



















