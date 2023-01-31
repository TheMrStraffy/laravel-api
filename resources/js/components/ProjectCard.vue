<script>
export default {
  name: "ProjectCard",
  props:{
    projectList: Object,
    },
  data(){
    return {

      }
  }
}
</script>
<template>
  <div
  v-for="project in projectList" :key="project.id"
  class="mc-card me-4 mb-4 col-3">
  <img class="card-img-top" :src="project.cover_image" :alt="project.name">
    <h5 class="card-title">{{project.name}}</h5>
    <div class="text-danger">
    <span>
      {{project.type.name}}
      </span>
    </div>
  <div class="card-body d-flex justify-content-around align-content-center">

    <div
    v-for="technology in project.technologies" :key="technology.id"
    >
      <span class="text-white bg-dark">{{technology.name}}</span>
    </div>
    <router-link :to="{name: 'detail', params:{slug: project.slug} }">Post Detail</router-link>
  </div>
</div>

</template>


<style lang="scss" scoped>
.mc-card{
    position: relative;
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
