<script>
import axios from 'axios';
import {BASE_URL} from '../data/data';
import {store} from '../data/store';

import ProjectCard from '../components/ProjectCard.vue';
import FormSearchVue from '../components/FormSearch.vue';


export default {
    name:'blog',
    components: { ProjectCard, FormSearchVue },
    data(){
        return {
            BASE_URL,
            store,
            active_base_url : BASE_URL +'posts',
    }

  },
  methods:{
    getApi(url){
      axios.get(url)
      .then(result =>{
        store.projects = result.data.projects.data;
        console.log(store.projects);
      })
    }
  },
  mounted(){
    this.getApi(this.active_base_url);
  }
    }
</script>

<template>
<div class="headerBlog d-flex justify-content-around align-items-center">
<h1>Blog</h1>
<form-search-vue />

</div>
<div class="row justify-content-around w-100">

    <project-card :projectList="store.projects" />
</div>
</template>

<style>

</style>
