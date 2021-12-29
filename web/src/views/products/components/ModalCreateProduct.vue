<template>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Cadastrar produto</p>
      <button type="button" class="delete" @click="$emit('close')"/>
    </header>
    <section class="modal-card-body section is-main-section">
      <div class="columns field is-horizontal">
        <div class="column is-4 p-0">
          <div class="field-label is-normal">
            <label class="label">Nome</label>
          </div>
        </div>
        <div class="column is-8 p-0">
          <div class="field-label is-normal has-text-left">
            <b-input v-model="form.name"></b-input>
          </div>
        </div>
      </div>
      <div class="columns field is-horizontal">
        <div class="column is-4 p-0">
          <div class="field-label is-normal">
            <label class="label">SKU</label>
          </div>
        </div>
        <div class="column is-8 p-0">
          <div class="field-label is-normal has-text-left">
            <b-input v-model="form.sku"></b-input>
          </div>
        </div>
      </div>
      <div class="columns field is-horizontal">
        <div class="column is-4 p-0">
          <div class="field-label is-normal">
            <label class="label">Quantitade Inicial</label>
          </div>
        </div>
        <div class="column is-8 p-0">
          <div class="field-label is-normal has-text-left">
            <b-input v-model="form.initial_quantity" type="number"></b-input>
          </div>
        </div>
      </div>
      <AlertErrorResponse422 :errors="errors" v-if="errors"/>
    </section>
    <footer class="modal-card-foot is-justify-content-flex-end">
      <b-button
        type="is-primary"
        label="Salvar"
        @click="saveProduct" />
      <b-button
        label="Fechar"
        @click="$emit('close')" />
    </footer>
  </div>
</template>

<script>

import ApiService from '@/services/api.js'
import AlertErrorResponse422 from '@/components/alerts/AlertErrorResponse422.vue'
import ToastUtil from '@/utils/toast.js'

export default {
  name: 'ModalCreateProduct',
  components: {
    AlertErrorResponse422
  },
  data() {
    return {
      form: {
        name: null,
        sku: null,
        initial_quantity: 1
      },
      errors: null
    }
  },
  methods: {
    saveProduct() {
      this.errors = null
      ApiService.post('products', this.form)
        .then(() => {
          this.$emit('close')
          this.$emit('reloadProducts')
          ToastUtil.success('Produto cadastrado com sucesso')
        })
        .catch((error) => {
          if (error.response.status == 422)
            this.errors = error.response.data.errors
        })
    }
  },
}
</script>
