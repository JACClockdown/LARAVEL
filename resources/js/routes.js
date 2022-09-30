import Home from './components/Home';
import About from './components/About';
import Login from './components/Login';


export default {

    mode: 'history',

    routes: [

        {
            path:'/dashboard',
            component: Home,
            name:'dashboard'
        },
        {
            path:'/about',
            component: About
        },
        {
            path:'/login',
            component: Login
        }

    ]
}