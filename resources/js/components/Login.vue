<script setup>
import { useField, useForm } from 'vee-validate'
const csrf = document.head.querySelector('meta[name="csrf-token"]') ? document.head.querySelector('meta[name="csrf-token"]').content : '';

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

    <div class="container-lg">
        <div class="row cabinet">
            <div class="col-lg-6 col-12 cabinet-form">

                <div class="cabinet-form-content">

                    <form action="/login" method="post">
                        <input type="hidden" name="_token" :value="csrf">
                        <v-text-field variant="outlined" type="email" name="email" v-model="login.value.value" :counter="10" :error-messages="login.errorMessage.value" label="Логин"></v-text-field>
                        <br>

                        <v-text-field variant="outlined" type="password" name="password" v-model="password.value.value" :counter="10" :error-messages="password.errorMessage.value" label="Пароль"></v-text-field>
                        <br>

                        <v-btn color="blue-darken-2" class="me-4" type="submit">Войти</v-btn>

                        <v-btn variant="flat">Забыли пароль</v-btn>
                    </form>
                    <br>
                    <v-btn href="/register" class="mt-5" variant="outlined" color="blue-darken-2">Зарегистрироваться</v-btn>
                </div>

            </div>
            <div class="col-lg-6 col-12 cabinet-img"></div>
        </div>
    </div>

</template>
