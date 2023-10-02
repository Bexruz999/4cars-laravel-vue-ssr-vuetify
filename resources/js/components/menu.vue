<script setup>
import {ref, inject} from 'vue';
defineEmits(['getevent']);

const {updateContent} = inject('content')

</script>

<template>
    <slot :btn="updateContent" ></slot>
</template>

<style scoped>

</style>
