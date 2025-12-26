<script setup>
    import { Link, Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <meta head-key="description" name="description" content="Default Value">
    </Head>
    <div>
        <header >
            <nav>
                <div class="space-x-6">
                    <Link class="nav-link" :href="route('home')" :class="{'bg-slate-700' : $page.component === 'Home'}">Home</Link>
                </div>
                <div v-if="$page.props.auth.user" class="flex space-x-6 items-center">
                    <img  class="avatar" :src="$page.props.auth.user.avatar?
                        ('storage/' + $page.props.auth.user.avatar) : ('storage/avatars/default.jpeg')" alt="">
                    <Link :class="{'bg-slate-700' : $page.component === 'Dashboard'}" class="nav-link" :href="route('dashboard')">Dashboard</Link>
                    <Link class="nav-link" method="post" as="button" :href="route('logout')">Logout</Link>
                </div>
                <div v-else class="space-x-6">
                    <Link :class="{'bg-slate-700' : $page.component === 'Auth/Register'}" class="nav-link" :href="route('register')">Register</Link>
                    <Link :class="{'bg-slate-700' : $page.component === 'Auth/Login'}" class="nav-link" :href="route('login')">Login</Link>
                </div>
            </nav>
        </header>
        <main class="p-4">
            <slot></slot>
        </main>
    </div>
</template>