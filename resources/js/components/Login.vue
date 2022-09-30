<template>
    <div>
        <form action="#" @submit.prevent="login" class="mt-4 pt-2">
            <div class="form-floating form-floating-custom mb-3">
                <input type="email" class="form-control" id="input-username" placeholder="Enter User Name" v-model="form.email">
                <label for="input-username">Email</label>
                <div class="form-floating-icon">
                    <i class="uil uil-users-alt"></i>
                </div>
            </div>
            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                <input type="password" class="form-control" id="password-input" placeholder="Enter Password" v-model="form.password">
                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                </button>
                <label for="password-input">Password</label>
                <div class="form-floating-icon">
                    <i class="uil uil-padlock"></i>
                </div>
            </div>
            
            <div class="mt-3">
                <button class="btn btn-primary w-100" type="submit">Log In</button>
            </div>
            
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
                    window.location.pathname = "/dashboard";
                }
            })
            .catch(exception => {
                alert(exception)
            })
        }
    }
}
</script>
