import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import Quotes from './components/quotes.vue'
import NewQuote from './components/new-quote.vue'
import SignUp from './components/signup.vue'
import SignIn from './components/signin.vue'

Vue.use(VueRouter);

const routes = [
  {path: '' , component: Quotes},
  {path: '/new-quote' , component: NewQuote},
  {path: '/signup' , component: SignUp},
  {path: '/signin' , component: SignIn}
];

const router = new VueRouter({
  mode: 'history',
  routes: routes
});

new Vue({
  el: '#app',
  router: router,
  render: h => h(App)
})
