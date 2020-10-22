import AllUsers from './components/AllUsers.vue';
// import AddUser from './components/AddUser.vue';
import ShowUser from './components/ShowUser.vue';

export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllUsers
    },
    // {
    //     name: 'add',
    //     path: '/add',
    //     component: AddUser
    // },
    {
        name: 'show',
        path: '/show/:id',
        component: ShowUser,
        props: true
    },
    // {
    //     name: 'list',
    //     path: '/list/page/:page',
    //     component: AllUsers,
    //     props: true
    // }

];