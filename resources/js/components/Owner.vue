<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Owner</div>

                    <div class="card-body">
                        <form @submit.prevent="updateOwner">
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input id="first_name" v-model="owner.first_name" class="form-control" placeholder="First Name"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input id="last_name" v-model="owner.last_name" class="form-control" placeholder="Last Name"
                                       type="text">
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <h5>Addresses</h5>
                        <address-table-component :table_rows.sync="owner.addresses"></address-table-component>
                    </div>

                    <div class="card-body">
                        <h5>Cars</h5>
                        <car-table-component :table_rows.sync="owner.cars"></car-table-component>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {owner: {}}
    },
    methods: {
        loadOwner: function (id) {
            axios.get('/owner/' + id + '/with/addresses-cars').then(function (res) {
                // Update types used for buttons
                if (res.data.addresses.length) {
                    res.data.addresses = res.data.addresses.map(o => ({...o, 'type': 'address'}))
                }
                if (res.data.cars.length) {
                    res.data.cars = res.data.cars.map(o => ({...o, 'type': 'car'}))
                }
                this.owner = res.data;
            }.bind(this));
        },
        updateOwner() {
            this.axios.put(`/owner/${this.owner.id}`, this.owner).then((res) => {
                this.$router.push({name: 'owners'});
            });
        }
    },
    created: function () {
        this.loadOwner(this.$route.params.id)
    }
}
</script>
