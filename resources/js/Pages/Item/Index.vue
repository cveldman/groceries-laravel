<template>
    <div>
        <div class="bg-green-500 p-4">
            <h1 class="text-2xl font-semibold text-white">Boodschappen</h1>
            <input type="text" v-model="product" placeholder="Product toevoegen"
                   @focus="focused = true"
                   @blur="delay(10).then(() => focused = false)"
                   v-on:keyup.enter="addItem" class="mt-3 rounded-lg border-0 w-full" />
        </div>

        <div v-if="product || focused" class="h-40 z-10 absolute bg-gray-200 border-2 border-gray-200 left-4 right-4 mt-4">
            <div v-if="true">
                <div v-if="true">
                    <p @click="addProduct(product.id)" v-for="product in filteredProducts" class="p-4 text-sm font-medium text-gray-900">
                        {{ product.name }}
                    </p>
                </div>
                <div v-else>
                    Geen resultaten
                </div>
            </div>
            <div v-else>
                Recent
            </div>
        </div>

        <List v-if="items.length">
            <Item v-for="item in items">
                <Avatar :image="item.product_id ? products[item.product_id - 1].image : null" />

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
            </Item>
        </List>
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
import Input from "@/Components/Input.vue";
import List from "@/Components/List.vue";
import Item from "@/Components/Item.vue";
import Avatar from "@/Components/Avatar.vue";

export default {
    components: {
        Input,
        List,
        Item,
        Avatar
    },
    props: {
        itemss: Array,
        products: Array
    },
    data() {
        return {
            product: null,
            items: [],
            focused: false
        };
    },
    mounted() {
        this.items = this.itemss;
    },
    computed: {
        filteredProducts() {
            return this.products.filter(p => {
                return p.name.toLowerCase().indexOf(this.product.toLowerCase()) != -1;
            });

            //.filter(product => {
            //    // Filter already added products
            //    return !this.items.find(item => item.product_id === product.id);
            //})
        }
    },
    methods: {
        async addProduct(id) {
            try {
                const product = await addProduct(id);

                this.items.push(product);

                // TODO: Add product to recent searches
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
        },
        delay(time) {
            return new Promise(resolve => setTimeout(resolve, time));
        }
    }
}
</script>

<style scoped>

</style>
