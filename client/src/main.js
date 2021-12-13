import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'


Vue.use(VueRouter)
Vue.config.productionTip = false

import Home from '@/components/Home.vue'
import JobDetail from '@/components/JobDetail.vue'
import CreateJob from '@/components/CreateJob.vue'

const routes = [
  {
    path: '/',
    redirect: '/home'
  },
  {
    path: '/home',
    name: 'home',
    component: Home
  },  
  {
    path: '/jobs/:id',
    name: 'job_detail',
    component: JobDetail
  },
  {
    path: '/create',
    name: 'create_job',
    component: CreateJob
  },
  {
    path: '/edit/:id',
    name: 'edit_name',
    component: CreateJob
  },
]

const router = new VueRouter({
  mode: 'history',
  routes
})


new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
