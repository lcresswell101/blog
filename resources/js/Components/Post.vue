<template>
    <card :class="{'mt-6': index > 0}">
        <template #image>
            <rounded-image :src="postImage"></rounded-image>
        </template>

        <template #title>
            <link-text :href="route('post.show', {'post': post.id})">
                {{ post.title }}
            </link-text>
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

        <template #actions>
            <template v-if="isPostOwner">
                <edit :url="route('post.edit', {'post': post.id})"></edit>
                <delete :url="route('post.destroy', {'post': post.id})" :type="'Post'"></delete>
            </template>

            <template v-else>
                <favourite :url="route('user.favourite', {
                    'post': post.id,
                    'type': 'post'
                })" :favourited="isFavourite"></favourite>
            </template>
        </template>
    </card>
</template>

<script>

    import JetNavLink from '@/Jetstream/NavLink'
    import Card from '@/Components/Card'
    import LinkText from '@/Components/LinkText'
    import RoundedImage from '@/Components/RoundedImage'
    import Edit from '@/Components/Edit'
    import Delete from '@/Components/Delete'
    import Favourite from '@/Components/Favourite'

    export default {
        name: "Post",
        props: [
            'post',
            'isPostOwner',
            'isFavourite',
            'index'
        ],
        data: function()
        {
            return {
                defaultImage: 'https://eu.ui-avatars.com/api/?background=EBF4FF&color=EBF4FF',
            }
        },
        computed: {
            postImage()
            {
                return this.post.image ? this.post.image.url : this.defaultImage;
            },
        },
        components: {
            JetNavLink,
            Card,
            LinkText,
            RoundedImage,
            Edit,
            Delete,
            Favourite
        }
    }
</script>

<style scoped>

</style>
