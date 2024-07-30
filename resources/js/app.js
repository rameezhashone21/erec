/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");
window.Vue = require("vue").default;

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component(
    "chat-messages",
    require("./components/ChatMessages.vue").default
);
Vue.component("chat-form", require("./components/ChatForm.vue").default);
Vue.component("global-chat", require("./components/GlobalChat.vue").default);
Vue.component("open-box", require("./components/openBox.vue").default);
const btn = new Vue({
    el: "#msg-btn",

    created() {

    },

    methods: {

    },
});
const app = new Vue({
    el: "#app",

    created() {

        this.fetchMessages();


        window.Echo.private("chat").listen("MessageSent", (e) => {
            /** console.log(e);
            a = parseInt(document.querySelector('#totalnoticount').innerText);
            //
            console.log("message_count: ", a);
            */
            document.querySelector('#not-play').play();
            this.messages.push({
                message: e.message,
                user: e.user,
            });
            /**
            console.log(this.messages);
            a = a + 1;
            console.log(a);
            document.querySelector('#totalnoticount').innerText = a;
            */
        });

    },

    methods: {
        fetchMessages() {
            axios.get("/messages").then((response) => {
                this.messages = response.data;
            });
        },
        addMessage(message) {
            this.messages.push(message);

            axios.post("/messages", message).then((response) => { });
        },

    },
});

function passToMethod(e) {
    console.log({ root: this, e })
    this.connetedRecruiter({ q: e.detail.value })
}

const app2 = new Vue({
    el: "#app2",
    props: ["route_fetch_indivisual", "route_fetch"],
    mounted: function () {
        let binded = passToMethod.bind(this)
        window.addEventListener('search-chat', binded)
        console.log(this.$props.route_fetch_indivisual);
    },
    beforeDestroy: () => {
        let binded = passToMethod.bind(this)
        window.removeEventListener('search-chat', binded)
    },
    data: {
        messages: [],
        connected: [],
        routeLink: "",
        routeConnected: "",
        routeSend: "",
    },
    created() {
        var params = null;
        this.routeLink = document.querySelector('#app2').dataset.fetchRoute;
        this.routeConnected = document.querySelector('#app2').dataset.connected;
        this.routeSend = document.querySelector('#app2').dataset.send;
        console.log(this.routeConnected);
        this.fetchMessages();
        this.connetedRecruiter(params);
        window.Echo.private("chat").listen("MessageSent", (e) => {
             /**
              * // a = parseInt(document.querySelector('#totalnoticount').innerText);
            // console.log("message_count: ", a);
            this.methods.makeAudioPlay();
            console.log(this.messages);
            a = a + 1;
             console.log(a);
             document.querySelector('#totalnoticount').innerText = a;
            // */
            document.querySelector('#not-play').play();
            this.messages.push(
                e.message,
                // user: e.user,
            );
            this.connetedRecruiter(params);


        });
    },
    methods: {
        fetchMessages() {
            axios.get(`${this.routeLink}`).then((response) => {
                this.messages = response.data;
            });
        },
        addMessage(message) {
            axios.post(`${this.routeSend}`, message).then((response) => { });
            axios.get(`${this.routeLink}`).then((response) => {
                this.messages = response.data;
            });

        },
        connetedRecruiter(parameters) {
            console.log({ parameters })
            axios.get(`${this.routeConnected}`, { params: { ...(parameters ? parameters : {}) } }).then((response) => {
                this.connected = response.data
            });
        },

        makeAudioPlay() {
            var audio = new Audio(
                'https://e-rec.com.au/storage/message-tone.mp3');
            audio.play();
        }
    },
});
function myGlobalFunction(params) {
    // Your function logic here
    // console.log(params);
    return app2.methods.connetedRecruiter(params);
}
console.log("myGlobalFunction is defined:", typeof myGlobalFunction);
