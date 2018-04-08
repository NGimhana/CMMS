<template>

<div>
   <!--Map Model to view the place of the Job-->
        <div id="map" class="ui fullscreen modal">
            <i class="close icon"></i>
            <div id="mapHeader" class="header"></div>
            <div class="content">
                <iframe id="mapFrame" width="100%" height="450" frameborder="0" style="border:0"
                        src=""></iframe>
            </div>

            <div class="actions">
                <div class="ui button">Cancel</div>
                <div class="ui button">OK</div>
            </div>
        </div>


  <table class="ui celled padded table">
    <thead>
      <tr>
        <th class="single line">Priority</th>
        <th>Job ID</th>
        <th>Job Type</th>
        <th>Asset ID/th>
        <th>Description</th>
        <th>Started Date</th>
        <th>Scheduled End Date</th>
        <th>Ended Date</th>
        <th>Created By</th>
        <th>Assigned Person</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
      <tr v-for="job in jobs" :key="job.id">
        <td>
          <h2 class="ui center aligned header">{{job.priority}}</h2>
        </td>
        <td class="single line">
          {{job.id}}
        </td>
        <td>
          <div class="ui star rating" data-rating="3" data-max-rating="3"> {{job.type}}</div>
        </td>
        <td>          
          <button class="ui button " v-on:click="createmap( job.id,job.place)">{{job.place}}</button>
        </td>
        <td>{{job.description}}</td>
        <td>{{job.Started_Date}}</td>
        <td>{{job.Scheduled_End_Date}}</td>
        <td>{{job.Ended_Date}}</td>
        <td>{{job.created_user_id}}</td>
        <td>{{job.Assigned_Person_id}}</td>

        <td>          
          <div class="ui large buttons">
              <button class="ui blue button"><i class="edit icon"></i></button>
              <div class="or"></div>
              <button class="ui negative button"><i class="recycle icon"></i></button>
          </div>                    
        </td>
      </tr>
      

    </tbody>
  </table>

  
  
</div>
</template>

<script>
export default {

  
  props:[
    'header',
    'subheader'   
                           
  ],  
  
  data () {       
    return {
      jobs:[],
    }
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
      this.fetchData();
  },
  methods: {
    toggleSidebar: function() {
      $(".ui.sidebar").sidebar("toggle");
    },
    userMenu: function() {
      $(".ui.dropdown").dropdown();
    },
    fetchData:function(){
        this.$http.get('http://localhost:8000/api/job').then(response => {
          this.jobs=response.body;
          console.log(this.jobs);                    
        }, response => {
                    // error callback
        });             
    },

    //Map of the Selected Place of Job Task
    createmap(jobId, jobPlace) {
    //Model Shows
      $('.fullscreen.modal').modal('show');
      document.getElementById('mapHeader').innerHTML = "Job Task : " + jobId;
      var source = "https://www.google.com/maps/embed/v1/search?q=" + jobPlace + "&key= AIzaSyB4VsPNtqpyTH4kowZeWFM5zONUkili1So";
      document.getElementById('mapFrame').setAttribute("src", source);
    }
    
    
  }
};
</script>
