import {defineStore} from 'pinia'

export const useTasksStore = defineStore('tasks', {
    state: () => ({
        tasks: [],
    }),

    getters: {
        getTask: (state) => (id) => {
            return state.tasks.find(task => task.id === id)
        }
    },

    actions: {
        async getTasks() {
            try {
                const response = await fetch('http://127.0.0.1:8000/tasks');
                this.tasks = await response.json();
            } catch (error) {
                console.error('Error fetching tasks:', error);
            }
        },

        async addTask(task) {
            try {
                const response = await fetch('http://127.0.0.1:8000/tasks', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify(task),
                });
                const newTask = await response.json();
                this.tasks.push(newTask);
            } catch (error) {
                console.error('Error adding task:', error);
            }
        },

        async deleteTask(taskId) {
            try {
                await fetch(`http://127.0.0.1:8000/tasks/${taskId}/delete`, {
                    method: 'DELETE',
                });

                this.tasks = this.tasks.filter(task => task.id !== taskId);
            } catch (error) {
                console.error('Error deleting task:', error);
            }
        },

        async updateTask(taskId, updatedTask) {
            try {
                const response = await fetch(`http://127.0.0.1:8000/tasks/${taskId}/update`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(updatedTask),
                });

                const newTask = await response.json();
                const taskIndex = this.tasks.findIndex(task => task.id === taskId);
                if (taskIndex !== -1) {
                    this.tasks[taskIndex] = newTask;
                }
            } catch (error) {
                console.error('Error updating task:', error);
            }
        }
    },
})
