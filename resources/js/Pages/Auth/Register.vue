<!-- <script setup>
    import { Head } from '@inertiajs/vue3';
import Layout from '../../Layouts/Layout.vue';
    defineOptions({layout: Layout})
</script> Plus besoin car c'est dans App.js -->

<script setup>
import { reactive } from 'vue';

    const form = reactive({
        name: null,
        email: null,
        password:null,
        password_confirmation: null
    })

    const submit = () => {
        console.log(form);
    }
</script>
<template>
    <Head :title="`${$page.component}`"/>
    <h1 class="title">Register a new account </h1>

    <div class="w-2/4 mx-auto">
        <!-- Pas besoin d'action avec le form car il se gère avec inertiajs -->
        <form @submit.prevent="submit">
            <div class="mb-6">
                <label for="name">Name</label>
                <input type="text" v-model="form.name">
            </div>
            <div class="mb-6">
                <label for="name">Email</label>
                <input type="text" v-model="form.email">
            </div>
            <div class="mb-6">
                <label for="name">Password</label>
                <input type="password" v-model="form.password">
            </div>
            <div class="mb-6">
                <label for="name">Confirm Password</label>
                <input type="password" v-model="form.password_confirmation">
            </div>
            <div>
                <p class="text-slate-600 mb-2"> Already a user? <a href="#" class="text-link">Login</a></p>
                <button class="primary-btn">Register</button>
            </div>
        </form>
    </div>
</template>