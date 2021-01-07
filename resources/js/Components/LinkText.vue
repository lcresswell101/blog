<template>
    <inertia-link :href="href" class="inline-block font-semibold text-md text-gray-800 leading-tight px-1 border-transparent hover:border-gray-800 focus:border-gray-800">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    name: "LinkText",
    props: ['href']
}
</script>

<style scoped>

</style>
