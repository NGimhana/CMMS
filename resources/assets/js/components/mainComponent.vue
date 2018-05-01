<template>


    <div>
        <!-- <router-view></router-view> -->
        <div class="ui top attached  inverted blue menu">
            <a class="item" v-on:click="toggleSidebar">
                <i class="sidebar icon"></i>Menu
            </a>

            <div class="right menu">

                <div class="ui dropdown">

                    <a class="ui right item" v-on:click="userMenu">
                        <form method="post">
                            <i class="user icon"></i>{{username}}
                        </form>
                    </a>

                    <div class="menu" >
                        <!--<form method="POST" action="{{route}}"></form>-->
                        <form class="ui form">
                            <div>
                                <div class="field" style="background-color: #00acc1">
                                    <a class="item"  href="/logout">Sign Out</a>
                                    <a class="item" >Edit Profile</a>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>


                <div class="ui dropdown">

                    <a class="ui right item" v-on:click="userMenu">
                        <i class="bell outline icon"></i>Notifications
                        <div class="ui green label">{{this.unreadNotifications.length}}</div>
                    </a>


                    <div class="menu">
                        <form class="ui form">
                            <div v-for="n in unreadNotifications">
                                <div class="field" v-on:click="markAsRead(n['id'],userid)" style="background-color: #00acc1">
                                    <a class="item">{{n['data']['description']}}</a>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!--</div>-->

                </div>


            </div>

        </div>


        <!--Side Bar-->
        <div class="ui inverted labeled icon left inline vertical sidebar menu uncover">
            <a href="/home" class="item">
                <i class="home icon"></i>Home</a>
            <a href="/job" class="item">
                <i class="wrench icon"></i>Jobs
            </a>
            <a class="item">
                <i class="building icon"></i>Buildings
            </a>
            <a class="item" href="/sector">
                <i class="sitemap icon"></i>Sectors
            </a>
            <a class="item" href="/calendar">
                <i class="calendar alternate icon"></i>Calendar
            </a>
            <a class="item"  href="/asset">
                <i class="smile icon"></i>Assets
            </a>

        </div>

        <div class="pusher">

            <div v-bind:style="divHeaderStyle">
                <h1 class="ui  header">
                    <i class="dashboard icon"></i>
                    <div class="content">{{ header }}
                        <div class="sub header">{{ subheader }}</div>
                    </div>
                </h1>

            </div>


        </div>
    </div>

</template>

<script>
    export default {

        props: {
            username: {
                default: '',
                type: String,
            },
            header: {
                default: '',
                type: String,
            },
            subheader: {
                default: '',
                type: String,
            },
            notifications: {
                default: '',
                type: String,
            },
            userid :{
              default:'',
              type: String,
            },


        },

        data() {
            return {
                unreadNotifications: [],
            };
        },

        components: {},

        computed: {
            divHeaderStyle: function () {
                return {
                    padding: "20px"
                };
            }
        },
        mounted() {
            console.log("Main Component mounted.");
            this.fetchData();
            console.log(this.userid);
            Echo.private('App.User.' + this.userid)
                .notification((notification) => {
                    console.log(notification.type);
                });
        },

        created() {

        },

        methods: {
            toggleSidebar: function () {
                $(".ui.sidebar").sidebar("toggle");
            },
            userMenu: function () {
                $(".ui.dropdown").dropdown();
            },

            fetchData: function () {

                let obj = JSON.parse(this.notifications);

                let unread = [];

                obj.forEach(function (value) {
                    unread.push(value)
                });

                this.unreadNotifications = unread;
                //console.log(this.unreadNotifications);




            },
            markAsRead(id,userid){
              this.$http.get('http://localhost:8000/api/markasread/notification/'+id+'/'+userid).then(response => {
                 console.log("checked");
              },response =>{
                  console.log(response.body);
              });
            },



            // logout(){
            //     this.$http.get('/logout').then(response => {
            //         return this.$http.get('login');
            //     }, response => {
            //         console.log(response.error);
            //     });
            // }
        }
    };
</script>
