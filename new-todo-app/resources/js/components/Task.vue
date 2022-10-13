<template>

    <li class="taskItem">
        <div>
            <input type="checkbox"
                   name="title"
                   id="title"
                   class="title_check"
                   @change="updateCheck()"
                   v-model="task.completed">
            <span class="task_title"
                  :class="[task.completed ? 'completed' : '', 'task']">
                {{ task.title }}
            </span>
        </div>

        <button class="btn-danger" @click="removeTask()" ><font-awesome-icon icon="trash"/></button>
    </li>
</template>

<script>
import axios from "axios";

export default {
    name: "Task",
    props: ["task"],
    methods:{
        updateCheck(){
            axios.put(`api/task/${this.task.id}`, {
                task: this.task
            })
                .then(res => {
                    if (res.status == 200) {
                        this.$emit("taskChanged");
                    }
                })
                .catch(error => {
                    console.log("error from axios put", error);
                });
        },
        removeTask(){
            axios.delete(`api/task/${this.task.id}`)
            .then(res =>{
                if(res.status == 200){
                    this.$emit("taskChanged");
                }
            })
            .catch( error => {
                console.log("error from axios delete", error);
            });
        }
    }

}
</script>

<style scoped>
.completed{
    text-decoration: line-through;
    color : #999999;
}
.task{
    word-break: break-all;
}
.taskItem{
    display:flex;
    justify-content: space-between;
    align-items: center;
}
.task_title{
    margin-left: 10px;
}
.task_title:hover{
    cursor: pointer;
}
li{
    border: 1px solid blueviolet;
}
.title_check{
    margin: 20px;
}
.btn-danger{
    color: red;
    margin: 10px;
}
.btn-danger:hover{
    cursor: pointer;
}

</style>
