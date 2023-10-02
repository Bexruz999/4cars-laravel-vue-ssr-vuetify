<script setup>
import {inject} from "vue";

const {contentData} = inject('content')
if (contentData.value === 'content') {
    console.log('yctuccgfvg')
}
</script>

<template>
    <v-btn>Button</v-btn>
    <div v-html="contentData"></div>
</template>

<style scoped>

</style>
