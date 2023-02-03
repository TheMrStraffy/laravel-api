<script>
import axios from 'axios';
import {BASE_URL} from '../data/data'
import {store} from '../data/store'
export default {
    name:'TechnologyType',
    data(){
        return{
            store
        }
    },
    methods:{
        getApiByType(id){
            axios.get(`${BASE_URL}posts/project-type`,{
                params:{
                    type_id: id
                }
            })
            .then(result => {
                console.log(result);
                store.projects = result.data.projects;
            })
        }
    },
    mounted(){
    }
}
</script>

<template>
<div class="d-flex tech-type-search justify-content-evenly">

<div class="type-list">
    <h2>Types</h2>
<button @click="getApiByType(type.id)"  v-for="type in store.types" :key="type.id" class="d-flex mb-1" >{{type.name}}</button>
</div>

<div class="tech-list">
    <h2>Technologies</h2>
<button class="d-flex mb-1" v-for="technology in store.technologies" :key="'technology'+technology.id" @click="getApiByTechnologyType('project-technology',technology.id)">{{technology.name}}</button>
</div>
<div class="all-list">
<button class="d-flex mb-1" @click="$emit('getApi')">All Projects</button>
</div>
</div>
</template>


<style lang="scss" scoped>
.tech-type-search{
    max-height: 200px;
    .tech-list{
        max-height: 250px;
        overflow-y: auto;
    }
    .type-list{
        max-height: 250px;
        overflow-y: auto;
    }
}
</style>
