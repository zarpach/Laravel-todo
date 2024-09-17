<template>
  <div class="task-list">
    <ul role="list" class="divide-y divide-gray-600">
      <TaskItem
          v-for="task in tasks"
          :key="task.id"
          :task="task"
          @update="updateTask"
          @delete="deleteTask"
      />
    </ul>
  </div>
</template>

<script>
import TaskItem from './TaskItem.vue';

export default {
  components: {
    TaskItem,
  },
  props: {
    tasks: Array,
  },
  methods: {
    updateTask(taskId, updatedTask) {
      this.$emit('update', taskId,  updatedTask);
    },
    deleteTask(taskId) {
      this.$emit('delete', taskId);
    },
  },
};
</script>

<style scoped>
</style>
