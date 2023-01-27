<script>

import axios from 'axios';
import ProjectCardVue from './components/ProjectCard.vue';
export default {
  name:'App',
  components:{
    ProjectCardVue,
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
  <h1>Main App Here</h1>
  <div class="container">

  <div class="row mx-auto">

  <project-card-vue :projectList="this.projects" />
  </div>
  </div>
</template>


<style lang="scss">
@use '../scss/appVue.scss';
</style>
