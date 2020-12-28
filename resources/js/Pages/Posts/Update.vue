<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Update Post
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <update-post-form :post="post" />
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import JetNavLink from '@/Jetstream/NavLink'
import UpdatePostForm from '@/Components/UpdatePostForm'

export default {
    name: "Update",
    props: [
        'post'
    ],
    components: {
        AppLayout,
        JetNavLink,
        UpdatePostForm
    }
}
</script>

<style scoped>

</style>
