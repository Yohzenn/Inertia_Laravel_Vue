<script setup>
    import Layout from '../Layouts/Layout.vue';
    defineOptions({ layout: Layout})
    
</script>

<template>
    <Head :title="`${$page.component}`" />
        <h1>{{ $page.props.user }}</h1>
        <Link class="mt-[1400px] block" preserve-scroll> Refresh </Link>
</template>