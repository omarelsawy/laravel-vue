<template>
  <div class="panel panel-default">

    <div class="panel-body">
       {{ qt.content }}
    </div>

    <div class="panel-footer">

      <div v-if="editing">
        <input type="text" v-model="editValue">
        <a @click="save">save</a>
        <a @click="cancel">cancel</a>
      </div>

      <div v-if="!editing">
        <a @click="edit">edit</a>
        <a @click="deleteFn">delete</a>
      </div>

    </div>
   <hr>
  </div>
</template>

<script>
import axios from 'axios';

  export default{
    props: ['qt'],
    data() {
      return{
        editing: false,
        editValue: this.qt.content
      }
    },
    methods: {
      edit() {
        this.editing = true;
        this.editValue = this.qt.content;
      },
      cancel() {
        this.editing = false;
      },
      deleteFn() {
        this.$emit('onDeleted' , this.qt.id)
        axios.delete('http://laravelVue.local:8012/api/quote/' + this.qt.id)
        .then(response=>console.log(response))
        .catch(err=>console.log(err));
      },
      save() {
        this.editing = false;
        this.qt.content = this.editValue;
        axios.put('http://laravelVue.local:8012/api/quote/' + this.qt.id , {
         content: this.editValue
        })
        .then(response=>console.log(response))
        .catch(err=>console.log(err));
      }
    }
  }
</script>

<style scoped>
  a{
    cursor: pointer;
  }
</style>

















