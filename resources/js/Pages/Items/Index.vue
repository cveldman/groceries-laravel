<template>
    <div>
        <div class="bg-green-500 p-6">
            <input type="text" v-model="product" class="rounded-lg border-0 w-full" v-on:keyup.enter="createItem" />
        </div>

        <ul role="list" class="divide-y divide-gray-200">
            <li v-for="item in items" class="flex py-4">
                <div class="ml-3 flex-grow">
                    <p class="text-sm font-medium text-gray-900">{{ item.product }}</p>
                    <p class="text-sm text-gray-500">-</p>
                </div>
                <div>
                    <button @click="deleteItem(item.id)">Delete</button>
                </div>
            </li>
        </ul>
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
