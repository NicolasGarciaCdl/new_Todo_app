<template>
<div class="board_container">
    <h1 class="board_title">New Todo App</h1>
    <hr>
    <task-form :task="task" @reloadList="getTasks()"></task-form>
    <list-task-view
     :tasks="tasks"
     v-on:reloadList="getTasks"
    />
</div>
</template>

<script>
import ListTaskView from "./ListTaskView.vue";
import axios from "axios";
import TaskForm from "./TaskForm.vue";

export default {
    name: "Board",
    components: {
        TaskForm,
        ListTaskView
    },
    data(){
        return {
            tasks: [],
            task:[]

        };
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
    created(){
        this.getTasks();
    },
};
</script>

<style scoped>
.board_container{
    width:80%;
    text-align: center;
    margin: 20px auto auto;

}
h1{
    font-size: 48px;
    border-bottom: 2px solid #1a202c;

}
</style>
