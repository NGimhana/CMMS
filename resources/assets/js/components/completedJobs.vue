<template>



  <div class="card">          
       
<div class="content">                                         

    <a class="ui large header" htrf="#"><span>Completed Jobs
        <div class="ui large header">{{this.jobCount}}</div>
    </span>        
    </a>                

      <div class="meta">
        <span class="date">Created in Sep 2014</span>
      </div>
    </div>
    <div class="extra content">
      <a>
        <i class="users icon"></i>
        2 Members
      </a>
    </div>
  </div>
  

    


</template>

<script>
export default {
  data() {
    return {
       completedJobs:'',
       jobCount: 0,
    }
  },
  computed:{

  },  
  mounted() {
    this.fetchData();
  },



  methods: {
      fetchData:function(){
          this.$http.get('http://localhost:8000/api/job/completedjobs').then(response =>{
              this.completedJobs = response.body;
              this.jobCount = this.completedJobs.length;
              console.log(this.jobCount);
          },response => {
              console.log(response.body);
          });
      },
  }
};


</script>
