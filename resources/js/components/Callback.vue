<script setup>
import Modal from './Modal.vue'
import { ref } from 'vue'
import FormMask from "./FormMask.vue";


defineProps(['title', 'btn_class'])
const showModal = ref(false);
const csrf = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
</script>

<template>
    <button id="show-modal" :class="btn_class" @click="showModal = true">{{ title }}</button>

    <Teleport to="body">
        <!-- use the modal component, pass in the prop -->
        <modal :show="showModal" @close="showModal = false">
            <template #header>
                <h3>{{ title }}</h3>
            </template>
            <template #body>
                <form action="/collback" method="post" class="d-flex flex-column justify-content-between align-items-center">
                    <input type="hidden" name="_token" :value="csrf">
                    <input type="text" name="name" class="callback-form__input" placeholder="Имя" required="">
                    <FormMask></FormMask>
                    <input type="submit" value="Отправить" class="callback-form__btn" placeholder="Телефон">
                </form>
            </template>

            <template #footer>
            </template>
        </modal>
    </Teleport>
</template>
