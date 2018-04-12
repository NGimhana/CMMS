<template>

    <div>
        <!--&lt;!&ndash;Map Model to view the place of the Job&ndash;&gt;-->
        <!--<div id="map" class="ui fullscreen modal">-->
        <!--<i class="close icon"></i>-->
        <!--<div id="mapHeader" class="header"></div>-->
        <!--<div class="content">-->
        <!--<iframe id="mapFrame" width="100%" height="450" frameborder="0" style="border:0"-->
        <!--src=""></iframe>-->
        <!--</div>-->

        <!--<div class="actions">-->
        <!--<div class="ui button">Cancel</div>-->
        <!--<div class="ui button">OK</div>-->
        <!--</div>-->
        <!--</div>-->


        <div class="ui grid">

            <div class="ten wide column">


                <table class="ui celled selectable padded table">
                    <thead>
                    <tr>
                        <th class="single line">Priority</th>
                        <!--<th>Job ID</th>-->
                        <th>Job Type</th>
                        <!--<th>Asset ID</th>-->
                        <th>Description</th>
                        <th>Started Date</th>
                        <th>Scheduled End Date</th>
                        <!--<th>Ended Date</th>-->
                        <!--<th>Created By</th>-->
                        <!--<th>Assigned Person</th>-->
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="job in jobs" :key="job.id"
                        v-on:click="getSeleselectedJob(job) ">
                        <td>
                            <h2 class="ui center aligned header">{{job.priority}}</h2>
                        </td>
                        <!--<td class="single line">-->
                        <!--{{job.id}}-->
                        <!--</td>-->
                        <td>
                            <div class="ui star rating" data-rating="3" data-max-rating="3"> {{job.type}}</div>
                        </td>
                        <!--<td>-->
                        <!--<button class="ui button " v-on:click="createmap( job.id,job.place)">{{job.place}}</button>-->
                        <!--</td>-->
                        <td>{{job.description}}</td>
                        <td>{{job.Started_Date}}</td>
                        <td>{{job.Scheduled_End_Date}}</td>
                        <!--<td>{{job.Ended_Date}}</td>-->
                        <!--<td>{{job.created_user_id}}</td>-->
                        <!--<td>{{job.Assigned_Person_id}}</td>-->

                        <td>
                            <div class="ui large buttons">
                                <a class="ui blue button"><i class="edit icon"></i></a>
                                <div class="or"></div>
                                <a class="ui red button"><i class="recycle icon"></i></a>
                            </div>
                        </td>
                    </tr>


                    </tbody>
                </table>

            </div>

            <div class="six wide column">

                <div class="ui styled accordion">

                    <div v-on:click="drop" class="active title">
                        <i class="dropdown icon"></i>

                        Summary On Job ID: {{this.selectedJob.id}}
                        <a class= "ui green image label">
                            Status
                            <div class="detail">{{this.status}}</div>
                            <div class="red detail ">fuck</div>
                        </a>

                    </div>
                    <div class="active content">
                        <form class="ui form">

                            <!--Asset Info-->
                            <div class="inline fields">
                                <div class="field">
                                    <p>Asset</p>
                                </div>
                                <div class="field">
                                    <p>{{this.selectedAsset.description}}</p>
                                </div>
                            </div>

                            <!--Building Info-->
                            <div class="inline fields">
                                <div class="field">
                                    <p>Building</p>
                                </div>
                                <div class="field">
                                    <p>{{this.selectedBuilding.description}}</p>
                                </div>
                            </div>

                            <!--Sector Info-->
                            <div class="inline fields">
                                <div class="field">
                                    <p>Sector</p>
                                </div>
                                <div class="field">
                                    <p>{{this.selectedSector.description}}</p>
                                </div>
                            </div>


                        </form>




                    </div>

                </div>

            </div>

        </div>


    </div>
</template>

<script>
    export default {


        props: [
            'header',
            'subheader'

        ],

        data() {
            return {
                jobs: [],
                selectedJob: '',
                selectedAsset:'',
                selectedBuilding:'',
                selectedSector:'',

                status:'',
                today:'',
                isCompleted:'',
                isOverdue:'',

            }
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
            console.log("Component mounted.");
        },
        created() {
            this.fetchData();
        },
        methods: {
            toggleSidebar: function () {
                $(".ui.sidebar").sidebar("toggle");
            },
            userMenu: function () {
                $(".ui.dropdown").dropdown();
            },
            drop: function () {
                $('.ui.accordion')
                    .accordion()
                ;
            },
            checkStatus:function() {
                if(this.selectedJob.Ended_Date !== null){
                    this.today = new Date(Date.now()).toLocaleString();
                    if(this.selectedJob.Scheduled_End_Date <= this.selectedJob.Ended_Date){
                        this.status = "COMPLETED";
                        this.isCompleted = true;
                        this.isOverdue = false;
                    }else{
                        this.status = "COMPLETED - OVERDUE";
                        this.isCompleted = true;
                        this.isOverdue =true;

                    }
                }else{
                    this.today = new Date(Date.now()).toLocaleString();
                    if(this.selectedJob.Scheduled_End_Date >= this.today){
                        this.status = "ON GOING";
                        this.isCompleted = false;
                        this.isOverdue = false;
                    }else{
                        this.status = "ONGOING - OVERDUE";
                        this.isCompleted = false;
                        this.isOverdue = true;
                    }
                }
            },

            getSeleselectedJob: function (job) {
                this.selectedJob = job;
                this.checkStatus();

                this.$http.get('http://localhost:8000/api/asset/'+ this.selectedJob.asset_id).then(response => {
                    this.selectedAsset = response.body;

                    this.$http.get('http://localhost:8000/api/sector/building/'+this.selectedAsset.sector_id).then(response => {
                        this.selectedBuilding = response.body;

                        this.$http.get('http://localhost:8000/api/sector/'+this.selectedAsset.sector_id).then(response =>{
                           this.selectedSector = response.body;


                        },response =>{

                        });
                    }, response => {
                        //console.log(response.body);
                    });
                }, response => {

                });
            },

            fetchData: function () {
                this.$http.get('http://localhost:8000/api/job').then(response => {
                    this.jobs = response.body;
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
