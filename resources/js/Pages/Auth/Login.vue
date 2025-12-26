<!-- <script setup>
    import { Head } from '@inertiajs/vue3';
import Layout from '../../Layouts/Layout.vue';
    defineOptions({layout: Layout})
</script> Plus besoin car c'est dans App.js -->

<script setup>
// import { router} from '@inertiajs/vue3';
 import {useForm} from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';
import Textinput from '../../Components/Textinput.vue';


    // const form = reactive({
    const form = useForm({
        email: null,
        password: null,
        remember: null
    })

    const submit = () => {
        // router.post('/register', form)
        form.post(route('login'),
            {
                onError:() => form.reset('password'),
                preserveScroll: true
            }
        )
    };
</script>
<template>
    <Head :title="`${$page.component}`"/>
    <h1 class="title"> Login to your account </h1>

    <div class="w-2/4 mx-auto">
        <!-- Pas besoin d'action avec le form car il se gère avec inertiajs 
        Le CRSF Token se fait automatiquement avec inertia-->
        <form @submit.prevent="submit">
             
            <Textinput name="email" type="email" v-model="form.email" :message="form.errors.email"/>

            <Textinput name="password" type="password" v-model="form.password" :message="form.errors.password"/>

            <!-- <div class="mb-6">
                <label for="name">Name</label>
                <input type="text" v-model="form.name">
                <small> {{ form.errors.name }}</small>
            </div>
            <div class="mb-6">
                <label for="name">Email</label>
                <input type="text" v-model="form.email">
                <small> {{ form.errors.email}}</small>

            </div>
            <div class="mb-6">
                <label for="name">Password</label>
                <input type="password" v-model="form.password">
                <small> {{ form.errors.password }}</small>

            </div>
            <div class="mb-6">
                <label for="name">Confirm Password</label>
                <input type="password" v-model="form.password_confirmation">
            </div> -->
            <div class="flex items-center justify-between mb-2">
                <div class="flex items-center gap-2">
                    <input type="checkbox" v-model="form.remember" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                <p class="text-slate-600">Need an account?<a :href="route('register')" class="text-link"> Register</a>
                </p>
            </div>
            <button class="primary-btn" :disabled="form.processing">Login</button>
            <div>
            </div>
        </form>
    </div>
</template>