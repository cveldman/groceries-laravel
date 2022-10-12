<template>
    <h1>Boodschappenlijstjes</h1>
    <List>
        <Item v-for="list in lists">
            {{ list.name }}
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
