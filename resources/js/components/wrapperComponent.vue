<script setup>
import {inject} from "vue";

const {contentName} = inject('content')

</script>

<template>
    <p>{{contentName}}</p>
    <content :key="contentName"></content>
</template>

<style scoped>

</style>
