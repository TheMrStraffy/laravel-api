<script>
export default {
    name:'side-menu'
    }
</script>

<template>

  <ul class="text-center d-flex flex-column justify-content-around align-items-center h-50">
    <li>
        <router-link :to="{name:'home'}">Home </router-link>
    </li>
    <li>
        <router-link :to="{name:'blog'}">Blog </router-link>
    </li>
    <li>
        <router-link :to="{name:'about'}">About </router-link>
    </li>
    <li>
        <router-link :to="{name:'contacts'}">Contact Us </router-link>
    </li>
  </ul>

</template>

<style lang="scss">

</style>
