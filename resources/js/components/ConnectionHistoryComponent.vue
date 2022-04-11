<template>
    <div class="mt-2 table-responsive">

        <div class="mb-1">
            <div class="d-grid gap-2">
                <b-button block variant="primary" @click="showModal"
                    >Add Connection</b-button
                >
            </div>

            <add-code-component></add-code-component>
            <add-plan-component></add-plan-component>

            <b-modal ref="my-modal" hide-footer title="Add Connection">
                <b-form-input
                    class="mb-1"
                    v-model="form.origin"
                    placeholder="Origem"
                ></b-form-input>
                <b-form-input
                    class="mb-1"
                    v-model="form.destiny"
                    placeholder="Destino"
                ></b-form-input>
                <b-form-input
                    class="mb-1"
                    v-model="form.total_minutes"
                    placeholder="Total de Minutos"
                ></b-form-input>

                <select
                    v-model="form.plan_id"
                    class="form-select"
                    aria-label="Default select example"
                >
                    <option value="1">FaleMais 30</option>
                    <option value="2">FaleMais 60</option>
                    <option value="3">FaleMais 120</option>
                </select>
                <div class="d-grid gap-2 mt-2">
                    <b-button variant="outline-success" @click="addConnection()"
                        >Submit</b-button
                    >
                    <b-button
                        variant="outline-danger"
                        @click="hideModal"
                        >Close</b-button
                    >
                </div>
            </b-modal>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Origem</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Tempo</th>
                    <th scope="col">Plano FaleMais</th>
                    <th scope="col">Com FaleMais</th>
                    <th scope="col">Sem FaleMais</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in connection_history" :key="item">
                    <td>{{ item.origin }}</td>
                    <td>{{ item.destiny }}</td>
                    <td>{{ item.total_minutes }}</td>
                    <td>{{ item.plan.name }}</td>
                    <td>$ {{ formatPrice(item.value) }}</td>
                    <td>$ {{ formatPrice(item.value_without_plan) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data() {
        return {
            connection_history: [],
            form: {
                origin: null,
                destiny: null,
                total_minutes: null,
                plan_id: 1,
            },
        };
    },
    created() {
        this.getHistory();
        console.log(this.connection_history);
    },
    methods: {
        getHistory() {
            axios.get("connection_history").then((response) => {
                if (response.status == 200) {
                    this.connection_history = response.data.connection_history;
                    // console.log('CH Get:',this.connection_history);
                }
            });
        },
        addConnection() {
            axios.post("connection_history", this.form).then((response) => {
                if (response.status == 200) {
                    this.getHistory();
                    console.log("CH Post: ", response.data);
                }
            });
        },
        showModal() {
            this.$refs["my-modal"].show();
        },
        hideModal() {
            this.$refs["my-modal"].hide();
        },
        formatPrice(value) {
            let val = (value / 1).toFixed(2).replace(".", ",");
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
    },
};
</script>
