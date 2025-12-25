<script setup>
    defineProps({
        user : String
    })
</script>

<template>

    <!-- <Head>
        <meta head-key="description" name="description">
    </Head> -->

    <Head title="About" />
    <div>
        <h1>
            About Page {{ user }}
        </h1>
    </div>
</template>