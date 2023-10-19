<script setup>

import {onMounted, onUpdated, ref, watch} from "vue";

const tab = ref('one');
const tab2 = ref('one');
const data = ref([]);
const modelValue = ref(null);
const width = ref();
const height = ref();
const filter = ref({
    'seasons': {'Всесезонные': false, 'Летние': false, 'Зимние с шипами': false, 'Зимние без шипов': false},
    'diameters': {'R12': false, 'R13': false, 'R14': false, 'R15': false, 'R16': false, 'R17': false, 'R18': false, 'R19': false, 'R20': false, 'R21': false, 'R22': false},
    'width': 'Выбрать',
    'height': 'Выбрать'
});

let nextpage = ref(1);
let lastpage = ref(1);
const loading = ref(false);
const page = ref(true);

onMounted(() => {

    getSizes('get-sizes', false, (data) => {
        width.value = data.width;
        height.value = data.height;
    });

});

const getSizes = function (url, data, callback) {

    axios.post(`/api/${url}`, data).then((response) => { callback(response.data) });
}

const setData = function (toggle, index, name) {
    toggle();
    filter.value[name][index] = !filter.value[name][index]
    updateSizes();
}

const getForSize =  function () {

    if ((nextpage.value <= lastpage.value)) {
        loading.value = true;
        if (page.value) {
            page.value = false;
            setLoadingObserver()
        }
        //?=${nextpage.value}
        axios.post( `/api/get-tires?=${nextpage.value}`, filter.value)
            .then((response) => {
                document.getElementById('content').style.display = 'none'
                data.value.push(...response.data.data);
                nextpage.value++;
                lastpage.value = response.data.last_page;
                console.log(response.data)
            }).catch(() => {loading.value = false});
    } else {
        console.log(nextpage.value <= lastpage.value)
    }
}

const clearForm = function () {
    for (const key in filter.value.seasons) { filter.value.seasons[key] = false; }
    for (const k in filter.value.diameters) { filter.value.diameters[k] = false; }
    filter.value.width = 'Выбрать';
    filter.value.height = 'Выбрать';
    loading.value = false;
    page.value = true;
    document.getElementById('content').style.display = 'block';
    data.value = [];
    lastpage.value = 1;
    nextpage.value = 1;
    getSizes('get-sizes', false, (data) => {
        width.value = data.width;
        height.value = data.height;
    });
}

const updateSizes = () => getSizes('update-tire' , filter.value, (res) => {
        width.value = res.width;
        height.value = res.height;
        lastpage.value = 1;
        nextpage.value = 1;
        data.value = [];
    });



const setLoadingObserver = function () {
    const loadingObserver = new IntersectionObserver(
        entries => {
        entries.forEach(entry => {
            if (nextpage.value > lastpage.value) {
               loading.value = false
            }
            setTimeout(() => {
                getForSize()
            }, 500)
        })
    });

    if (loading.value) {
        setTimeout(() => {
            loadingObserver.observe(document.querySelector('.posts__loading'))
        }, 500)

    }
}

