<template>
  <div class="lg:container p-6 text-gray-100 mt-6">
    <h1 class="font-bold">Task Manager</h1>

    <div class="flex gap-x-6">
      <TaskList :tasks="tasks" @update="updateTask" @delete="deleteTask" />
      <TaskForm @create="addNewTask" />
    </div>
  </div>
</template>

<script>
import TaskList from './components/task/TaskList.vue';
import TaskForm from './components/task/TaskForm.vue';
import {useTasksStore} from "@/stores/api.js";

export default {
  components: {
    TaskList,
    TaskForm,
  },
  computed: {
    tasks(){
      const store = useTasksStore();
      console.log(store.tasks);
      return store.tasks;
    }
  },
  methods: {
    addNewTask(task) {
      const store = useTasksStore();
      store.addTask(task);
    },
    updateTask(taskId, updatedTask) {
      const store = useTasksStore();
      store.updateTask(taskId, updatedTask);
    },
    deleteTask(taskId) {
      const store = useTasksStore();
      store.deleteTask(taskId);
    },
  },
  async created() {
    const store = useTasksStore();
    await store.getTasks();
  },
};
</script>

<style scoped>
/* Global styles can go here */
</style>
