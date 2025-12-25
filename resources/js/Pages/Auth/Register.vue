<!-- <script setup>
    import { Head } from '@inertiajs/vue3';
import Layout from '../../Layouts/Layout.vue';
    defineOptions({layout: Layout})
</script> Plus besoin car c'est dans App.js -->

<script setup>
import { reactive } from 'vue';
// import { router} from '@inertiajs/vue3';
 import {useForm} from '@inertiajs/vue3';
import { route } from '../../../../vendor/tightenco/ziggy/src/js';


    // const form = reactive({
    const form = useForm({
        name: null,
        email: null,
        password: null,
        password_confirmation: null
    })

    const submit = () => {
        // router.post('/register', form)
        form.post(route('register'),
            {
                onError:() => form.reset('password', password_confirmation),
                preserveScroll: true
            }
        )
    };
</script>
<template>
    <Head :title="`${$page.component}`"/>
    <h1 class="title">Register a new account </h1>

    <div class="w-2/4 mx-auto">
        <!-- Pas besoin d'action avec le form car il se gère avec inertiajs 
        Le CRSF Token se fait automatiquement avec inertia-->
        <form @submit.prevent="submit">
            <div class="mb-6">
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
            </div>
            <div>
                <p class="text-slate-600 mb-2"> Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>
        </form>
    </div>
</template>