const setPostsObserver = function () {
    /* создаём наблюдение */
    const postsObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => { /* для каждого элемента */
            if (entry.isIntersecting) { /* если элемент в видимой области браузера */
                entry.target.classList.add('post_active') /* добавляем активный класс наблюдаемому элементу, то есть посту */
                observer.unobserve(entry.target); /* и отключаем наблюдение за этим постом */
            }
        })
    });

    document.querySelectorAll('.posts__post:not(.post_active)').forEach(post => { /* получаем только неактивные посты */
        postsObserver.observe(post) /* указываем, что наблюдаем за ними */
    })
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
                                            <v-item v-for="(n, index) in filter.seasons" :key="index" v-slot="{toggle }">
                                                <v-chip style="margin-left: 2px" :class="{ 'bg-blue-darken-2': n}" @click="setData(toggle, index, 'seasons')">
                                                    {{index}}
                                                </v-chip>
                                            </v-item>
                                        </v-item-group>
                                        <br>
                                        <br>
                                        <v-item-group multiple selected-class="bg-blue-darken-2">
                                            <div class="text-caption mb-2">Диаметр</div>
                                            <v-item v-for="(d, index) in filter.diameters" :key="index" v-slot="{ toggle }">
                                                <v-chip style="margin-left: 2px" :class="{ 'bg-blue-darken-2': d}" @click="setData(toggle, index, 'diameters')">
                                                    {{index}}
                                                </v-chip>
                                            </v-item>
                                        </v-item-group>
                                        <br>
                                        <br>
                                        <div class="row">
                                            <div class="col-6">
                                                <v-select v-model="filter.width" label="Ширина" color="blue-darken-2" :items="width" variant="outlined" return-object></v-select>
                                            </div>
                                            <div class="col-6">
                                                <v-select v-model="filter.height" label="Высота" color="blue-darken-2" :items="height" variant="outlined" return-object></v-select>
                                            </div>
                                        </div>
                                        <br>

                                        <v-btn @click="getForSize" variant="flat" color="blue-darken-2">Подобрать</v-btn>
                                        <v-btn @click="clearForm" style="margin-left: 5px;" variant="outlined" color="blue-darken-2">Сбросить</v-btn>
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


    <div class="selection">
        <div class="container-lg">
            <div class="row">
                <div class="products-container mb-lg-5 mb-3 d-flex justify-content-lg-center justify-content-around align-items-center flex-wrap">
                    <div v-for="item in data" class="products-item">
                        <div class="products-item__img">
                            <img src="http://127.0.0.1:8000/assets/images/product-img.png" alt="tseee">
                        </div>
                        <div class="products-item__content">
                            <div class="products-item__content-title">{{ item.Name }}</div>
                            <div class="products-item__content-price">{{ item.Price }} тг</div>
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

    <div class="posts__loading" v-if="loading"> <!-- добавили условный атрибут v-if -->
        <svg viewBox="25 25 50 50">
            <circle cx="50" cy="50" r="20"></circle>
        </svg>
    </div>
</template>

<style scoped>

.posts__loading {
    text-align: center;
    font-size: 24px;
    font-weight: 300;
}

svg {
    width: 3.75em;
    transform-origin: center;
    animation: rotate 2s linear infinite;
}
circle {
    fill: none;
    stroke: black;
    stroke-width: 4;
    stroke-dasharray: 1, 200;
    stroke-dashoffset: 0;
    stroke-linecap: round;
    animation: dash 1.5s ease-in-out infinite;
}
@-moz-keyframes rotate {
    100% {
        transform: rotate(360deg);
    }
}
@-webkit-keyframes rotate {
    100% {
        transform: rotate(360deg);
    }
}
@-o-keyframes rotate {
    100% {
        transform: rotate(360deg);
    }
}
@keyframes rotate {
    100% {
        transform: rotate(360deg);
    }
}
@-moz-keyframes dash {
    0% {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
    }
    50% {
        stroke-dasharray: 90, 200;
        stroke-dashoffset: -35px;
    }
    100% {
        stroke-dashoffset: -125px;
    }
}
@-webkit-keyframes dash {
    0% {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
    }
    50% {
        stroke-dasharray: 90, 200;
        stroke-dashoffset: -35px;
    }
    100% {
        stroke-dashoffset: -125px;
    }
}
@-o-keyframes dash {
    0% {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
    }
    50% {
        stroke-dasharray: 90, 200;
        stroke-dashoffset: -35px;
    }
    100% {
        stroke-dashoffset: -125px;
    }
}
@keyframes dash {
    0% {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
    }
    50% {
        stroke-dasharray: 90, 200;
        stroke-dashoffset: -35px;
    }
    100% {
        stroke-dashoffset: -125px;
    }
}
</style>
