<script>
import axios from 'axios';
import {BASE_URL} from '../data/data';

export default {
    name:'ContactForm',
    data(){
        return{
            name: '',
            email: '',
            message: '',
            errors: {},
            loading: false,
            showform: true
        }
    },
    methods:{
        sendForm(){
            this.loading= true;
            const data={
                name: this.name,
                email: this.email,
                message: this.message
            }
            axios.post(`${BASE_URL}contacts`, data)
                .then(result =>{
                    this.loading = false;
                    this.showform=false;
                    if(!result.data.success){
                        this.errors = result.data.errors;
                        console.log(this.errors);
                    } else{
                        this.name = '';
                        this.email = '';
                        this.message = '';
                        this.errors = '';
                    }
                })
        }
    },
    mounted(){
    }
}
</script>

<template>
<form v-if="showform" @submit.prevent="sendForm()">
    <div>
        <input type="text" v-model.trim="name" placeholder="Name" :class="{'is-invalid':errors.name}">
        <p v-for="(error,index) in errors.name" :key="'name' + index" class="error">{{error}}</p>
    </div>
    <div>
        <input type="email" v-model.trim="email" placeholder="Email" :class="{'is-invalid':errors.email}">
        <p v-for="(error,index) in errors.email" :key="'email' + index" class="error">{{error}}</p>
    </div>
    <div>
        <textarea v-model.trim="message" placeholder="Message Here" :class="{'is-invalid' : errors.message}" cols="30" rows="10"></textarea>
        <p v-for="(error,index) in errors.message" :key="'message' + index" class="error">{{error}}</p>
    </div>
    <button type="submit" :disabled="loading">{{loading ? 'Invio in corso..' : 'Invia'}}</button>
</form>
<h4 v-else>Email sent correctly</h4>

</template>


<style>

</style>
