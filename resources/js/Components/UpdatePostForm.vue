<template>
    <jet-form-section @submitted="updatePost">
        <template #title>
            Update Post
        </template>

        <template #description>
            Update a post
        </template>

        <template #form>
            <!--      Title      -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="title" value="Title" />
                <jet-input id="title" type="text" v-model="form.title" class="mt-1 block w-full"/>
                <jet-input-error :message="form.error('title')" class="mt-2" />
            </div>

            <!--      Content      -->
            <div class="col-span-6 sm:col-span-4">
                <jet-label for="content" value="Content" />
                <text-area id="content" type="textarea" v-model="form.content" class="mt-1 block w-full"/>
                <jet-input-error :message="form.error('content')" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <jet-action-message :on="form.recentlySuccessful" class="mr-3">
                Updated.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Update
            </jet-button>
        </template>
    </jet-form-section>
</template>

<script>
import JetButton from '@/Jetstream/Button'
import JetFormSection from '@/Jetstream/FormSection'
import JetInput from '@/Jetstream/Input'
import JetInputError from '@/Jetstream/InputError'
import JetLabel from '@/Jetstream/Label'
import JetActionMessage from '@/Jetstream/ActionMessage'
import JetSecondaryButton from '@/Jetstream/SecondaryButton'
import TextArea from '@/Components/TextArea'

export default {
    name: "UpdatePostForm",
    components: {
        JetActionMessage,
        JetButton,
        JetFormSection,
        JetInput,
        JetInputError,
        JetLabel,
        JetSecondaryButton,
        TextArea
    },
    props: [
        'post'
    ],
    data(){
        return {
            form: this.$inertia.form({
                '_method': 'PUT',
                title: this.post.title,
                content: this.post.content
            }, {
                resetOnSuccess: false
            })
        }
    },
    methods: {
        updatePost()
        {
            this.form.post(route('post.update', {'post': this.post.id}), {
                preserveScroll: true
            });
        }
    }
}
</script>

<style scoped>

</style>
