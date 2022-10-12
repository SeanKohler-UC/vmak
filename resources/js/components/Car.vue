<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Edit Car</div>

                    <div class="card-body">
                        <form @submit.prevent="updateCar">
                            <div class="form-group">
                                <label for="make">Make</label>
                                <input id="make" v-model="car.make" class="form-control" placeholder="Make" type="text">
                            </div>
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input id="model" v-model="car.model" class="form-control" placeholder="Model"
                                       type="text">
                            </div>
                            <div class="form-group">
                                <label for="year">Year</label>
                                <input id="year" v-model="car.year" class="form-control" placeholder="Year" type="text">
                            </div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </form>
                    </div>

                    <div class="card-body">
                        <h5>Owner</h5>
                        <owner-table-component :table_rows.sync="owner_rows"></owner-table-component>
                    </div>

                    <div class="card-body">
                        <h5>Address</h5>
                        <address-table-component :table_rows.sync="address_rows"></address-table-component>
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
            car: {},
            owner_rows: [],
            address_rows: []
        }
    },
    methods: {
        loadCar: function (id) {
            axios.get('/car/' + id + '/with/address-owner').then(function (res) {
                res.data.owner.type = 'owner';
                res.data.address.type = 'address';
                this.car = res.data;
                this.owner_rows = [this.car.owner];
                this.address_rows = [this.car.address];
            }.bind(this));
        },
        updateCar() {
            this.axios.put(`/car/${this.car.id}`, this.car).then((res) => {
                this.$router.push({name: 'cars'});
            });
        }
    },
    created: function () {
        this.loadCar(this.$route.params.id)
    }
}
</script>
