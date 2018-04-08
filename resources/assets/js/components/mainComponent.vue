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
                
                <div class="menu">
                    <!--<form method="POST" action="{{route}}"></form>-->
                    <a class="item" href="/logout">Sign Out</a>
                    <a class="item">Edit Profile</a>                                             
                </div>       
                
            </div>
            <!-- <a class="ui right item">            
                <i class="user icon"></i>User              
            </a> -->         
            <a class="ui right item">            
                <i class="bell outline icon"></i>Notifiacation                           
            </a> 
        </div>   
        
    </div>
    
        <!--Side Bar-->
        <div class="ui inverted labeled icon left inline vertical sidebar menu uncover">
            <a href="/" class="item">
                <i class="home icon"></i>Home</a>
            <a href="/job" class="item">                                
                <i class="wrench icon"></i>Jobs                
            </a>
            <a class="item">
                <i class="building icon"></i>Buildings
            </a>
            <a class="item">
                <i class="sitemap icon"></i>Sectors
            </a>
            <a class="item" href="/calendar">
                <i class="calendar alternate icon"></i>Calendar
            </a>
            <a class="item">
                <i class="smile icon"></i>Resources
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

    <!-- <div v-bind:style="divHeaderStyle"> -->
        
        <!-- <div class="ui raised compact segment">
            <p>Pellentesque hs mi vitae est. Mauris placerat eleifend leo.</p>
        </div> -->

        <!-- <div class="ui four doubling special cards">
            <ongoingjobs-component></ongoingjobs-component>    
            <completedjobs-component></completedjobs-component>
            <incompletejobs-component></incompletejobs-component>
            <recentjobs-component></recentjobs-component>
        </div> -->
        
    <!-- </div>             -->

  </div>
 </div>

</template>

<script>
export default {

  props: {
      username:{
          default:'',
          type:String,
      },
      header:{
          default:'',
          type:String,
      },
      subheader :{
          default:'',
          type:String,
      }
  },
    
  data() {
    return {
    };
  },

  components: {},

  computed: {
    divHeaderStyle: function() {
      return {
        padding: "20px"
      };
    }
  },
  mounted() {
    console.log("Component mounted.");    
  },
  created(){
      
  },
  methods: {
    toggleSidebar: function() {
      $(".ui.sidebar").sidebar("toggle");
    },
    userMenu: function() {
      $(".ui.dropdown").dropdown();
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
