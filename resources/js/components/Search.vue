<script setup>
import {watch, ref} from "vue";

defineProps(['placeholder'])
const keywords = ref('');
const results = ref([]);
const magic_flag = ref(false);

const inactivate = function () {
    setTimeout(() => magic_flag.value = false, 200)
}

watch(keywords, (after, before) => {
    if (keywords.value.length > 2) {
        fetch();
    }
});

function fetch() {
    axios.get('/api/search', {params: {keywords: keywords.value}})
        .then(response => results.value = response.data).catch(error => {
    });
}
</script>

<template>
    <div class="search-block">
        <input name="keywords" :placeholder="placeholder" type="text" @focus="magic_flag = true" @blur="inactivate" v-model="keywords">
        <div class="" v-show="magic_flag">
            <ul class="resaults" v-if="results.length > 0 && keywords.length > 2">
                <li v-for="result in results" :key="result.id"><a :href="result.slug">{{ result.name }}</a></li>
            </ul>
        </div>
    </div>
</template>

<style scoped>

.search-block {
    position: relative;
}

.resaults {
    position: absolute;
    left: 0;
    background: #fff;
    list-style: none;
    margin: 0;
    padding: 10px 0;
    width: 100%;
    color: #000;
    box-shadow: 0px 1px 3px 0px #000;
    z-index: 10;
}

.resaults li {
    padding: 7px 5px 7px 10px;
}

.resaults li:hover {
    background: #0a53be;
    color: #fff;
}

.resaults li a {
    color: inherit;
    display: inline-block;
    width: 100%;
}
</style>
