<template>
  <li class="flex justify-between gap-x-6 py-5">
    <div class="flex min-w-0 gap-x-4">
      <div class="min-w-0 flex-auto">
        <p class="text-lg font-semibold leading-6">{{ task.name }}</p>
        <p class="text-xs mt-1 truncate leading-5">{{ task.description }}</p>
      </div>
    </div>

    <div class="grid grid-cols-2 gap-x-6 py-5">
      <!-- Status Display -->
      <div v-if="task.status === 'done'" class="mt-1 flex items-center gap-x-1.5">
        <div class="flex-none rounded-full bg-emerald-500/20 p-1">
          <div class="h-1.5 w-1.5 rounded-full bg-emerald-500"></div>
        </div>
        <p class="text-xs leading-5 text-gray-500">Completed</p>
      </div>

      <div v-else-if="task.status === 'doing'" class="mt-1 flex items-center gap-x-1.5">
        <div class="flex-none rounded-full bg-yellow-500/20 p-1">
          <div class="h-1.5 w-1.5 rounded-full bg-yellow-500"></div>
        </div>
        <p class="text-xs leading-5 text-gray-500">In Progress</p>
      </div>

      <div v-else class="mt-1 flex items-center gap-x-1.5">
        <div class="flex-none rounded-full bg-blue-500/20 p-1">
          <div class="h-1.5 w-1.5 rounded-full bg-blue-500"></div>
        </div>
        <p class="text-xs leading-5 text-gray-500">To Do</p>
      </div>

      <!-- Status Update -->
      <div class="flex items-center gap-x-1.5">
        <label for="status" class="sr-only">Change Status</label>
        <select
            v-model="task.status"
            @change="updateStatus(task.id, task)"
            class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded"
        >
          <option value="todo">Todo</option>
          <option value="doing">Doing</option>
          <option value="done">Done</option>
        </select>
      </div>

      <!-- Delete Button -->
      <div class="mt-1 flex">
        <button @click="deleteTask" class="text-red-500 hover:text-red-700">Delete</button>
      </div>
    </div>
  </li>
</template>

<script>
export default {
  props: {
    task: Object,
  },
  methods: {
    updateStatus() {
      this.$emit('update', this.task.id, this.task);
    },
    deleteTask() {
      this.$emit('delete', this.task.id);
    },
  },
};
</script>

<style scoped>
</style>
