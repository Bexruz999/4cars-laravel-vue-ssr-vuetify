<script setup>

const profile_menu = [
    {'slug': '/user/history', 'img': 'history-icon.png', 'title': 'История заказов'},
    {'slug': '/user/basket', 'img': 'basket-icon.png', 'title': 'Корзина'},
    {'slug': '/user/payment', 'img': 'card-icon.png', 'title': 'Мои карты'},
    {'slug': '/user/profile', 'img': 'setting-icon.png', 'title': 'Настройки'},
    {'slug': '/logout', 'img': 'setting-icon.png', 'title': 'Выход'}
];

const pathname = window.location.pathname;

</script>

<template>

    <div class="col-xl-3 col-12 cabinet-active__menu mb-3">
        <img src="/assets/images/icons/person-cabinet.png" class="cabinet-active__menu-photo" alt="person">
        <div class="mb-2 text-center"></div>

        <mymenu v-slot="scope">

            <template v-for="item in profile_menu" :key="item.id">
                <a :href="item.slug" class="mb-4 cabinet-active__menu-link">
                    <img :src="'/assets/images/cabinet-icons/' + item.img" alt="profile_menu">
                    <div :class="['cabinet-active__menu-text mr-5 ', (pathname === item.slug) ? 'active' : '']">
                        <span>{{ item.title }}</span><i class="arrow right"></i>
                    </div>
                </a>
            </template>

        </mymenu>
    </div>

</template>
