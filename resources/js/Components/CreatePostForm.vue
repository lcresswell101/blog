<template>
    <jet-form-section @submitted="createPost">
        <template #title>
            Create Post
        </template>

        <template #description>
            Create a post
        </template>

        <template #form>
            <upload-photo ref="uploadPhoto" :error="form.error('photo')" :deleteRoute="'image.destroy'"></upload-photo>

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
                Saved.
            </jet-action-message>

            <jet-button :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                Save
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
    import UploadPhoto from '@/Components/UploadPhoto'

    export default {
        name: "CreatePostForm",
        components: {
            JetActionMessage,
            JetButton,
            JetFormSection,
            JetInput,
            JetInputError,
            JetLabel,
            JetSecondaryButton,
            TextArea,
            UploadPhoto
        },
        data(){
            return {
                form: this.$inertia.form({
                    '_method': 'POST',
                    title: '',
                    content: '',
                    photo: null
                }),
            }
        },
        methods: {
            createPost()
            {
                let photo = this.$refs.uploadPhoto.$refs.photo;

                if (photo) {
                    this.form.photo = photo.files[0]
                }

                this.form.post(route('post.store'), {
                    preserveScroll: true
                });
            }
        }
    }
</script>

<style scoped>

</style>
