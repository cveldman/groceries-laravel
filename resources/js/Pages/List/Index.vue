<template>
    <div class="bg-green-500 p-4">
        <h1 class="text-2xl font-semibold text-white">Boodschappenlijstjes</h1>
    </div>
    <List>
        <Item v-for="list in lists">
            <p class="text-base font-medium text-gray-900" style="margin-top: 8px;">
                {{ list.name }}
            </p>
        </Item>
    </List>
</template>

<script>

import List from "@/Components/List.vue";
import Item from "@/Components/Item.vue";

export default {
    components: {
        List,
        Item
    },
    props: {
        lists: Array
    }
}

</script>

<style scoped>

</style>
