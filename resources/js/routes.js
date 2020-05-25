import Home from './pages/Home';
import Login from './pages/Login';

export default [
    {
        path: '/',
        component: Home,
        name: 'home'
    },
    {
        path: '/login',
        component: Login,
        name: 'login'
    }
];