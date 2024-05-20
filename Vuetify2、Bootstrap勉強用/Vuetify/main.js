const routes = [
    { path: '/', component: httpVueLoader('./単一ファイルコンポーネント/page1.vue') },
    { path: '/page2', component: httpVueLoader('./単一ファイルコンポーネント/page2.vue') },
    { path: '/page3', component: httpVueLoader('./単一ファイルコンポーネント/page3.vue') },
    { path: '/page4', component: httpVueLoader('./単一ファイルコンポーネント/page4.vue') },
    { path: '/page5', component: httpVueLoader('./単一ファイルコンポーネント/page5.vue') },
    { path: '/page6', component: httpVueLoader('./単一ファイルコンポーネント/page6.vue') },
]

const router = new VueRouter({
    routes
})

new Vue({
    el: '#app',
    router: router,
    vuetify: new Vuetify(),
    data() {
        return {
            drawer: null,
            com_name: "",
            supports: [
                { name: 'Consulting and suppourt', icon: 'mdi-vuetify' },
                { name: 'Discord community', icon: 'mdi-discord' },
                { name: 'Report a bug', icon: 'mdi-bug' },
                { name: 'Github issue board', icon: 'mdi-github' },
                { name: 'Stack overview', icon: 'mdi-stack-overflow' },
            ],
            nav_lists: [
                { name: 'Getting Started', route: '/' },
                { name: 'Customization', route: '/page2' },
                { name: 'Styles & animations', route: '/page3' },
                { name: 'UI Components', route: '/page4' },
                { name: 'Directives', route: '/page5' },
                { name: 'Preminum themes', route: '/page6' },
            ]
        };
    }
});
