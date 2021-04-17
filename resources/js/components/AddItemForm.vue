<template>
    <div class="addItem">
        <input type="text" v-model="item.name"/>
        <font-awesome-icon icon="plus-square" 
        @click="addItem"
        :class="[item.name ? 'active' : 'inactive', 'plus']"/>
    </div>
</template>

<script>
export default {
    data(){
        return {
            item: {
              name: ""  
            }
        }
    },

    methods: {
        addItem() {
            if(this.item.name == '') {
                return; // se o nome estiver vazio apenas retorne e nao continue a operacao
            }

            axios.post('api/item/store', {
                item: this.item
            })
            .then(res => {
                if(res.status == 201) { // 201 is a successful criation 
                    this.item.name = "";
                    this.$emit('reloadlist')
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
.plus {
    font-size: 20px;
}

.active {
    color: green;
}

.inactive {
    color: grey;
}
</style>