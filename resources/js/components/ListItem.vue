<template>
    <div class="item">
        <input type="checkbox"
        @change="updateCheck()"
        v-model="item.completed"
        />

        <span :class="[item.completed ? 'completed' : '']">{{item.name}}</span>
        <button @click="removeItem()" class="trashcan">
            <font-awesome-icon icon="trash"/>
        </button>
    </div>
</template>

<script>
export default {
    props: ['item'],

    methods: {
        updateCheck(){
            axios.put('api/item/' + this.item.id, {
                item: this.item
            })
            .then(res => {
                if(res.status == 200) //200 successfull
                {
                    this.$emit('itemchanged'); // itemchanged criando evento
                    //$emit quando quero criar um evento e emiti-lo para outra pagina
                 }
            })
            .catch(err => {
                console.log(err );
            })
        },

        removeItem(){
            axios.delete('api/item/' + this.item.id)
            .then( res => {
                if(res.status == 200)
                {
                    this.$emit('itemchanged');
                }
            })
            .catch(err => {
                console.log(err);
            })
        }
    }
}

</script>

<style scoped>
.completed {
    text-decoration: line-through;
    color: #999999;
}

.trashcan {
    
    color: red;
  
}
</style>