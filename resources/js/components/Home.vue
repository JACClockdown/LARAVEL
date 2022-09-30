<template>
    <div class="container">
        <hr>
        <form class="row g-3" v-on:submit.prevent="submitForm">
            <div class="col-md-6">
                <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Search</label>
                    <input type="text" class="form-control" id="" placeholder="Search"  v-model="form.name">
                </div>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Search</button>
            </div>
        </form>
        <hr>
        <div v-if="items.length > 0" >
            <section class="mx-auto my-5" style="max-width: 23rem;">
                <div v-for="item in items" :key="item.id">
                    <div class="card testimonial-card mt-2 mb-3">
                        <div class="card-up aqua-gradient"></div>                      
                        <div class="avatar mx-auto white">
                            <img class="rounded-circle img-fluid" :src=item.sprites.other.home.front_shiny alt="pokemon avatar">
                        </div>
                        <div class="card-body">
                            <p class="number-prefix">
                                <span>
                                    N.º
                                </span>
                                {{ item.id }}
                            </p>
                            <h3 class="card-title">{{ item.name }}</h3>
                            
                                <h6 class="abilities">
                                    Abilities:
                                </h6>
                                <ul v-for="power in item.abilities" :key="power.id">
                                    <li>
                                        {{ power.ability.name }}
                                    </li>
                                </ul>
                                <h6> Class </h6>
                                <ul v-for="type in item.types" :key="type.id">
                                    <li>
                                        {{ type.type.name }}
                                    </li>
                                </ul>
                            
                        </div>
                    </div>
                    <br>
                </div>
            </section>
        </div>
        <div v-else>
            <h1>
                No information data
            </h1>
        </div>
        
    </div>

</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                form: {
                    name: '',
                },
                items: [],
                token: localStorage.getItem('token')
            }
        },
        methods:{
            submitForm() {
                this.form.name = this.form.name.toLowerCase()
                this.items.pop()
                axios.post('http://localhost:8000/api/pokemon', this.form,{
                    headers: {
                        'Authorization': `Bearer ${this.token}`
                    }
                })
                .then((res) => {
                    console.log(res.data)
                    this.items.push(res.data)
                })
                .catch((error) => {
                    console.error(error)
                }).finally(() => {
                
                });
            },
        }
    }
</script>
<style scoped>
    .container {
        background-color: rgb(186, 184, 184);
    }
    .testimonial-card .card-up {
        height: 120px;
        overflow: hidden;
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }
    .aqua-gradient {
        background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
    }
    .number-prefix {
        color: #919191;
    }
    .testimonial-card .avatar {
        width: 120px;
        /* margin-top: -600px;
        overflow: hidden;
        border: 5px solid #fff;*/
        border-radius: 50%;  
    }
    .abilities {
        background: linear-gradient(180deg, #eed535 50%, #eed535 50%);
    }
    .img-fluid {
        max-width: 100%;
        height: auto;
    }
    .rounded-circle {
        border-radius: 50% !important;
    }
</style>
