<template>

    <li class="taskItem">
        <div>
            <input type="checkbox" name="title" id="title" class="title_check">
            <span class="todo_title">{{ task.title }}</span>
        </div>

        <button class="btn-danger" ><font-awesome-icon icon="trash"/></button>
    </li>

</template>

<script>
export default {
    name: "Task",
    props: {
        task:Object,
        assignment:Object
    },

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
.todo_title{
    margin-left: 10px;
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

</style>
