<template>
  <div class="notification is-danger">
    <ol class="ml-2">
      <li v-for="error in errors_list" :key="error.message">
        {{ error.message }}
      </li>
    </ol>
  </div>
</template>

<script>

export default {
  data() {
    return {
      errors_list: []
    }
  },
  props: {
    errors: Object
  },
  created() {
    for (var field in this.errors) {
      this.errors_list.push({
        message: this.errors[field][0]
      })
    }
  },
}
</script>
