<script setup>

import {onMounted, ref} from "vue";

const tab = ref('one');
const tab2 = ref('one');

const modelValue = ref(null);
const width = ref();
const height = ref();
const filter = ref({
    'seasons': {'Всесезонные': false, 'Летние': false, 'Зимние с шипами': false, 'Зимние без шипов': false},
    'diameters': {'R12': false, 'R13': false, 'R14': false, 'R15': false, 'R16': false, 'R17': false, 'R18': false, 'R19': false, 'R20': false, 'R21': false, 'R22': false},
    'width': 'Выбрать',
    'height': 'Выбрать'
});

onMounted(() => {

    getSizes('get-sizes', false, (data) => {
        width.value = data.width;
        height.value = data.height;
    });

})

const getSizes = function (url, data, callback) {

    axios.post(`/api/${url}`, data)
        .then((response) => { callback(response.data) })
        .catch( (error) => {});
}

const setData = function (toggle, index, name) {
    toggle();
    filter.value[name][index] = !filter.value.seasons[index]
    updateSizes();
}
const getForSize =  function () {

    axios.post('/api/test', filter.value)
        .then((response) => {
            console.log(response.data)
        })
        .catch( (error) => {});
}

const updateSizes = function () {


    getSizes('update-tire' , filter.value, (data) => {
        console.log(data)
    });
}

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
                                    <form>
                                        <v-item-group multiple selected-class="bg-blue-darken-2">
                                            <div class="text-caption mb-2">Сезон</div>
                                            <v-item v-for="(n, index) in filter.seasons" :key="index" v-slot="{ selectedClass, toggle }">
                                                <v-chip style="margin-left: 2px" :class="selectedClass" @click="setData(toggle, index, 'seasons')">
                                                    {{index}}
                                                </v-chip>
                                            </v-item>
                                        </v-item-group>
                                        <br>
                                        <v-item-group multiple selected-class="bg-blue-darken-2">
                                            <div class="text-caption mb-2">Диаметр</div>
                                            <v-item v-for="(d, index) in filter.diameters" :key="index" v-slot="{ selectedClass, toggle }">
                                                <v-chip style="margin-left: 2px" :class="selectedClass" @click="setData(toggle, index, 'diameters')">
                                                    {{index}}
                                                </v-chip>
                                            </v-item>
                                        </v-item-group>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <v-select v-model="filter.width" label="Ширина" color="blue-darken-2" :items="width" variant="outlined" return-object></v-select>
                                            </div>
                                            <div class="col-6">
                                                <v-select v-model="filter.height" label="Высота" color="blue-darken-2" :items="height" variant="outlined" return-object></v-select>
                                            </div>
                                        </div>
                                        <v-switch label="Только в наличии" inset color="blue-darken-2"></v-switch>

                                        <v-btn @click="getForSize" variant="flat" color="blue-darken-2">Подобрать</v-btn>
                                        <v-btn style="margin-left: 5px;" variant="outlined" color="blue-darken-2">Сбросить</v-btn>
                                    </form>
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
