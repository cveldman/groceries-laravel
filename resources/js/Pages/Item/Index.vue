<template>
    <div>
        <div class="bg-green-500 p-4">
            <input type="text" v-model="product" class="rounded-lg border-0 w-full"
                   placeholder="Product toevoegen.. " v-on:keyup.enter="addItem" />
        </div>

        <ul v-if="items.length" role="list" class="divide-y divide-gray-200">
            <li v-for="item in items" class="flex p-4">

                <img v-if="item.product_id" class="inline-block h-10 w-10 rounded-full mr-4"
                     :src="products[item.product_id - 1].image" alt="Product">

                <span v-else class="inline-block h-10 w-10 overflow-hidden rounded-full bg-gray-200 mr-4">
                    <svg class="h-full w-full text-gray-500 p-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125" />
                    </svg>
                </span>

                <div class="flex-grow">
                    <p class="text-base font-medium text-gray-900" style="margin-top: 8px;">
                        {{ item.product_id ? products[item.product_id - 1].name : item.product }}
                    </p>
                    <!-- <p class="text-sm text-gray-500"></p> -->
                </div>
                <div>
                    <button type="button" @click="deleteItem(item.id)" class="inline-flex items-center rounded-full border border-transparent bg-gray-400 p-1 text-white shadow-sm hover:bg-gray-700 focus:outline-none"  style="margin-top: 5px;">
                        <svg  class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </li>
        </ul>
        <div v-else class="text-center pt-12">
            <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Geen producten</h3>
            <p class="mt-1 text-sm text-gray-500">Ga aan de slag door een product toe te voegen!</p>
        </div>
    </div>
</template>

<script>

import { addItem, addProduct, deleteItem } from "@/Services/ItemService";

export default {
    props: {
        itemss: Array,
        products: Array
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
        async addProduct(id) {
            try {
                const product = await addProduct(id);

                this.items.push(product);

                this.product = null;
            } catch (e) {
                console.log(e); // TODO: Add notification when request fails
            }
        },
        async addItem() {
            try {
                const product = await addItem(this.product);

                this.items.push(product);

                this.product = null;
            } catch (e) {
                console.log(e); // TODO: Add notification when request fails
            }
        },
        async deleteItem(id) {
            try {
                await deleteItem(id);

                const index = this.items.findIndex(item => item.id === id);

                this.items.splice(index, 1);
            } catch (e) {
                console.log(e); // TODO: Add notification when request fails
            }
        }
    }
}
</script>

<style scoped>

</style>
