<template>



  <div class="card">          
       
<div class="content">                                         

    <a class="ui large header" htrf="#"><span>Over-Due Jobs
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
  

    
<!-- </div> -->

</template>

<script>
export default {
  data() {
    return {
       overdueJobs:'',
       jobCount:0,
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
          this.$http.get('http://localhost:8000/api/jobs/overduejobs').then(response =>{
              this.overdueJobs = response.body;
              this.jobCount = this.overdueJobs.length;
              console.log(this.jobCount);
          },response => {
              console.log(response.body);
          });
      },
  }
};


</script>
