<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                User
            </h2>
        </template>

        <div class="max-w-7xl mx-auto">
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 lg:px-8">
                        <dt class="text-sm font-medium text-gray-500">
                            Full name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ current_user.name }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6 lg:px-8">
                        <dt class="text-sm font-medium text-gray-500">
                            Email
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ current_user.email }}
                        </dd>
                    </div>
                </dl>
            </div>

            <!--     DROPDOWN      -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <jet-dropdown align="left" width="48">
                        <template #trigger>
                            <button class="flex items-center capitalize text-md font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>
                                    {{ findActive }}
                                </div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </template>

                        <template #content>
                            <button type="button" v-for="(type, t) in content" @click="setActive(t)" class="block capitalize w-full px-4 py-2 text-sm leading-5 text-gray-700 text-left hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out">
                                {{ type.name }}
                            </button>
                        </template>
                    </jet-dropdown>
                </div>
            </header>

            <!--      TABS      -->
            <div class="py-6 lg:py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <template v-if="findActive === 'posts'">
                        <post v-for="post in current_user.posts" :key="post.id" :post="post"></post>
                    </template>

                    <template v-if="findActive === 'comments'">
                        <comment v-for="comment in current_user.comments" :key="comment.id" :comment="comment"></comment>
                    </template>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>

    import AppLayout from '@/Layouts/AppLayout'
    import JetDropdown from '@/Jetstream/Dropdown'
    import JetDropdownLink from '@/Jetstream/DropdownLink'
    import Comment from '@/Components/Comment';
    import Post from '@/Components/Post';

    export default {
        name: "Show",
        props: ['current_user'],
        components: {
            AppLayout,
            JetDropdown,
            JetDropdownLink,
            Comment,
            Post
        },
        computed: {
            findActive: function()
            {
                return this.content.find(type => type.active).name;
            }
        },
        methods:
        {
            setActive(t)
            {
                this.content.forEach((cur, i) => {
                    cur.active = i === t;
                });
            }
        },
        data()
        {
            return {
                content: [
                    {
                        name: 'posts',
                        active: 1,
                    },
                    {
                        name: 'comments',
                        active: 0,
                    }
                ]
            }
        },
        mounted()
        {
            this.createArr();
        }
    }

</script>

<style scoped>

</style>
