<template>
    <card :class="{'mt-6': index > 0}">
        <template #image>

        </template>

        <template #title>
            <link-main :href="route('post.show', {'post': post.id})">
                {{ post.title }}
            </link-main>
        </template>

        <template #content>
            <p class="font-semibold text-sm text-gray-800 px-1 my-3">
                {{ post.excerpt }}
            </p>
        </template>

        <template #footer>
            <jet-nav-link :href="route('user.show', {'user': post.user.id})">
                By {{ post.user.name }}
            </jet-nav-link>
        </template>
    </card>
</template>

<script>

    import JetNavLink from '@/Jetstream/NavLink'
    import Card from '@/Components/Card'
    import LinkMain from '@/Components/LinkMain'

    export default {
        name: "Post",
        props: [
            'post',
            'index'
        ],
        components: {
            JetNavLink,
            Card,
            LinkMain
        }
    }
</script>

<style scoped>

</style>
