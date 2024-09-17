<template>
  <div v-if="isVisible" class="fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg w-full max-w-lg">
      <h2 class="text-2xl font-semibold mb-4 text-white">{{ title }}</h2>

      <div>
        <slot></slot>
      </div>

      <div class="mt-6 flex justify-end gap-4">
        <button @click="cancel" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Cancel</button>
        <button @click="confirm" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Save</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    isVisible: {
      type: Boolean,
      default: false
    },
    title: {
      type: String,
      default: 'Modal Title'
    },
    task: Object,
  },
  data() {
    return {
      taskData: { ...this.task },
    };
  },
  methods: {
    cancel() {
      this.$emit('close');
    },
    confirm() {
      this.$emit('confirm');
    }
  }
};
</script>

<style scoped>
</style>
