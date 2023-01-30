<script>
import axios from 'axios';
import {BASE_URL} from '../data/data';
import {store} from '../data/store';

import ProjectCard from '../components/ProjectCard.vue';


export default {
    name:'blog',
    components: { ProjectCard },
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
      <h1>Blog</h1>
      <div class="row justify-content-around">

  <project-card :projectList="store.projects" />
</div>
    </template>

<style>

</style>
