<script setup>

import {ref} from "vue";

const tab = ref('one');
const tab2 = ref('one');

const seasons = {0: 'Всесезонные', 1: 'Летние', 2: 'Зимние с шипами', 3: 'Зимние без шипов',};
const icons = ['mdi-snowflake', 'mdi-leaf', 'mdi-fire', 'mdi-water',];
const modelValue = ref(null);
const diametrs = ['R12', 'R13', 'R14', 'R15', 'R16', 'R17', 'R18', 'R19', 'R20', 'R21', 'R22']
const season = function (val) {return this.icons[val]}
const value = ref([100, 400]);
</script>

<template>

    <div class="decor-1">

        <!--text.txt-->

        <br>
        <br>
        <div class="products">
            <div class="container-lg">
                <div class="row">
                    <div class="col-lg-3 col-12 products-filter">

                        <v-card-title>Диапазон цен</v-card-title>
                        <br>
                        <v-range-slider v-model="value" step="10" min="100" max="1000" thumb-label="always" color="blue-darken-2"/>
                        <v-autocomplete
                            label="Autocomplete"
                            :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
                            variant="outlined"
                            color="blue-darken-2"
                        ></v-autocomplete>
                        <v-autocomplete
                            label="Autocomplete"
                            :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
                            variant="outlined"
                            color="blue-darken-2"
                        ></v-autocomplete>
                        <v-autocomplete
                            label="Autocomplete"
                            :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
                            variant="outlined"
                            color="blue-darken-2"
                        ></v-autocomplete>
                        <v-autocomplete
                            label="Autocomplete"
                            :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
                            variant="outlined"
                            color="blue-darken-2"
                        ></v-autocomplete>
                    </div>

                    <div class="col-lg-9 col-12 products-container d-flex flex-wrap justify-content-center">
                        <div class="products-item">
                            <div class="products-item__img">
                                <img src="/assets/images/product-img.png" alt="">
                            </div>
                            <div class="products-item__content">
                                <div class="products-item__content-title">Шины BOTO Genesys 208</div>
                                <div class="products-item__content-text">155/70 R12 73T</div>
                                <div class="products-item__content-price">13 150 тг</div>
                                <div>
                                    <a href="#" class="products-item__content-buy mr-1">Купить</a>
                                    <a href="#" class="products-item__content-korzina">В корзину</a>
                                </div>

                                <a href="#" class="products-item__content-rasrochka">Купить в рассрочку</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<style scoped>

</style>
