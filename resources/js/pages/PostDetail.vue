<script>
import axios from 'axios'
import {BASE_URL} from '../data/data'

export default {
    name:'post-detail',
    data(){
        return {
            project:{}
        }
    },
    methods:{
       getApi(){
        console.log(BASE_URL);
        axios.get(BASE_URL + 'posts/' + this.$route.params.slug)
            .then(result => {
                console.log(result.data);
                this.project = result.data;
            })
       }
    },
    mounted(){
        this.getApi();
    }
}
</script>

<template>
<div class="container-fluid h-100 p-4">

  <h1 class="mb-5 text-center">Post Detail</h1>
    <div class="d-flex justify-content-center align-items-center h-75">

  <div class="mc-card text-center">
    <div class="mask">

    </div>
        <img :src="project.cover_image" alt="" class="card-img-top">
        <h2 class="title-project">{{project.name}}</h2>
        <h2 class="title-project">{{project.client_name}}</h2>

        <!-- <p>{{project.type.name}}</p> Caught a bug here where it can print the type object but not the single property -->
        <div class="text-summary">
            <p>{{project.summary}}</p>
        </div>

        <ul>
            <li v-for="technology in project.technologies" :key="technology.id" >{{technology.name}}</li>
        </ul>

  </div>
    </div>
</div>

</template>

<style lang="scss" scoped>

.mc-card{
    position: relative;
    width: 40%;
    height: 80%;
    overflow-y: auto;
    border: 1px solid gray;
    border-radius: 15px;
    box-shadow: 0px 0px 25px 20px rgba($color: #686868, $alpha: 0.3);
    transition: all 0.3s linear;
    &:hover{
        border-color: red;
        box-shadow: 0px 0px 25px 20px rgba($color: #c54141, $alpha: 0.8);
        scale: 1.02;
    }
}
.mask{
    position: absolute;
    width: 100%;
    background: rgb(172, 172, 172);
    z-index: 1;
    animation-name: mask;
    animation-duration: 2s;
}
@keyframes mask {
    from {height: 100%; opacity: 0.7;}
    to {height: 0%; opacity: 0;}
}
</style>
