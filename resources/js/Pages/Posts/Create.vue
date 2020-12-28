<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <create-post-form />
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetNavLink from '@/Jetstream/NavLink'
    import CreatePostForm from '@/Components/CreatePostForm'

    export default {
        name: "Create",
        components: {
            AppLayout,
            JetNavLink,
            CreatePostForm
        }
    }
</script>

<style scoped>

</style>
