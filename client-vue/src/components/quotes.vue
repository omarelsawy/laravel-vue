<template>
  <div>
    <button class="btn" @click="getQuotes">get quotes</button>
    <hr>
    <app-quote v-for="quote in quotes" :qt="quote" @onDeleted="onQuoteDeleted($event)"></app-quote>
  </div>
</template>

<script>
import Quote from './quote.vue';
import axios from 'axios';

export default {
  data () {
    return {
      quotes: []
    }
  },
  methods: {
     getQuotes(){
         axios.get('http://laravelVue.local:8012/api/quotes')
         .then(response => {
            this.quotes = response.data.quotes;
         })
         .catch(err=>console.log(err));
     },
     onQuoteDeleted(id) {
       const position = this.quotes.findIndex((element)=>{
         return element.id == id;
       });
       this.quotes.splice(position , 1);
     }
  },
  components: {
    'app-quote' : Quote
  }
}
</script>















