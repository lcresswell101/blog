<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <post v-for="(post, p) in posts" :index="p" :post="post"></post>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetNavLink from '@/Jetstream/NavLink'
    import LinkMain from '@/Components/LinkMain'
    import Post from '@/Components/Post'

    export default {
        name: "Index",
        props: ['posts'],
        components: {
            AppLayout,
            JetNavLink,
            LinkMain,
            Post
        }
    }

</script>

<style scoped>

</style>
