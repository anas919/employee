require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-chat-scroll'))
/**
 *   
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('chat-component', require('./components/ChatComponent.vue'));
import ChatComponent from './components/ChatComponent.vue';

Vue.component('chat-component', ChatComponent);

const app = new Vue({
    el: '#app'
});
