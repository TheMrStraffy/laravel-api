<script>

import axios from 'axios';

import ProjectCardVue from './components/ProjectCard.vue';
import AsideVue from './partials/Aside.vue';

export default {
  name:'App',
  components:{
    AsideVue
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

  <aside-vue class="aside col-2" />
  <div class="container">

    <div class="row mx-auto">
    <!-- <project-card-vue :projectList="this.projects" /> -->
    </div>
  </div>
</main>
</template>


<style lang="scss" scoped>
@use '../scss/appVue.scss';
.aside{
    height: 100%;
    background-color: #212529;
}
</style>
