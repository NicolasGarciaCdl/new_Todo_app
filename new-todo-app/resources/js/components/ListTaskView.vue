<template>
    <div class="list_container">
        <h2>In Progress </h2>
        <ul class="todo_list">
            <div v-for="assignment in assignments.filter(a => !a.completed)" :key="assignment.id">
                <task
                    :task="assignment"
                ></task>

            </div>
            <div  v-for="task in tasks.filter(a => !a.completed)" :key="task.id">
                <task
                    :task="task"
                    class="taskItem"
                />
            </div>
        </ul>
    </div>
    <div class="completedTask" v-show="assignments.filter(a => a.completed).length || tasks.filter(a => a.completed).length">
        <h2>Completed </h2>
        <ul class="todo_list">
            <div v-for="assignment in assignments.filter(a => a.completed)" :key="assignment.id">
                <task
                    :task="assignment"
                ></task>

            </div>
            <div  v-for="task in tasks.filter(a => a.completed)" :key="task.id">
                <task
                    :task="task"
                    class="taskItem"
                />
            </div>
        </ul>
    </div>
</template>

<script>
import Task from "./Task.vue";
import axios from "axios";

export default {
    name: "ListTaskView",
    components:{
        Task
    },
    data(){
        return{
            assignments: [
                {id:1001, title: 'task exemple 1', completed: false},
                {id:1002, title: 'task exemple 2', completed: false},
                {id:1003, title: 'task exemple 3', completed: false},
            ],
            tasks:[]
        }
    },
    methods:{
        getTasks(){
            axios.get('api/tasks')
                .then(res =>{
                    this.tasks = res.data;
                })
                .catch(error =>{
                    console.log(error);
                });
        }
    },

    created() {
        this.getTasks();
    }

}
</script>

<style scoped>
.list_container{
    background-color: aqua;
}
.completedTask{
    background-color: #cbd5e0;
}
h2{
    font-size: 32px;
    font-weight: bold;
}
.todo_list{
    padding: 10px;

}

</style>
