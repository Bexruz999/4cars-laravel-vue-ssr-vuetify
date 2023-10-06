<script setup>
import { useField, useForm } from 'vee-validate'
import {computed} from "vue";
const csrf = document.head.querySelector('meta[name="csrf-token"]') ? document.head.querySelector('meta[name="csrf-token"]').content : '';

useForm({
    validationSchema: {
        name (value) {
            if (value?.length >= 3) return true
            return 'Name needs to be at least 2 characters.'
        },
        email (value) {
            if (/^[a-z0-9.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true
            return 'Must be a valid e-mail.';
        },
        password (value) {
            if (value?.length >= 8) {
                if (confirm.value.value.length < 1 || confirm.value.value === value) {
                    return true
                }
                return 'ne sovpadaet'
            }
            return 'Name needs to be at least 2 characters.'
        },
        confirm (value) {
            if (value?.length >= 8) {
                if (password.value.value.length < 1 || password.value.value === value) {
                    return true
                }
                return 'ne sovpadaet'
            }
            return 'Name needs to be at least 2 characters.'
        }
    },
});

const name = useField('name');
const login = useField('email');
const password = useField('password');
const confirm = useField('confirm');

const formValid = computed(() => {
    let n = !name.errorMessage.value && name.value.value;
    let l = !login.errorMessage.value && login.value.value;
    let p = !password.errorMessage.value && password.value.value;
    let c = !confirm.errorMessage.value && confirm.value.value;
    return !!(n !== undefined && l !== undefined && p !== undefined && c !== undefined && confirm.value.value === password.value.value);
});

</script>

<template>
    <v-icon icon="mdi-home" />
    <div class="container-lg">
        <div class="row cabinet">
            <div class="col-lg-6 col-12 cabinet-form">

                <div class="cabinet-form-content">

                    <form action="/register" method="post">

                        <input type="hidden" name="_token" :value="csrf">

                        <v-text-field variant="outlined" name="password" v-model="name.value.value" :error-messages="name.errorMessage.value" label="Имя"></v-text-field>
                        <br>
                        <v-text-field variant="outlined" name="email" v-model="login.value.value" :error-messages="login.errorMessage.value" label="E-mail"></v-text-field>
                            <br>
                        <v-text-field variant="outlined" type="password" name="password" v-model="password.value.value" :error-messages="password.errorMessage.value" label="Пароль"></v-text-field>
                        <br>
                        <v-text-field variant="outlined" type="password" name="email" v-model="confirm.value.value" :error-messages="confirm.errorMessage.value" label="Подтверждение пароля"></v-text-field>
                        <br>
                        <v-btn color="blue-darken-2" :disabled="!formValid" type="submit">Зарегистрироваться</v-btn>

                    </form>
                </div>

            </div>
            <div class="col-lg-6 col-12 cabinet-img"></div>
        </div>
    </div>

</template>
