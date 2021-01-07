<template>
    <div>
        <link-button @click.native="confirmDelete = true">
            <delete-icon />
        </link-button>

        <jet-dialog-modal :show="confirmDelete" @close="!confirmDelete">
            <template #title>
                {{ `Delete ${type}?` }}
            </template>

            <template #content>
                Please confirm you would like to delete this {{ type }}
            </template>

            <template #footer>
                <jet-secondary-button @click.native="confirmingLogout = false">
                    Nevermind
                </jet-secondary-button>

                <jet-button class="ml-2" @click.native="deleteSubmit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    {{ `Delete ${type}`}}
                </jet-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>

    import JetButton from '@/Jetstream/Button'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import LinkButton from '@/Components/LinkButton'
    import DeleteIcon from '@/Components/Icons/DeleteIcon'

    export default {
        name: "Delete",
        props: [
            'url',
            'type'
        ],
        data: function()
        {
            return {
                confirmDelete: false,
                form: this.$inertia.form({
                    '_method': 'DELETE',
                })
            }
        },
        components: {
            JetButton,
            JetSecondaryButton,
            JetDialogModal,
            LinkButton,
            DeleteIcon
        },
        methods: {
            deleteSubmit()
            {
                this.form.post(this.url, {
                    preserveScroll: true
                }).then(response => {
                    this.confirmDelete = false;
                });
            }
        }
    }
</script>

<style scoped>

</style>
