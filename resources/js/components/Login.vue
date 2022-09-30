<template>
    <div>
        <form action="#" @submit.prevent="login">
            
                <label for="">Email</label>
                <input type="email" v-model="form.email">

                <label for="">Password</label>
                <input type="password" v-model="form.password">
            
            
                <button type="submit">Sign In</button>
            
        </form>
    </div>
</template>
<script>

import axios from 'axios'

axios.defaults.withCredentials = true;
axios.defaults.baseURL = "http://localhost:8000/";


export default {
    data() {
        return {
            form: {
                email: "",
                password:""
            }
        }
    },
    methods: {
        async login() {
            axios.post('api/login',this.form)
            .then(res => {
                console.log(res)
                if(res.status == 200){
                    localStorage.setItem('token', res.data.token)
                
                    this.$router.push({ name: 'dashboard'})
                }
            })
            .catch(exception => {
                alert(exception)
            })
        }
    }
}
</script>
