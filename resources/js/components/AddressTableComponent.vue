<template>
    <div>
        <bootstrap-4-datatable :columns="columns" :data="rows" :filter="filter" :per-page="perPage" class="table-bordered"></bootstrap-4-datatable>
        <bootstrap-4-datatable-pager v-model="page" type="abbreviated"></bootstrap-4-datatable-pager>
    </div>
</template>

<script>
import TableButtonsComponent from "./TableButtonsComponent";

export default {
    props: {
        table_rows: Array
    },
    data() {
        return {
            columns: [
                {
                    label: 'ID',
                    field: 'id',
                    align: 'center'
                },
                {
                    label: 'Owner',
                    field: 'owner',
                    headerAlign: 'left',
                    align: 'left',
                    interpolate: true,
                    representedAs: function (r) {
                        return r.owner.first_name + ' ' + r.owner.last_name;
                    }
                },
                {
                    label: 'Address',
                    field: 'address',
                    headerAlign: 'left',
                    align: 'left',
                    interpolate: true,
                    representedAs: function (r) {
                        return r.address + '<br>' + r.city + '<br>' + r.country + '<br>' + r.postal_code;
                    }
                },
                {
                    label: 'Cars',
                    field: 'cars.length',
                    headerAlign: 'right',
                    align: 'right'
                },
                {
                    label: 'Actions',
                    headerAlign: 'right',
                    align: 'right',
                    component: TableButtonsComponent
                }
            ],
            rows: [],
            page: 1,
            filter:  '',
            perPage: 20,
            loading: true
        }
    },
    watch: {
        table_rows: function (table_rows) {
            this.rows = table_rows;
            // Remove columns used on sub-pages where we do not load this info
            if (table_rows.length && typeof (table_rows[0].owner) == 'undefined' &&
                typeof (table_rows[0].cars) == 'undefined') {
                // @todo we shouldn't hard code these values
                this.columns.splice(1, 1);
                this.columns.splice(2, 1);
            }
        }
    }
}
</script>
