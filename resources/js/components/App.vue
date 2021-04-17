<template>
    <div class="todoListContainer">
        <div class="heading">
            <h2 id="title">Todo List</h2>
            <add-item-form  v-on:reloadlist="getList()"></add-item-form>
            
        </div>
        <!-- I create a property called items and I passed items from data() to ListView that is
        received in the props -->
        <list-view :items="items"
                    v-on:reloadlist="getList()">
        </list-view>
       
    </div>
</template>

<script>

import AddItemForm from './AddItemForm'

import ListView from './ListView'



export default {
    components: {
        AddItemForm,
        ListView,
        
    },

    data() {
        return {
            items: []
        }
    },

    methods: {
        getList (){
            axios.get('/api/items')
            .then (res => {
                this.items = res.data
            })
            .catch(err => {
                console.log(err);
            })
        }
    },

    created() {
        this.getList();
    }

}
</script>

<style scoped>
.todoListContainer {
    width: 350px;
    margin: auto;
}

.heading {
    background: #e6e6e6;
    padding: 10px;
}

#title {
    text-align: center;
}

</style>