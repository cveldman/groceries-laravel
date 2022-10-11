<template>
    <div>
        <div>
            <input type="text" v-model="product" v-on:keyup.enter="createItem" />
        </div>
        <div v-for="item in items" class="flex">
            <div class="flex-grow">
                {{ item.product }}
            </div>
            <div>
                <button @click="deleteItem(item.id)">Delete</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        itemss: Array
    },
    data() {
        return {
            product: null,
            items: []
        };
    },
    mounted() {
        this.items = this.itemss;
    },
    methods: {
        async createItem() {
            try {
                const response = await axios.post('/api/items', { product: this.product });

                this.items.push(response.data);

                this.product = null;
            } catch (e) {
                console.log(e);
            }
        },
        async deleteItem(id) {
            try {
                await axios.delete('/api/items/' + id);

                const index = this.items.findIndex(item => item.id === id);

                this.items.splice(index, 1);
            } catch (e) {
                console.log(e);
            }
        }
    }
}
</script>

<style scoped>

</style>
