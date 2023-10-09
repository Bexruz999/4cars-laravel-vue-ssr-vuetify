<script setup>

import {ref} from "vue";

const profile_menu = [
    {'slug': '/test', 'img': 'history-icon.png', 'title': 'История заказов'},
    {'slug': '/test', 'img': 'basket-icon.png', 'title': 'Корзина'},
    {'slug': '/test', 'img': 'card-icon.png', 'title': 'Мои карты'},
    {'slug': '/user/profile', 'img': 'setting-icon.png', 'title': 'Настройки'}
];

const pathname = ref(window.location.pathname);

</script>

<template>

    <div class="col-xl-3 col-12 cabinet-active__menu mb-3">
        <img src="/assets/images/icons/person-cabinet.png" class="cabinet-active__menu-photo" alt="person">
        <div class="mb-2 text-center"></div>

        <mymenu v-slot="scope">
            <template v-for="item in profile_menu" :key="item.id">
                <router-link :to="item.slug" @click.prevent="scope.btn(item.slug)" class="mb-4 cabinet-active__menu-link">
                    <img :src="'/assets/images/cabinet-icons/' + item.img" alt="profile_menu">
                    <div :class="['cabinet-active__menu-text mr-5 ', (pathname === item.slug) ? 'active' : '']">
                        <span>{{ item.title }}</span><i class="arrow right"></i>
                    </div>
                </router-link>
            </template>
        </mymenu>
    </div>

</template>
