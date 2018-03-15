<template>

<div>
  <button class="ui positive button" v-on:click="createJobModel"><i class="plus icon"></i> Create Job</button>  
 

  <!--Add Job To Database-->
  <div class="ui large modal">
  <div class="header">Create Job Task</div>
  <div class="content">
    
    <form class="ui form">
  <div class="field">
    <label>Type</label>
    <input name="first-name" v-model="type" placeholder="Type" type="text">
  </div>
  <div class="field">
    <label>Place</label>
    <input name="last-name" v-model="place" placeholder="Place" type="text">
  </div>
  <div class="field">
    <label>Sector</label>
    <input name="last-name" v-model="sector" placeholder="Sector" type="text">
  </div>
  <div class="field">
    <label>Description</label>
    <textarea v-model="description" value="Describe The Issue" ></textarea>
  </div>
  <div class="field">
    <label>Priority</label>
    <input name="last-name" v-model="priority" placeholder="Priority" type="text">
  </div>
  <div class="field">
    <label>Job Sheduled Date</label>
    <input name="scheduledate" v-model="scheduledate" placeholder="now()" type="date">
  </div>
  
</form>


  </div>
  <div class="actions">
    <button class="ui button" v-on:click="AddJob" type="submit">Submit</button>    
    <div class="ui cancel button">Cancel</div>
  </div>
</div>




</div>


</template>


<script>
export default {

  props:{
      header:{
          type:String
      },
                           
  },  
  data() {
    return {
      subheader:'System',
      type:"",
      place:"",
      sector:"",
      description:"",
      priority:"",
      scheduledate:"",
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
    createJobModel:function(){
      $('.ui.large.modal').modal('show');
      console.log("clicked");
    },
    AddJob:function() {
      this.$http.post('http://cmms.com/api/job', 
      {                  
          type:this.type,
          place:this.place,
          sector:this.sector,
          description:this.description,
          priority:this.priority,
          scheduledate:this.scheduledate

      }
      
      ).then(response => {        
        console.log(response.body)
        this.$router.go("http://cmms.com/job");
        }, response => {
         console.log(response)
      });
      
    },
    
  }
};
</script>

