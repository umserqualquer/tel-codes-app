<template>
    <div class="mt-2">
        <div class="mb-1">
            <div class="d-grid gap-2">
                <b-button block variant="primary" @click="showModal">Add Code</b-button>
            </div>

            <b-modal ref="my-modal" hide-footer title="Add Code">
                <b-form-input
                    class="mb-1"
                    v-model="form.origin"
                    type="number"
                    placeholder="Origem"
                ></b-form-input>
                <b-form-input
                    class="mb-1"
                    type="number"
                    v-model="form.destiny"
                    placeholder="Destino"
                ></b-form-input>
                <b-form-input
                    class="mb-1"
                    v-model="form.value"
                    placeholder="Valor"
                ></b-form-input>
                <div class="d-grid gap-2 mt-2">
                    <b-button variant="outline-success" @click="addCode()">Submit</b-button>
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
                origin: null,
                destiny: null,
                value: null
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
        addCode() {

            console.log(this.form)

            axios.post("code", this.form).then((response) => {
                if (response.status == 200) {
                    console.log('Code Post: ',response.data)
                }
            });
        },
    },
};
</script>
