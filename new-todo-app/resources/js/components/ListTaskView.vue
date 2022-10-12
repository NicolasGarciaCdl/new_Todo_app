<template>
    <div class="list_container">
        <h2>Assignments in Progress </h2>
        <ul class="todo_list">
            <div v-for="assignment in assignments">
                <task
                    :task="assignment"
                ></task>

            </div>
            <div  v-for="task in tasks">
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
                {title: 'task exemple 1', completed: false},
                {title: 'task exemple 2', completed: false},
                {title: 'task exemple 3', completed: false},
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
h2{
    font-size: 32px;
    font-weight: bold;
}
.todo_list{
    padding: 10px;

}

</style>
