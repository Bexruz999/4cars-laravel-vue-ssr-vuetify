require('./bootstrap');

import {createApp, ref} from 'vue';
import Collback from './components/Callback.vue';
import App from './app.vue';
import Search from './components/Search.vue';
import FormMask from "./components/FormMask.vue";
import MyMenu from './components/menu.vue';
import wrapperComponent from './components/wrapperComponent.vue';
import Content from "./components/content.vue";
import {createRouter, createWebHistory} from 'vue-router';

// Vuetify
import 'vuetify/styles'
import {createVuetify} from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
    components,
    directives
})

const Home = () => import('./views/Home.vue');
const Catalog = () => import('./views/Catalog.vue');
const Login = () => import('./components/Login.vue');
const Register = () => import('./components/Register.vue');
const User = () => import('./profile/User.vue');
const Payment = () => import('./profile/Payment.vue');
const Basket = () => import('./profile/Basket.vue')
const History = () => import('./profile/History.vue')

const routes = [
    { path: '', component: Home },
    { path: '/tires', component: Catalog },
    { path: '/login', component: Login },
    { path: '/register', component: Register},
    { path: '/user/profile', component: User},
    { path: '/user/payment', component: Payment},
    { path: '/user/basket', component: Basket},
    { path: '/user/payment', component: Payment},
    { path: '/user/history', component: History},
];

const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

const app = createApp().use(vuetify).use(router);
const contentName = ref('collback');
const contentData = ref('');

let a = [];
function updateContent(url) {
    window.axios.get(url)
        .then((response) => {
            changeContent(response)
        })
        .catch( (error) => {});
}
function updateBasket(id = 0) {

    window.axios.get('/api/add_basket/' + id)
        .then((response) => {
            document.getElementById('basketCount').innerText = sum(response.data);
            console.log(response.data)
        })
        .catch( (error) => {});
}



updateBasket();
function changeContent(response) {
    const content = document.getElementById('content');
    const title = document.getElementById('title');
    const intro = document.getElementById('intro');
    const s404 = document.getElementById('s404');
    let data = response.data;
    intro.style.backgroundImage = 'url(' + data['page']['image'] + ')';
    console.log(response.data);
    content.innerHTML = data['view'];
    title.innerHTML = data['page']['title'];
    if (data['page']['slug'] === '/'){
        intro.classList.remove('introPages');
        intro.classList.add('introMain');
        s404.style.display = 'none';
    } else if (data['page']['slug'] === '404') {
        intro.classList.remove('introPages');
        intro.classList.add('introMain');
        s404.style.display = 'block'
    } else {
        intro.classList.remove('introMain');
        intro.classList.add('introPages');
        s404.style.display = 'none'
    }
}

app.provide('content', {updateContent, contentName, contentData});
app.provide('basket',  {updateBasket});

app.component('wrappercomponent', wrapperComponent);
app.component('content', Content);
app.component('mymenu', MyMenu);
app.component('collback', Collback);
app.component('search', Search);
app.component('formmask', FormMask);

app.mount('.dyn-content');
