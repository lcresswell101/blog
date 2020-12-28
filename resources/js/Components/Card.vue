<template>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" :class="classes">
        <div class="grid grid-cols-12 gap-4 p-6 bg-white border-b border-gray-200">
            <div class="col-span-1">
                <slot name="image"></slot>
            </div>
            <div class="col-span-11">
                <slot name="title"></slot>

                <slot name="content"></slot>

                <slot name="footer"></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Card",
    props: ['classes']
}
</script>

<style scoped>

</style>
