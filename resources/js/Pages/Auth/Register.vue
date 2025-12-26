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
        name: null,
        email: null,
        password: null,
        password_confirmation: null,
        avatar:null,
        preview: null
    })

    const change = (e) => {
        form.avatar = e.target.files[0];
        form.preview = URL.createObjectURL(e.target.files[0]);
    }

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
            <!-- Upload Avatar -->
      <div class="grid place-items-center">
        <div
          class="relative w-28 h-28 rounded-full overflow-hidden border border-slate-300"
        >
          <label for="avatar" class="absolute inset-0 grid content-end cursor-pointer">
            <span class="bg-white/70 pb-2 text-center">Avatar</span>
          </label>
          <input type="file" @input="change" id="avatar" hidden />

          <img
            class="object-cover w-28 h-28"
            :src="form.preview ?? 'storage/avatars/default.jpeg'"
          />
        </div>

        <p class="error mt-2">{{ form.errors.avatar }}</p>
      </div>
      <!-- End Upload Avatar -->

            <Textinput name="name" v-model="form.name" :message="form.errors.name"/>
             
            <Textinput name="email" type="email" v-model="form.email" :message="form.errors.email"/>

            <Textinput name="password" type="password" v-model="form.password" :message="form.errors.password"/>

            <Textinput name="password_confirmation" v-model="form.password_confirmation" />
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
            <div>
                <p class="text-slate-600 mb-2"> Already a user? <a :href="route('login')" class="text-link">Login</a></p>
                <button class="primary-btn" :disabled="form.processing">Register</button>
            </div>
        </form>
    </div>
</template> 