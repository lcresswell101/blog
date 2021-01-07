<template>
    <div class="col-span-6 sm:col-span-4">
        <input type="file" class="hidden"
               ref="photo"
               @change="updatePhotoPreview">

        <jet-label for="photo" value="Photo" />

        <!-- Current Profile Photo -->
        <div class="mt-2" v-show="! photoPreview">
            <img :src="url" alt="Current Profile Photo" class="rounded-full h-20 w-20 object-cover">
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" v-show="photoPreview">
            <span class="block rounded-full w-20 h-20"
                  :style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
            </span>
        </div>

        <jet-secondary-button class="mt-2 mr-2" type="button" @click.native.prevent="selectNewPhoto">
            Select A New Photo
        </jet-secondary-button>

        <jet-secondary-button type="button" class="mt-2" @click.native.prevent="deletePhoto" v-if="path">
            Remove Photo
        </jet-secondary-button>

        <jet-input-error :message="error" class="mt-2" />
    </div>
</template>

<script>

    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetLabel from '@/Jetstream/Label'
    import JetInputError from '@/Jetstream/InputError'

    export default {
        name: "UploadPhoto",
        components: {
            JetSecondaryButton,
            JetLabel,
            JetInputError
        },
        props: {
            url: {
                default: 'https://eu.ui-avatars.com/api/?background=EBF4FF&color=EBF4FF'
            },
            path: null,
            error: null,
            deleteRoute: null,
        },
        data: function()
        {
            return {
                photoPreview: null
            }
        },
        methods: {
            selectNewPhoto() {
                this.$refs.photo.click();
            },

            updatePhotoPreview() {
                const reader = new FileReader();

                reader.onload = (e) => {
                    this.photoPreview = e.target.result;
                };

                reader.readAsDataURL(this.$refs.photo.files[0]);
            },

            deletePhoto() {
                this.$inertia.delete(route(this.deleteRoute), {
                    preserveScroll: true,
                }).then(() => {
                    this.photoPreview = null
                });
            },
        }
    }
</script>

<style scoped>

</style>
