<template>
    <link-text :href="url">
        <edit-icon />
    </link-text>
</template>

<script>

    import LinkText from '@/Components/LinkText'
    import EditIcon from '@/Components/Icons/EditIcon'

    export default {
        name: "Edit",
        props: [
            'url'
        ],
        components: {
            LinkText,
            EditIcon
        }
    }
</script>

<style scoped>

</style>
