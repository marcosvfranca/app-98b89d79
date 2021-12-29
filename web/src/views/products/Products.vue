<template>
  <section class="container">
    <div class="card">
      <header class="card-header">
        <div class="columns card-header-title">
          <div class="column is-two-thirds">
            <span>Produtos</span>
          </div>
          <div class="column">
            <b-button type="is-primary" expanded @click="showModalCreateProduct">Cadastrar produto</b-button>
          </div>
          <div class="column">
            <b-button type="is-dark" expanded @click="showModalMovementProduct">Movimentar produto</b-button>
          </div>
        </div>
      </header>
      <section class="modal-card-body section is-main-section">
        <TableListProducts 
          :products="products"
          :meta="meta"
          @onPageChange="pageChange"/>         
      </section>
    </div>
  </section>
</template>

<script>

import ModalUtil from '@/utils/modal'
import ModalCreateProduct from '@/views/products/components/ModalCreateProduct.vue'
import ModalMovementProduct from '@/views/products/components/ModalMovementProduct.vue'
import TableListProducts from '@/views/products/components/TableListProducts.vue'
import ApiService from '@/services/api.js'
import PaginationUtil from '@/utils/pagination.js'

export default {
  name: 'Products',
  components: {
    TableListProducts
  },
  data() {
    return {
      products: [],
      meta: PaginationUtil.getPaginationObject()
    }
  },
  created() {
    this.loadProducts()
  },
  methods: {
    pageChange (page) {
      this.meta.currentPage = page
      this.loadProducts()
    },
    showModalCreateProduct() {
      ModalUtil.open({
        parent: this,
        component: ModalCreateProduct,
        hasModalCard: true,
        trapFocus: true,
        events: {
          reloadProducts: () => this.loadProducts()
        }
      })
    },
    showModalMovementProduct() {
      ModalUtil.open({
        parent: this,
        component: ModalMovementProduct,
        hasModalCard: true,
        trapFocus: true,
        events: {
          reloadProducts: () => this.loadProducts()
        }
      })
    },
    loadProducts() {
      ApiService.get('products', {
          params: {
            page: this.meta.currentPage
          }       
        }
      ).then(({ data }) => {
          this.products = data.data
          this.meta = PaginationUtil.getPaginationObject(data.meta)
        })
    }
  }
}
</script>
