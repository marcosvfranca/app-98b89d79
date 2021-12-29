<template>
  <b-table
    v-if="products"
    :data="products"
    backend-pagination
    :paginated="true"
    :total="meta.total"
    :per-page="meta.perPage"
    :current-page.sync="meta.currentPage"
    default-sort="product.name"
    aria-next-label="Próxima página"
    aria-previous-label="Página anterior"
    aria-page-label="Página"
    aria-current-label="Página atual"
    @page-change="onPageChange"
  >

    <b-table-column field="name" label="Nome" sortable v-slot="props">
        {{ props.row.name }}
    </b-table-column>

    <b-table-column field="sku" label="sku" width="40" sortable numeric v-slot="props">
        {{ props.row.sku }}
    </b-table-column>

    <b-table-column field="initial_quantity" label="Quantidade inicial:" sortable centered v-slot="props">
        {{ props.row.initial_quantity }}
    </b-table-column>

    <b-table-column field="created_at" label="Criado em:" sortable centered v-slot="props">
        <span class="tag is-success">
            {{ new Date(props.row.created_at).toLocaleDateString() }}
        </span>
    </b-table-column>

    <b-table-column label="Ações" centered v-slot="props">
        <b-button type="is-primary" size="is-small" @click="showModalProductMovements(props.row.product_id)">
            Movimentos
        </b-button>
    </b-table-column>

    <template #footer v-if="products">
        <div class="has-text-left">
            Mostrando de {{ meta.from }} até {{ meta.to }} de {{ meta.total }}
        </div>
    </template>
  </b-table>
  <AlertNoContentTable v-else />
</template>

<script>

import AlertNoContentTable from '@/components/alerts/AlertNoContentTable.vue'
import ModalUtil from '@/utils/modal.js'
import ModalListProductMovements from './ModalListProductMovements.vue'

export default {
    name: 'TableListProducts',
    components: {
        AlertNoContentTable
    },
    props: {
        products: {
            type: Array
        },
        meta: {
            type: Object
        }
    },
    methods: {
      onPageChange (page) {
        this.$emit('onPageChange', page)
      },
      showModalProductMovements(product_id) {
        ModalUtil.open({
          parent: this,
          component: ModalListProductMovements,
          hasModalCard: true,
          trapFocus: true,
          props: {
              product_id: product_id
          }
        })
      }
    },
}
</script>
