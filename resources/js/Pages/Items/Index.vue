<template>
    <div>
        <div class="bg-green-500 p-6">
            <input type="text" v-model="product" class="rounded-lg border-0 w-full" v-on:keyup.enter="createItem" />
        </div>

        <ul role="list" class="divide-y divide-gray-200">
            <li v-for="item in items" class="flex py-4">
                <div class="ml-3 flex-grow">
                    <p class="text-sm font-medium text-gray-900">{{ item.product }}</p>
                    <p class="text-sm text-gray-500"></p>
                </div>
                <div class="mr-3">
                    <button type="button" @click="deleteItem(item.id)" class="inline-flex items-center rounded-full border border-transparent bg-gray-400 p-1 text-white shadow-sm hover:bg-gray-700 focus:outline-none">
                        <svg  class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
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
