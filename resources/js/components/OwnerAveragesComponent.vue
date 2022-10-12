<template>
    <div>
        <span>Avg Cars: {{ this.avg_cars }}</span><br/>
        <span>Avg Addresses: {{ this.avg_addresses }}</span>
    </div>
</template>

<script>
export default {
    data() {
        return {
            avg_cars: null,
            avg_addresses: null
        }
    },
    methods: {
        loadAverages: function () {
            axios.get('/counts/owners-cars-addresses').then(function (res) {
                this.avg_cars = (res.data.cars / res.data.owners).toFixed(2);
                this.avg_addresses = (res.data.addresses / res.data.owners).toFixed(2);
            }.bind(this));
        }
    },
    created: function () {
        this.loadAverages()
    }
}
</script>
