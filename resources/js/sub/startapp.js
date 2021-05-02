window._ = require('lodash');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}


window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// start notes
import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});

//End Boot

import Form from '../Form'

window.Vue = require('vue').default;
window.Form = Form

Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('welcom-component', require('./components/WelcomComponent.vue').default);
Vue.component('addbolog-component', require('./components/blogs/AddBlog.vue').default);
Vue.component('show-model', require('./components/blogs/showModel.vue').default);
Vue.component('blog-component', require('./components/blogs/BlogComponent.vue').default);
Vue.component('notes-action', require('./components/blogs/NotesAction.vue').default);




/* Auth  */
//SET Login In Project
// const token = localStorage.getItem('token')

// if (token) {
//     axios.defaults.headers.common['Authorization'] =  "Bearer " + token;
// }

const app = new Vue({
    el: '#startApp',
});


