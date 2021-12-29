<template>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Movimentações do produto</p>
      <button type="button" class="delete" @click="$emit('close')"/>
    </header>
    <section class="modal-card-body section is-main-section">
      <TableListProductsMovements :movements="movements" />
    </section>
    <footer class="modal-card-foot is-justify-content-flex-end">
      <b-button
        label="Fechar"
        @click="$emit('close')" />
    </footer>
  </div>
</template>

<script>

import ApiService from '@/services/api.js'
import TableListProductsMovements from '@/views/products/components/TableListProductsMovements.vue'

export default {
  name: 'ModalListProductMovements',
  components: {
    TableListProductsMovements
  },
  props: {
    product_id: Number
  },
  data() {
    return {
      movements: []
    }
  },
  created() {
    this.loadProductMovements()
  },
  methods: {
    loadProductMovements() {
      ApiService.get('products/movement', {
        params: {
          product_id: this.product_id
        }
      }).then(({data}) => {
        this.movements = data
      })
    }
  }
}
</script>
