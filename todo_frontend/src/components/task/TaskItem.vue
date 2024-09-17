<template>
  <li class="flex grid-cols-2 justify-between gap-x-6 py-3">
    <div class="w-2/3">
      <a @click="openModal(task)" class="cursor-pointer text-lg font-semibold leading-6">{{ task.name }}</a>
      <p class="text-xs mt-1 truncate leading-5">{{ task.description }}</p>
    </div>

    <div class="place-self-center">
      <div class="flex justify-stretch  gap-x-2">
        <div v-if="task.status === 'done'" class="flex items-center gap-x-1.5">
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

        <div v-else class="flex items-center gap-x-1.5">
          <div class="flex-none rounded-full bg-blue-500/20 p-1">
            <div class="h-1.5 w-1.5 rounded-full bg-blue-500"></div>
          </div>
          <p class="text-xs leading-5 text-gray-500">To Do</p>
        </div>

        <div class="flex items-center gap-x-1.5">
          <label for="status" class="sr-only">Change Status</label>
          <select
              v-model="task.status"
              @change="updateTask(task.id, task)"
              class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded"
          >
            <option value="todo">Todo</option>
            <option value="doing">Doing</option>
            <option value="done">Done</option>
          </select>
        </div>

        <button @click="deleteTask" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
          </svg>
        </button>
      </div>
    </div>
  </li>

  <EditModal v-if="showModal" :isVisible="showModal" title="Edit Task" @close="closeModal" @confirm="updateTask(selectedTask.id, selectedTask)">
    <div class="mb-4">
      <label for="name" class="block text-gray-300 font-bold mb-2">Task Name:</label>
      <input v-model="selectedTask.name" id="name" type="text" class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded" required>
    </div>
    <div class="mb-4">
      <label for="description" class="block text-gray-300 font-bold mb-2">Description:</label>
      <textarea v-model="selectedTask.description" id="description" class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded" required></textarea>
    </div>
    <div class="mb-4">
      <label for="status" class="block text-gray-300 font-bold mb-2">Status:</label>
      <select v-model="selectedTask.status" id="status" class="w-full p-2 border border-gray-600 bg-gray-700 text-white rounded" required>
        <option value="todo">Todo</option>
        <option value="doing">Doing</option>
        <option value="done">Done</option>
      </select>
    </div>
  </EditModal>
</template>

<script>
import EditModal from "@/components/task/EditModal.vue";

export default {
  components: {EditModal},
  emits: ['delete', 'update'],
  data() {
    return {
      showModal: false,
      selectedTask: null,
    }
  },
  props: {
    task: Object,
  },
  methods: {
    updateTask(taskId, task) {
      this.$emit('update', taskId, task);
      this.closeModal();
    },
    deleteTask() {
      this.$emit('delete', this.task.id);
    },
    openModal(task) {
      this.selectedTask = { ...task };
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
  },
};
</script>

<style scoped>
</style>
