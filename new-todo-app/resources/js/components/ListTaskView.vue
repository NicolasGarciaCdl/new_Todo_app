<template>
    <div class="list_container">
        <h2>In Progress </h2>
        <ul class="todo_list">
            <div  v-for="task in tasks.filter(a => !a.completed)" :key="task.id"  >
                <task
                    :task="task"
                    class="taskItem"
                    v-on:taskChanged="$emit('reloadList')"
                />
            </div>

        </ul>
    </div>
    <div class="completedTask" v-show="tasks.filter(a => a.completed).length">
        <h2>Completed </h2>
        <ul class="todo_list">
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
    emits:['reloadList'],
    components: {
        Task
    },
    props: ['tasks']

    // data(){
    //     return{
    //         tasks:[]
    //     }
    // },
    // methods:{
    //     getTasks(){
    //         axios.get('api/tasks')
    //             .then(res =>{
    //                 this.tasks = res.data;
    //             })
    //             .catch(error =>{
    //                 console.log(error);
    //             });
    //     }
    // },

    // mounted() {
    //     this.getTasks();
    // }

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
