<script setup>

import ProfileMenu from "./ProfileMenu.vue";
</script>

<template>

    <div class="cabinet-active">
        <div class="container-lg">
            <div class="row d-flex justify-content-evenly">
                <profile-menu/>
                <div class="col-xl-8 col-12">
                    <div class="cabinet-active__list">
                        <div class="mb-3 cabinet-active__list-card">
                            <img src="/assets/images/card-visa.png" alt="">
                            <div class="d-flex flex-column">
                                <span><b>****9999</b></span>
                                <span>Срок действия карты: 12/25</span>
                            </div>
                        </div>
                        <!-- /cabinet-active__list-card -->
                        <a href="#" class="mb-3 cabinet-active-btn">Привязать карту</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
