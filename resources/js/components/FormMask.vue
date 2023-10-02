<script>

import { useIMask } from 'vue-imask';

export default {
    setup (props) {
        const { el,em, masked } = useIMask(
            {mask: '+7 (000) 000-00-00', radix: '.'},
            {mask: '+7 (000) 000-00-00', radix: '.'}
        );

        return { el, em };
    }
}

</script>

<template>

    <input name="tel" class="callback-form__input" placeholder="Телефон" ref="el">

</template>

<style scoped>

</style>
