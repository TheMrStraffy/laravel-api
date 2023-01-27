<script>
import ProjectCard from '../components/ProjectCard.vue';

export default {
    components: { ProjectCard },
    name:'home',
    data(){
        return {
            baseUrl: 'http://127.0.0.1:8000/api/',
      projects: [],
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
  <h1>HOME</h1>
<div class="row justify-content-around">

  <project-card :projectList="this.projects" />
</div>
</template>

<style lang="scss" scoped>

</style>
