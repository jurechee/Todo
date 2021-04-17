<template>
    <div>
        <div v-for="(item, index) in items" :key="index">
            <list-item :item="item"
            class="item"
            v-on:itemchanged="$emit('reloadlist')"/>
        </div>
    </div>
</template>

<script>
import ListItem from "./ListItem"
export default {
    props: ["items"], //items come from App.vue and pass throught v-for 
    //-> this view receive a prop, a prop always come from another view
    components: {
        ListItem
    }
}
</script>

<style scoped>

</style>