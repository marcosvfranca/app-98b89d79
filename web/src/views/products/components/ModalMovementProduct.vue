<template>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Movimentar produto</p>
      <button type="button" class="delete" @click="$emit('close')"/>
    </header>
    <section class="modal-card-body section is-main-section">
      <div class="columns field is-horizontal">
        <div class="column is-4 p-0">
          <div class="field-label is-normal">
            <label class="label">Campo 1</label>
          </div>
        </div>
        <div class="column is-8 p-0">
          <div class="field-label is-normal has-text-left">
            <label>campo 1</label>
          </div>
        </div>
      </div>
    </section>
    <footer class="modal-card-foot is-justify-content-flex-end">
      <b-button
        label="Salvar"
        @click="$emit('close')" />
      <b-button
        type="is-primary"
        label="Fechar"
        @click="$emit('close')" />
    </footer>
  </div>
</template>

<script>

export default {
  name: 'ModalCreateProduct'
}
</script>
