<template>
    <div>
        <button class="btn btn-primary" @click="editRow(row)">View</button>
        <button class="btn btn-primary" @click="editRow(row)">Edit</button>
        <button class="btn btn-danger" @click="deleteRow(row)">Delete</button>
    </div>
</template>

<script>
export default {
    props: {
        row: {
            type: Object
        }
    },
    methods: {
        editRow(row) {
            window.location.href = `/${row.type}/${row.id}/edit`;
        },
        deleteRow(row) {
            if (confirm(`Are you sure to delete this ${row.type} with id of ${row.id}?`)) {
                this.axios.delete(`/${row.type}/${row.id}`).then(response => {
                    location.reload();
                });
            }
        }
    }
}
</script>
