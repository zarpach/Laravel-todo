<template>
  <div class="w-1/3 task-form mt-6 bg-gray-800 shadow-md rounded-lg overflow-hidden p-4">
    <h2 class="text-lg font-semibold mb-4 text-white">Create Task</h2>

    <form @submit.prevent="submitForm">
      <div class="mb-4">
        <label for="name" class="block text-gray-300 font-bold mb-2">Task Name:</label>
        <input v-model="newTask.name" id="name" type="text" class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded" required>
      </div>

      <div class="mb-4">
        <label for="description" class="block text-gray-300 font-bold mb-2">Description:</label>
        <textarea v-model="newTask.description" id="description" class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded" required></textarea>
      </div>

      <div class="mb-4">
        <label for="status" class="block text-gray-300 font-bold mb-2">Status:</label>
        <select v-model="newTask.status" id="status" class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded" required>
          <option value="todo">Todo</option>
          <option value="doing">Doing</option>
          <option value="done">Done</option>
        </select>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Task</button>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newTask: {
        name: '',
        description: '',
        status: 'todo',
      },
    };
  },
  methods: {
    submitForm() {
      console.log(this.newTask);
      this.$emit('create', { ...this.newTask });
      this.newTask = {
        name: '',
        description: '',
        status: 'todo',
      };
    },
  },
};
</script>

<style scoped>
</style>
