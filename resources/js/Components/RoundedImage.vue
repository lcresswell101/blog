<template>
    <img :src="src" alt="Post Photo" class="rounded-full h-20 w-20 m-auto object-cover">
</template>

<script>
    export default {
        name: "RoundedImage",
        props: [
            'src'
        ]
    }
</script>

<style scoped>

</style>
