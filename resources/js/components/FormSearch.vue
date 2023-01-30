<script>
import axios from 'axios'
import {BASE_URL} from '../data/data'
import {store} from '../data/store'

export default {
    name:'FormSearch',
    data(){
        return{
            searchInput: '',
            store
        }
    },
    methods:{
        getApi(){
            axios.get(BASE_URL + 'posts/search', {
                params:{
                    searchInput : this.searchInput
                }
            })
            .then(result => {
                this.searchInput = '';
                store.projects = result.data;
                console.log(store.projects);
                // store.show_paginate = false;
            })
        }
    }

}
</script>
<template>
<div class="searchBar">

  <input v-model.trim="searchInput" @keyup.enter="getApi" type="text" placeholder="search">
  <button @click="getApi">Invia</button>
</div>
</template>


<style lang="scss" scoped>

.searchBar{
    height: 100%;
    border: 1px solid black;
    border-radius: 10px;
}
input{
    border: none;

    border-radius: 15px;
}
button{
    text-decoration: none;
    border: none;
    border-radius: 15px;
    background-color: rgba(26, 107, 230, 0.336);


}

</style>
