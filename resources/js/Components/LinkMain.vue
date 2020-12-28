<template>
    <a :href="href" class="font-semibold text-md text-gray-800 leading-tight px-1 border-b-2 border-transparent hover:border-gray-800 focus:border-gray-800">
        <slot></slot>
    </a>
</template>

<script>
export default {
    name: "LinkMain",
    props: ['href']
}
</script>

<style scoped>

</style>
