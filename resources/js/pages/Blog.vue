<script>
import axios from 'axios';
import {BASE_URL} from '../data/data';
import {store} from '../data/store';

import ProjectCard from '../components/ProjectCard.vue';
import FormSearchVue from '../components/FormSearch.vue';
import TechnologyTypeVue from '../components/TechnologyType.vue';


export default {
    name:'blog',
    components: { ProjectCard, FormSearchVue, TechnologyTypeVue },
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
        store.types = result.data.types;
        store.technologies = result.data.technologies;
        console.log(store.projects);
        // console.log(store.types);
        // console.log(store.technologies);
      })
    }
  },
  mounted(){
    this.getApi(this.active_base_url);
  }
    }
</script>

<template>
<div class="headerBlog justify-content-around align-items-center mb-4">
    <h1>Blog</h1>
    <div class="d-flex justify-content-around align-items-center">

    <form-search-vue class="col-2" />
    <technology-type-vue @getApi="getApi(this.active_base_url)" class="col-6" />

    </div>
</div>
<div class="row justify-content-around w-100">

    <project-card v-for="project in store.projects" :key="'project'+project.id" :project="project" />
</div>
</template>

<style>

</style>
