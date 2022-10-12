<template>
    <div><span>Avg Cars: {{ this.avg_cars }}</span></div>
</template>

<script>
export default {
    data() {
        return {
            avg_cars: null,
        }
    },
    methods: {
        loadAverages: function () {
            axios.get('/counts/cars-addresses').then(function (res) {
                this.avg_cars = (res.data.cars / res.data.addresses).toFixed(2);
            }.bind(this));
        }
    },
    created: function () {
        this.loadAverages()
    }
}
</script>
