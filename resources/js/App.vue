<script>

import axios from 'axios';

import ProjectCardVue from './components/ProjectCard.vue';
import SideMenu from './partials/SideMenu.vue'
import Home from './pages/Home.vue';

export default {
  name:'App',
  components:{
    SideMenu,
    Home
    // ProjectCardVue,
  },
  data(){
    return {
      baseUrl: 'http://127.0.0.1:8000/api/',
      projects: [],
      technologies: [],
      types: []
    }
  },
  methods:{
    getApi(){
      axios.get(this.baseUrl + 'posts')
      .then(result =>{
        this.projects = result.data.projects.data;
        console.log(this.projects);
      })
    }
  },
  mounted(){
    this.getApi();
  }
}
</script>


<template>
<main class="d-flex">

    <div class="side-menu col-2 d-flex align-items-center justify-content-center">
  <side-menu  />
    </div>
  <div class="container">

    <router-view> </router-view>
  </div>
</main>
</template>


<style lang="scss" scoped>
@use '../scss/appVue.scss';
.side-menu{
    height: 100%;
    background-color: #212529;
}
</style>
