<template>
    <textarea class="form-input rounded-md shadow-sm" :value="value" @input="$emit('input', $event.target.value)" ref="input" />
</template>

<script>
    export default {
        name: "TextArea",
        props: ['value'],
        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

<style scoped>

</style>
