<template>
    <b-table
        v-if="movements"
        :data="movements">
        <b-table-column field="quantity" label="Quantidade movimentada" sortable v-slot="props">
            {{ props.row.quantity }}
        </b-table-column>

        <b-table-column field="movement_date" label="Movimentado em:" sortable centered v-slot="props">
            <span class="tag is-success">
                {{ new Date(props.row.movement_date).toLocaleDateString() }}
            </span>
        </b-table-column>

    </b-table>
    <AlertNoContentTable v-else />
</template>

<script>

import AlertNoContentTable from '@/components/alerts/AlertNoContentTable.vue'

export default {
  components: {
    AlertNoContentTable
  },
  props: {
      movements: Array
  }
}
</script>
