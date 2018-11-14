<template>
  <div>
   <h2>Quotes</h2>
   <form class="mb-3" @submit.prevent="addQuote">
     <div class="form-group">
      <input class="form-control" type="text" v-model="quote.content" placeholder="content">
     </div>
     <button type="submit" class="btn">submit</button>
   </form>
   <nav aria-label="Page navigation example">
     <ul class="pagination">
      <li v-bind:class="{disabled: !pagination.prev_page_url}" class="page-item">
      <a class="page-link" href="#" @click="fetchQuotes(pagination.prev_page_url)">Previous</a>
      </li>
      <li class="page-item disabled">
      <a class="page-link text-dark" href="#">
      {{ pagination.current_page }} of {{ pagination.last_page }}
      </a>
      </li>
      <li v-bind:class="{disabled: !pagination.next_page_url}" class="page-item">
      <a class="page-link" href="#" @click="fetchQuotes(pagination.next_page_url)">Next</a>
      </li>
     </ul>
   </nav>

   <div class="card card-body mb-2" v-for="quote in quotes" v-bind:key="quote.id">
     <h3>{{ quote.content }}</h3>
     <hr>
     <button class="btn btn-danger" @click="deleteQuote(quote.id)">delete</button>
     <button class="btn btn-warning" @click="editQuote(quote)">edit</button>
   </div>
  </div>
</template>

<script>
  export default{
    data() {
      return{
        quotes: [],
        quote: {
          content: ''
        },
        quote_id : '',
        pagination: {},
        edit: false,

      }
    },
    created(){
      this.fetchQuotes();
    },
    methods:{
      fetchQuotes(page_url) {
        page_url = page_url || 'api/quotesVue';
        fetch(page_url)
        .then(res => res.json())
        .then(res => {
          this.quotes = res.data;
          this.makePagination(_.omit(res, 'data'));
        })
        .catch(err=>console.log(err));
      },
      makePagination(obj){
         this.pagination = obj;
      },
      deleteQuote(id) {
         if(confirm('are u sure')){
           fetch(`api/quote/${id}` , {
             method: 'delete'
           })
           .then(res => res.json())
          .then(res => {
            alert('quote temoved');
            this.fetchQuotes();
          })
          .catch(err=>console.log(err));
        }
      },
      addQuote() {
        if(this.edit === false){
         //add
         fetch('api/quoteVue' , {
             method: 'post',
             body: JSON.stringify(this.quote),
             headers: {
               'content-type': 'application/json'
             } 
         })
         .then(res => res.json())
          .then(res => {
            this.quote.body = '';
            this.fetchQuotes();
          })
          .catch(err=>console.log(err)); 
        }
        else{
         //edit
         let id = this.quote_id;
         fetch(`api/quote/${id}` , {
             method: 'put',
             body: JSON.stringify(this.quote),
             headers: {
               'content-type': 'application/json'
             } 
         })
         .then(res => res.json())
          .then(res => {
            this.quote.body = '';
            this.fetchQuotes();
          })
          .catch(err=>console.log(err)); 
        }
        },
      editQuote(quote){
         this.edit = true;
         this.quote_id = quote.id;
         this.quote.content = quote.content;
        }
      }
    }
</script>






















