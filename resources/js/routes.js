import AllAdvert from './components/AllAdvert.vue';
import CreateAdvert from './components/CreateAdvert.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllAdvert
    },
    {
        name: 'create',
        path: '/create',
        component: CreateAdvert
    }
];
