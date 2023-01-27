<script>

import axios from 'axios';

import SideMenu from './partials/SideMenu.vue'

export default {
  name:'App',
  components:{
    SideMenu,
  },

}
</script>


<template>
<main class="d-flex">

    <div class="side-menu col-2 d-flex align-items-center justify-content-center">
  <side-menu  />
    </div>
  <div class="col-10 mc-container">

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
.mc-container{
    overflow-y: auto;
    height: 100%;
}
</style>
