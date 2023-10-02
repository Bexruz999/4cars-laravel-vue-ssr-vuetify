<script setup>

import {ref} from "vue";

const tab = ref('one');
const tab2 = ref('one');

const seasons = {0: 'Всесезонные', 1: 'Летние', 2: 'Зимние с шипами', 3: 'Зимние без шипов',};
const icons = ['mdi-snowflake', 'mdi-leaf', 'mdi-fire', 'mdi-water',];
const modelValue = ref(null);
const diametrs = ['R12', 'R13', 'R14', 'R15', 'R16', 'R17', 'R18', 'R19', 'R20', 'R21', 'R22']
const season = function (val) {return this.icons[val]}

</script>

<template>

    <div class="selection">
        <div class="container-lg">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="selection-title">Подбор шин</h3>
                    <v-card>
                        <v-tabs v-model="tab" bg-color="blue-darken-2">
                            <v-tab class="" value="one"> Шины по размеру</v-tab>
                            <v-tab value="two">Шины по автомобилю</v-tab>
                        </v-tabs>

                        <v-card-text>
                            <v-window v-model="tab">
                                <v-window-item value="one">
                                    <br>
                                    <v-item-group multiple selected-class="bg-blue-darken-2">
                                        <div class="text-caption mb-2">Сезон</div>
                                        <v-item v-for="n in seasons" :key="n" v-slot="{ selectedClass, toggle }">
                                            <v-chip style="margin-left: 2px" :class="selectedClass" @click="toggle">
                                                {{n}}
                                            </v-chip>
                                        </v-item>
                                    </v-item-group>
                                    <br>
                                    <v-item-group multiple selected-class="bg-blue-darken-2">
                                        <div class="text-caption mb-2">Диаметр</div>
                                        <v-item v-for="n in diametrs" :key="n" v-slot="{ selectedClass, toggle }">
                                            <v-chip style="margin-left: 2px" :class="selectedClass" @click="toggle">
                                                {{n}}
                                            </v-chip>
                                        </v-item>
                                    </v-item-group>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <v-select label="Ширина" color="blue-darken-2" :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']" variant="outlined"></v-select>
                                        </div>
                                        <div class="col-6">
                                            <v-select label="Высота" color="blue-darken-2" :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']" variant="outlined"></v-select>
                                        </div>
                                    </div>
                                    <v-switch label="Только в наличии" inset color="blue-darken-2"></v-switch>

                                    <v-btn variant="flat" color="blue-darken-2">Подобрать</v-btn>
                                    <v-btn style="margin-left: 5px;" variant="outlined" color="blue-darken-2">Сбросить</v-btn>
                                </v-window-item>

                                <v-window-item value="two">
                                    <v-item-group multiple selected-class="bg-blue-darken-2">
                                        <div class="text-caption mb-2">Сезон</div>
                                        <v-item v-for="n in seasons" :key="n" v-slot="{ selectedClass, toggle }">
                                            <v-chip style="margin-left: 2px" :class="selectedClass" @click="toggle">
                                                {{n}}
                                            </v-chip>
                                        </v-item>
                                    </v-item-group>
                                    <br>
                                    <v-autocomplete
                                        label="Autocomplete"
                                        :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
                                        variant="outlined"
                                    ></v-autocomplete>
                                    <v-switch label="Только в наличии" inset color="blue-darken-2"></v-switch>

                                    <v-btn variant="flat" color="blue-darken-2">Подобрать</v-btn>
                                    <v-btn style="margin-left: 5px;" variant="outlined" color="blue-darken-2">Сбросить</v-btn>
                                </v-window-item>
                            </v-window>
                        </v-card-text>
                    </v-card>
                    <br>
                </div>
                <div class="col-lg-6">
                    <h3 class="selection-title">Подбор дисков</h3>
                    <v-card>
                        <v-tabs v-model="tab2" bg-color="blue-darken-2">
                            <v-tab class="" value="one">Диски по размеру</v-tab>
                            <v-tab value="two">Диски по автомобилю</v-tab>
                        </v-tabs>

                        <v-card-text bg-color="blue-darken-2">
                            <v-window v-model="tab2">
                                <v-window-item value="one">
                                    <br>
                                    <v-item-group multiple selected-class="bg-blue-darken-2">
                                        <div class="text-caption mb-2">Сезон</div>
                                        <v-item v-for="n in seasons" :key="n" v-slot="{ selectedClass, toggle }">
                                            <v-chip style="margin-left: 2px" :class="selectedClass" @click="toggle">
                                                {{n}}
                                            </v-chip>
                                        </v-item>
                                    </v-item-group>
                                    <br>
                                    <v-item-group multiple selected-class="bg-blue-darken-2">
                                        <div class="text-caption mb-2">Диаметр</div>
                                        <v-item v-for="n in diametrs" :key="n" v-slot="{ selectedClass, toggle }">
                                            <v-chip style="margin-left: 2px" :class="selectedClass" @click="toggle">
                                                {{n}}
                                            </v-chip>
                                        </v-item>
                                    </v-item-group>
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <v-select label="Ширина" color="blue-darken-2" :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']" variant="outlined"></v-select>
                                        </div>
                                        <div class="col-6">
                                            <v-select label="Высота" color="blue-darken-2" :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']" variant="outlined"></v-select>
                                        </div>
                                    </div>
                                    <v-switch label="Только в наличии" inset color="blue-darken-2"></v-switch>

                                    <v-btn variant="flat" color="blue-darken-2">Подобрать</v-btn>
                                    <v-btn style="margin-left: 5px;" variant="outlined" color="blue-darken-2">Сбросить</v-btn>
                                </v-window-item>

                                <v-window-item value="two">
                                    <v-item-group multiple selected-class="bg-blue-darken-2">
                                        <div class="text-caption mb-2">Сезон</div>
                                        <v-item v-for="n in seasons" :key="n" v-slot="{ selectedClass, toggle }">
                                            <v-chip style="margin-left: 2px" :class="selectedClass" @click="toggle">
                                                {{n}}
                                            </v-chip>
                                        </v-item>
                                    </v-item-group>
                                    <br>
                                    <v-autocomplete
                                        label="Autocomplete"
                                        :items="['California', 'Colorado', 'Florida', 'Georgia', 'Texas', 'Wyoming']"
                                        variant="outlined"
                                    ></v-autocomplete>
                                    <v-switch label="Только в наличии" inset color="blue-darken-2"></v-switch>

                                    <v-btn variant="flat" color="blue-darken-2">Подобрать</v-btn>
                                    <v-btn style="margin-left: 5px;" variant="outlined" color="blue-darken-2">Сбросить</v-btn>
                                </v-window-item>
                            </v-window>
                        </v-card-text>
                    </v-card>
                </div>
            </div>
        </div>
    </div>

</template>

<style scoped>

</style>
