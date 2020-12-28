<template>
    <card>
        <template #image>

        </template>

        <template #title>
            <link-main :href="route('post.show', {'post': comment.commentable.id})">
                {{ comment.commentable.title }}
            </link-main>
        </template>


        <template #content>
            <p class="font-semibold text-sm text-gray-800 px-1 mt-3">
                {{ comment.content }}
            </p>
        </template>
    </card>
</template>

<script>

    import JetNavLink from '@/Jetstream/NavLink'
    import Card from '@/Components/Card'
    import LinkMain from '@/Components/LinkMain'

    export default {
        name: "Comment",
        props: [
            'comment'
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
