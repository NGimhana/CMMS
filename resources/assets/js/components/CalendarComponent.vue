<template>
    <div id="calendar"></div> 
</template>

<script>
export default {
  data() {
    return {
       $events:[],
    }
  },
  computed:{
      
  },  
  mounted() {
    console.log("Component mounted.");
       
  },

  created:{
    fetchData(); 
  } , 
  methods: {
   fetchData:function(){
        this.$http.get('http://cmms.com/api/calendar').then(response => {
          this.events=response.body;          
          console.log(this.events);                                           
        }, response => {
            console.log(error);
            
        });             
    },
                        
  }
};