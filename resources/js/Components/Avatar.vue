<template>
    <img v-if="image" :src="image" class="inline-block h-10 w-10 rounded-full mr-4" alt="Image">

    <span v-else class="inline-block h-10 w-10 overflow-hidden rounded-full bg-gray-200 mr-4">
        <svg class="h-full w-full text-gray-500 p-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" d="M21 7.5l-9-5.25L3 7.5m18 0l-9 5.25m9-5.25v9l-9 5.25M3 7.5l9 5.25M3 7.5v9l9 5.25m0-9v9" />
        </svg>
    </span>

</template>

<script>
export default {
    name: "Avatar",
    props: ['image']
}
</script>

<style scoped>

</style>
