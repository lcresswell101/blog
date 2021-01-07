<template>
    <link-button @click.native="favourite">
        <template v-if="favourited">
            <favourite-filled-icon></favourite-filled-icon>
        </template>
        <template v-else>
            <favourite-unfilled-icon></favourite-unfilled-icon>
        </template>
    </link-button>
</template>

<script>

    import LinkButton from '@/Components/LinkButton'
    import FavouriteUnfilledIcon from '@/Components/Icons/FavouriteUnfilledIcon'
    import FavouriteFilledIcon from '@/Components/Icons/FavouriteFilledIcon'

    export default {
        name: "Favourite",
        props: [
            'url',
            'favourited'
        ],
        data: function()
        {
            return {
                form: this.$inertia.form({
                    '_METHOD': 'POST'
                })
            }
        },
        components: {
            LinkButton,
            FavouriteUnfilledIcon,
            FavouriteFilledIcon
        },
        methods: {
            favourite()
            {
                if(this.favourited)
                {
                    return;
                }

                this.form.post(this.url, {
                    preserveScroll: true
                });
            }
        }
    }
</script>

<style scoped>

</style>
