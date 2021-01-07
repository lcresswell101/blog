<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Posts
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <post v-for="(post, p) in posts"
                      :index="p"
                      :key="p"
                      :post="post"
                      :isPostOwner="isPostOwner(post)"
                      :isFavourite="isFavourite(post)"
                ></post>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import JetNavLink from '@/Jetstream/NavLink'
    import LinkText from '@/Components/LinkText'
    import Post from '@/Components/Post'

    export default {
        name: "Index",
        props: [
            'posts',
            'favourite_posts'
        ],
        methods: {
            isPostOwner(post)
            {
                return this.$page.user.id === post.user.id;
            },
            isFavourite(post)
            {
                return this.favourite_posts.includes(post.id);
            }
        },
        components: {
            AppLayout,
            JetNavLink,
            LinkText,
            Post
        }
    }

</script>

<style scoped>

</style>
