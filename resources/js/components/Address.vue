<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Address</div>

                    <div class="card-body">
                        <form @submit.prevent="updateAddress">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input id="address" v-model="address.address" class="form-control" placeholder="Address"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label for="city">City</label>
                                <input id="city" v-model="address.city" class="form-control" placeholder="City"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label for="postal_code">Postal Code</label>
                                <input id="postal_code" v-model="address.postal_code" class="form-control" placeholder="Postal Code"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <input id="country" v-model="address.country" class="form-control" placeholder="Country"
                                       type="text">
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <h5>Owner</h5>
                        <owner-table-component :table_rows.sync="owner_rows"></owner-table-component>
                    </div>

                    <div class="card-body">
                        <h5>Cars</h5>
                        <car-table-component :table_rows.sync="address.cars"></car-table-component>
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
            address: {},
            owner_rows: []
        }
    },
    methods: {
        loadAddress: function (id) {
            axios.get('/address/' + id + '/with/owner-cars').then(function (res) {
                // Update types used for buttons
                res.data.owner.type = 'owner';
                if (res.data.cars.length) {
                    res.data.cars = res.data.cars.map(o => ({...o, 'type': 'car'}))
                }
                this.address = res.data;
                this.owner_rows = [this.address.owner];
            }.bind(this));
        },
        updateAddress() {
            this.axios.put(`/address/${this.address.id}`, this.address).then((res) => {
                this.$router.push({name: 'addresses'});
            });
        }
    },
    created: function () {
        this.loadAddress(this.$route.params.id)
    }
}
</script>
