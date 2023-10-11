<script setup>

import ProfileMenu from "./ProfileMenu.vue";
</script>

<template>

    <div class="cabinet-active">
        <div class="container-lg">
            <div class="row d-flex justify-content-evenly">
                <profile-menu/>
                <div class="col-xl-8 col-12 cabinet-active__list">
                    <div class="products-item products products-container">
                        <div class="products-item__img">
                            <img src="/assets/images/product-img.png" alt="">
                        </div>
                        <div class="products-item__content products-item__content-short">
                            <div class="products-item__content-title">Шины BOTO Genesys 208</div>
                            <div class="products-item__content-text">155/70 R12 73T</div>
                            <div class="products-item__content-price">13 150 тг</div>
                            <div>
                                <a href="#" class="products-item__content-buy mr-1">Доставлено</a>
                                <a href="#" class="products-item__content-korzina">14.09.2023</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</template>
