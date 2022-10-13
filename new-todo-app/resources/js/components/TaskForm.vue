<template>

    <form @submit.prevent="addTask">
        <div class="inputTask">
            <div>
                <input type="text" id="newTask" v-model="task.title" placeholder="Add a task" @keyup.enter="addTask()">
            </div>
            <div>
                <button type="submit" class="btn_add_task">
                    <font-awesome-icon
                        icon="plus-square"
                        :class="[ task.title ? 'active' : 'inactive', 'plus']"
                        @click="addTask()"
                    />
                    New Task
                </button>
            </div>
        </div>
    </form>

</template>

<script>
import axios from "axios";

export default {
    name: "TaskForm",
    data(){
        return {
            task:{
                title:""
            }
        }
    },
    methods: {
        refreshTask(){
            axios.get('api/tasks')
                .then(res => {
                    this.tasks = res.data;
                })
                .catch(error => {
                    console.log(error);
                })
        },

        addTask() {
            if (this.task.title == '') {
                return;
            }
            axios.post('api/task/store', {
                task: this.task
            })
                .then(response => {
                    if (response.status == 201) {
                        this.task.title = '';
                        this.$emit("reloadList");
                       this.refreshTask()

                    }
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}
</script>

<style scoped>
.inputTask{
    margin-top: 10px;
    margin-bottom: 10px;
    background-color: #1970cf;
    display: flex;
    justify-content: center;
    align-items: center;
}
.btn_add_task{
    border: 1px solid blue;
    padding: 8px;
    margin-left: 10px;
}
#newTask{
    padding: 8px;
    border: 2px solid black;

}

.plus{
    font-size: 20px;
}
.active {
    color: green;
}
.inactive{
    color: #999999;
}
</style>
