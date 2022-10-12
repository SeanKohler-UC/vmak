<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><b>Cars</b></div>

                    <div class="card-body">
                        <car-table-component :table_rows.sync="this.table_rows"></car-table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {table_rows: []}
    },
    methods: {
        showCars: function () {
            axios.get('/car/with/owner-address').then(function (res) {
                this.table_rows = res.data.map(o => ({...o, 'type': 'car'}));
            }.bind(this));
        }
    },
    created: function () {
        this.showCars()
    }
}
</script>
