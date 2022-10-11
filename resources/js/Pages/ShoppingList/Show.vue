<template>
    <div>
        <div>
            <input type="text" v-model="product" v-on:keyup.enter="createItem" />
        </div>
        <div v-for="item in items">
            {{ item }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: Array
    },
    data() {
        return {
            product: null,
            itemss: []
        };
    },
    mounted() {
        this.itemss = this.items;
    },
    methods: {
        createItem() {
            this.product = null;

            axios.post('/api/')
        },
        deleteItem() {

        }
    }
}
</script>

<style scoped>

</style>
