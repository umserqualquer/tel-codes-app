<template>
    <div class="mt-2">
        <div class="mb-1">
            <div class="d-grid gap-2">
                <b-button block variant="primary" @click="showModal">Add Plan</b-button>
            </div>

            <b-modal ref="my-modal" hide-footer title="Add Plan">
                <b-form-input
                    class="mb-1"
                    v-model="form.name"
                    placeholder="Nome"
                ></b-form-input>
                <b-form-input
                    class="mb-1"
                    type="number"
                    v-model="form.time"
                    placeholder="Tempo"
                ></b-form-input>
                <div class="d-grid gap-2 mt-2">
                    <b-button variant="outline-success" @click="addPlan()">Submit</b-button>
                    <b-button variant="outline-danger" @click="hideModal">Close</b-button>
                </div>
            </b-modal>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            form: {
                name: null,
                time: null
            },
        };
    },
    created() {
    },
    methods: {
        showModal() {
            this.$refs["my-modal"].show();
        },
        hideModal() {
            this.$refs["my-modal"].hide();
        },
        addPlan() {

            console.log(this.form)

            axios.post("plan", this.form).then((response) => {
                if (response.status == 200) {
                    console.log('Plan Post: ', response.data)
                }
            });
        },
    },
};
</script>
