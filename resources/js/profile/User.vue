<script setup>

import ProfileMenu from "./ProfileMenu.vue";
import {onMounted, ref} from "vue";
import { useField, useForm } from 'vee-validate'
const csrf = document.head.querySelector('meta[name="csrf-token"]') ? document.head.querySelector('meta[name="csrf-token"]').content : '';

const name = ref('');
const email = ref('');
const image = ref('');

onMounted(() => {
    window.axios.get('/user/info')
        .then((response) => {
            let data = response.data;
            console.log(data);
            name.value = data.name;
        })
        .catch( (error) => {});
});

useForm({

    validationSchema: {
        email (value) {

            if (/^[a-z0-9.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true

            return 'Must be a valid e-mail.';
        },

        password (value) {

            if (value?.length >= 8) return true

            return 'Name needs to be at least 2 characters.'
        }
    },
})

const login = useField('email');
const password = useField('password');

</script>

<template>

    <div class="cabinet-active">
        <div class="container-lg">
            <div class="row d-flex justify-content-evenly">
                <profile-menu></profile-menu>
                <div class="col-xl-8 col-12">
                    <div class="cabinet-active__list">
                        <div class="cabinet-active__list-settings d-flex flex-column justify-content-center mb-3">
                            <div><b> <p>Редактировать аккаунт</p></b></div>

                            <form action="#" class="d-flex flex-column justify-content-center">

                                <input type="hidden" name="_token" :value="csrf">

                                <v-text-field density="compact" variant="outlined" type="email" name="email" v-model="login.value.value" :counter="10" :error-messages="login.errorMessage.value" label="Логин"></v-text-field>
                                <br>
                                <v-text-field density="compact" variant="outlined" type="password" name="password" v-model="password.value.value" :counter="10" :error-messages="password.errorMessage.value" label="Новый пароль"></v-text-field>
                                <br>
                                <v-text-field density="compact" variant="outlined" type="password" name="confirm" v-model="password.value.value" :counter="10" :error-messages="password.errorMessage.value" label="Повторите пароль"></v-text-field>
                                <br>
                                <v-btn color="blue-darken-2" class="me-4" type="submit">Сохранить</v-btn>

                            </form>
                        </div>
                        <div class="cabinet-active__list-photo d-flex flex-column">
                            <v-avatar image="/assets/images/icons/person-cabinet.png" size="150"></v-avatar>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
