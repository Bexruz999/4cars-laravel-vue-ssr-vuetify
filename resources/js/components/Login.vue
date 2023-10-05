<script setup>
import { ref } from 'vue'
import { useField, useForm } from 'vee-validate'

const { handleSubmit, handleReset } = useForm({
    validationSchema: {
        email (value) {
            emailError.value = false;
            if (/^[a-z.-]+@[a-z.-]+\.[a-z]+$/i.test(value)) return true

            return 'Must be a valid e-mail.';
        },

        password (value) {
            if (value?.length >= 8) return true

            return 'Name needs to be at least 2 characters.'
        }
    },
})
const emailError = ref(false);
const passError = ref(false);
const login = useField('email');
const password = useField('password');

const submit = handleSubmit(values => {
    alert(JSON.stringify(values, null, 2));
    window.axios.post('/login', values)
        .then(response => {
            console.log(response)
        }).catch(error => {
        if (error.response) {
            console.log(error.response);
            console.log(error.response.status);
            if (error.response.status === 401) {

            } else {
                let errors = Object.keys(error.response.data.errors);
                if (errors.includes('email')) {
                    emailError.value = 'uje bor';
                    console.log('true');
                }
            }
        }}
    );
})
</script>

<template>
    <v-icon icon="mdi-home" />
    <div class="container-lg">
        <div class="row cabinet">
            <div class="col-lg-6 col-12 cabinet-form">

                <div class="cabinet-form-content">

                    <form @submit.prevent="submit">
                        <v-text-field variant="outlined" v-model="login.value.value" :counter="10" :error-messages="login.errorMessage.value" label="Логин"></v-text-field>
                        <br>

                        <v-text-field variant="outlined" v-model="password.value.value" :counter="10" :error-messages="password.errorMessage.value" label="Пароль"></v-text-field>
                        <br>

                        <v-btn color="blue-darken-2" class="me-4" type="submit">Войти</v-btn>

                        <v-btn variant="flat" @click="handleReset">Забыли пароль</v-btn>
                    </form>
                    <br>
                    <v-btn class="mt-5" variant="outlined" color="blue-darken-2">Зарегистрироваться</v-btn>
                </div>

            </div>
            <div class="col-lg-6 col-12 cabinet-img"></div>
        </div>
    </div>

</template>
