<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>Owners</b><br/>
                        <owner-averages-component></owner-averages-component>
                    </div>

                    <div class="card-body">
                        <owner-table-component :table_rows.sync="table_rows"></owner-table-component>
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
        showOwners: function () {
            axios.get('/owner/with/addresses-cars').then(function (res) {
                this.table_rows = res.data.map(o => ({...o, 'type': 'owner'}));
            }.bind(this));
        }
    },
    created: function () {
        this.showOwners()
    }
}
</script>
