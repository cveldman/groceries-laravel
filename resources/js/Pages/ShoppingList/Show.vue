<template>
    <div class="p-4 bg-green-500">
        <input type="text" v-model="search"
               @focus="focused = true"
               @blur="delay(10).then(() => focused = false)"
               class="w-full rounded-lg" placeholder="Product toevoegen..."/>
    </div>

    <div v-if="search || focused" class="absolute w-full bg-red-400">
        <div v-if="search">
            <div @click="addItem(product)" class="item fruit" v-if="search" v-for="product in filteredProducts" :key="product">
                <p>{{ product }}</p>
            </div>
            <div v-else class="item error" v-if="search && !filteredProducts.length">
                <p>No results found!</p>
            </div>
        </div>
        <div v-else>
            <div class="divide-y divide-gray-200">
                <div @click="addItem(product)" v-for="product in recentProducts" class="p-4 flex">
                    <div class="flex-grow">
                        {{ product.name }}
                    </div>
                    <div>
                        1
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="divide-y divide-gray-200">
        <div v-for="(item, index) in itemss" class="p-4 flex">
            <div class="flex-grow">
                {{ item.product_id != null ? products[0].name : item.product }}
            </div>
            <div>
                <button @click="deleteItem(index)" type="button" class="inline-flex items-center rounded-full border border-transparent bg-gray-400 p-1 text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                    <!-- Heroicon name: mini/plus -->
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div v-if="!itemss.length" class="text-center">
        <svg class="mt-2 mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">No items</h3>
        <p class="mt-1 text-sm text-gray-500">Get started by creating a new project.</p>
    </div>
</template>

<script>
export default {
    props: {
        products: Array,
        items: Array
    },
    data() {
        return {
            focused: false,
            search: "",
            itemss: []
        };
    },
    mounted() {
        this.itemss = this.items;
    },
    computed: {
        recentProducts() {
            return this.products;
        },
        filteredProducts() {
            return this.products.filter(p => {
                return p.name.toLowerCase().indexOf(this.search.toLowerCase()) != -1;
            });
        }
    },
    methods: {
        addItem(item) {
            this.focused = false;
            this.search = null;

            this.itemss.push(product);
        },
        addProduct(product) {
            this.focused = false;
            this.search = null;

            this.itemss.push(product);
        },
        deleteItem(index) {
            this.itemss.splice(index, 1);
        },
         delay(time) {
            return new Promise(resolve => setTimeout(resolve, time));
        }
    }
}
</script>

<style scoped>

</style>
