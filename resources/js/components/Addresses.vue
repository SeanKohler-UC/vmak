<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Addresses</div>

                    <div class="card-body">
                        <address-table-component :table_rows.sync="table_rows"></address-table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    data() {
        return {
            table_rows: []
        }
    },
    methods: {
        showAddresses: function () {
            axios.get('/address/with/cars-owner').then(function (res) {
                this.table_rows = res.data.map(o => ({...o, 'type': 'address'}));
            }.bind(this));
        }
    },
    created: function () {
        this.showAddresses()
    }
}
</script>
