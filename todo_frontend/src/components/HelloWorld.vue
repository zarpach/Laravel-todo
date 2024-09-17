<template>
  <div class="mx-auto p-6 bg-gray-900 text-gray-100 min-h-screen">
    <h1 class="text-2xl font-bold mb-6 text-center text-white">Task Manager</h1>

    <div class="flex grid-cols-2 gap-6">
      <ul role="list" class="divide-y divide-gray-600">
        <li v-for="task in tasks" :key="task.id" class="flex justify-between gap-x-6 py-5">
          <div class="flex min-w-0 gap-x-4">
            <div class="min-w-0 flex-auto">
              <p class="text-lg font-semibold leading-6">{{ task.name }}</p>
              <p class="text-xs mt-1 truncate leading-5">{{ task.description }}</p>
            </div>
          </div>

          <div class="grid grid-cols-2 gap-x-6 py-5">
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

            <div class="mt-1 flex">
              <button v-on:click="deleteTask(task.id)">Delete</button>
            </div>
          </div>

        </li>
      </ul>

      <div class="bg-gray-800 shadow-md rounded-lg overflow-hidden p-4">
        <h2 class="text-lg font-semibold mb-4">Create Task</h2>

        <form @submit.prevent="addNewTask">
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
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Create Task</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</template>

<script>
import { useTasksStore } from '@/stores/api.js';

export default {
  name: 'HelloWorld',
  data() {
    return {
      newTask: {
        name: '',
        description: '',
        status: 'todo',
      },
    };
  },
  computed: {
    tasks() {
      const store = useTasksStore();
      console.log(store.tasks);
      return store.tasks;
    },
  },
  methods: {
    addNewTask() {
      const store = useTasksStore();
      store.addTask({ ...this.newTask });
    },
    deleteTask(taskId) {
      const store = useTasksStore();
      store.deleteTask(taskId);
    },
    updateTask(taskId, updateTask) {
      const store = useTasksStore();
      store.updateTask(taskId, updateTask);
    }
  },
  async created() {
    const store = useTasksStore();
    await store.getTasks();
  },
};


</script>

