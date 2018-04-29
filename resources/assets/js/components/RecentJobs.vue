<template>



  <div class="card">          
       
<div class="content">                                         

    <a class="ui large header" htrf="#"><span> Recent Jobs
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
        jobCount:0,
        recentJobs:'',
    }
  },
  computed:{
      
  },  
  mounted() {
    console.log("Component mounted.");
    this.fetchData();
  },
  methods: {
      fetchData:function(){
          this.$http.get('http://cmms.com/api/jobs/recentjobs').then(response =>{
              this.recentJobs = response.body;
              this.jobCount = this.recentJobs.length;
              console.log(this.jobCount);
          },response => {
              console.log(response.body);
          });
      },
  },
};


</script>
