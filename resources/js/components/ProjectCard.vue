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
  <div class="card-body">
    <h5 class="card-title">{{project.name}}</h5>

    <div class="text-danger">
    <span>
      {{project.type.name}}
      </span>
    </div>
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
    // height: 300px;
    // width: 250px;
    text-align: center;
}
</style>
