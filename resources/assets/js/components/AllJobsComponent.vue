<template>

    <div>

        <div class="ui tiny job modal">
            <div class="ui icon header">
                <i class="archive icon"></i>
                Remove Job Task
            </div>

            <div class="content">
                <p>You are going to Remove a Maintenance Job Task. Notifications and other features will be removed permanently and This action will not be revert back !!</p>
                <h3 style="color: red">Are you Sure to Remove Job <span><strong>{{this.selectedJob.id}}</strong></span> Completely from System ?</h3>
            </div>

            <div class="actions">
                <div class="ui green  cancel inverted button">
                    <i class="remove icon"></i>
                    No
                </div>
                <div class="ui red ok inverted button" v-on:click="deleteJobTask()">
                    <i class="checkmark icon"></i>
                    Yes
                </div>
            </div>
        </div>

        <div class="ui grid">

            <div class="ten wide column">


                <table id ="table" class="ui celled selectable padded table">
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
                                <a class="ui red button" v-on:click="JobModelShow" ><i class="recycle icon"></i></a>
                            </div>
                        </td>
                    </tr>


                    </tbody>

                    <tfoot>
                    <tr><th colspan="6">
                        <div class="ui right floated pagination menu">
                            <a class="icon item"  v-on:click="fetchPaginateUsers(pagination.prev_page_url)">
                                <i class="left chevron icon"></i>
                            </a>
                            <!--<a class="item">1</a>-->
                            <!--<a class="item">2</a>-->
                            <!--<a class="item">3</a>-->
                            <!--<a class="item">4</a>-->
                            <span>Page {{pagination.current_page}} of {{pagination.last_page}}</span>
                            <a class="icon item"  v-on:click="fetchPaginateUsers(pagination.next_page_url)">
                                <i class="right chevron icon"></i>
                            </a>
                        </div>
                    </th>
                    </tr>
                    </tfoot>

                </table>

            </div>

            <div class="six wide column">

                <div class="ui styled accordion">

                    <div v-on:click="drop" class="active title">
                        <i class="dropdown icon"></i>

                        Summary On Job ID : {{this.selectedJob.id}}
                        <br><br>
                        <a class="ui green image label">
                            Status
                            <div v-bind:class="[this.isCompleted ? 'green detail' : 'orange detail']">
                                {{this.status}}
                            </div>
                            <div v-bind:class="[this.isOverdue ? 'red detail' : 'red detail']">
                                {{this.overDueStatus}}
                            </div>
                        </a>

                    </div>

                    <div class="active content">
                        <form class="ui form">
                            <div style="padding-left: 7px; padding-bottom: 3px">
                                <div v-show="!this.isCompleted" class="ui  green button " v-on:click="completeJobTask()"><i class="checkmark icon"></i>COMPLETE</div>
                            </div>
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

                            <!--Created Person Info-->
                            <div class="inline fields">
                                <div class="field">
                                    <p>Created By</p>
                                </div>
                                <div class="field">
                                    <p>{{this.createdUser.name + " : "+this.createdUser.email}}</p>
                                </div>
                            </div>

                            <!--Assigned Person Info-->
                            <div class="inline fields">
                                <div class="field">
                                    <p>Assigned To</p>
                                </div>
                                <div class="field">
                                    <p>{{this.assignedPerson.name+" : "+this.assignedPerson.email}}</p>
                                </div>
                            </div>

                        </form>
                    </div>


                    <div v-on:click="drop" class="title">
                        <i class="dropdown icon"></i>
                        Building : {{this.selectedBuilding.description}}
                    </div>
                    <div class="content">
                        <iframe id="mapFrame" width="100%" height="450" frameborder="0" style="border:0"
                                v-bind:src=" this.source "></iframe>
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
                selectedAsset: '',
                selectedBuilding: '',
                selectedSector: '',
                createdUser:'',
                assignedPerson:'',

                status: '',
                overDueStatus: '',

                today: '',
                dd: '',
                mm: '',
                yyyy: '',

                //Map Source
                source:'',

                isCompleted: true,
                isOverdue: '',


                url:'http://localhost:8000/api/job',
                current_page :'',
                last_page: '',
                next_page_url:'',
                prev_page_url:'',
                pagination:[],

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
            JobModelShow: function () {
                $('.tiny.job.modal').modal('show');
                console.log("clicked");
            },
            getToday: function () {
                this.today = new Date();
                this.dd = this.today.getDate();
                this.mm = this.today.getMonth() + 1;
                this.yyyy = this.today.getFullYear();

                if (this.dd < 10) {
                    this.dd = '0' + this.dd;
                }

                if (this.mm < 10) {
                    this.mm = '0' + this.mm;
                }

                this.today = this.yyyy + "-" + this.mm + '-' + this.dd;
            },
            checkStatus: function () {
                if (this.selectedJob.Ended_Date !== null) {

                    if (this.selectedJob.Scheduled_End_Date >= this.selectedJob.Ended_Date) {

                        this.status = "COMPLETED";
                        this.overDueStatus = "";
                        this.isCompleted = true;
                        this.isOverdue = false;

                    } else {
                        this.status = "COMPLETED";
                        this.overDueStatus = "OVERDUE";
                        this.isCompleted = true;
                        this.isOverdue = false;
                    }
                } else {

                    this.getToday();

                    if (this.selectedJob.Scheduled_End_Date > this.today) {

                        this.status = "ON GOING";
                        this.overDueStatus = "";
                        this.isCompleted = false;
                        this.isOverdue = false;

                    } else {

                        this.status = "ON GOING";
                        this.overDueStatus = "OVERDUE";
                        this.isCompleted = false;
                        this.isOverdue = true;
                    }
                }
            },

            getSeleselectedJob: function (job) {
                this.selectedJob = job;
                this.checkStatus();

                this.$http.get('http://localhost:8000/api/asset/' + this.selectedJob.asset_id).then(response => {
                    this.selectedAsset = response.body;

                    this.$http.get('http://localhost:8000/api/sector/building/' + this.selectedAsset.sector_id).then(response => {
                        this.selectedBuilding = response.body;

                        //Create Map
                        this.createmap(this.selectedBuilding.description);

                        this.$http.get('http://localhost:8000/api/sector/' + this.selectedAsset.sector_id).then(response => {
                            this.selectedSector = response.body;

                            this.$http.get('http://localhost:8000/api/user/'+this.selectedJob.created_user_id).then(response => {
                                this.createdUser = response.body;

                                this.$http.get('http://localhost:8000/api/user/'+this.selectedJob.Assigned_Person_id).then(response => {
                                    this.assignedPerson = response.body;

                                },response =>{

                                });

                            },response =>{

                            });

                        }, response => {

                        });
                    }, response => {
                        //console.log(response.body);
                    });
                }, response => {

                });
            },

            fetchData: function () {

                this.$http.get(this.url).then(response => {
                    this.jobs = response.data.data;
                    console.log(this.jobs);
                    this.makePagination(response.data);
                }, response => {
                    // error callback
                });
            },

            //Map of the Selected Place of Job Task
            createmap(jobPlace) {
                this.source = "https://www.google.com/maps/embed/v1/search?q="+jobPlace+"&key=AIzaSyBOGCtQ84xGgjZaBiZ48ruA9B3g7AiT0Xg";
                document.getElementById('mapFrame').setAttribute("src", this.source);
            },

            deleteJobTask :function () {
                this.$http.delete('http://localhost:8000/api/job/'+this.selectedJob.id).then(response => {
                   //this.$router.go("http://localhost:8000/job");
                    location.reload();
                   console.log(response.body);

                },response => {

                });
                console.log("Delete Clicked")
            },

            completeJobTask: function () {
              this.getToday();
              this.$http.put('http://localhost:8000/api/job/'+this.selectedJob.id ,
                  {

                      type:this.selectedJob.type,
                      asset_id:this.selectedJob.asset_id,
                      description:this.selectedJob.description,
                      priority:this.selectedJob.priority,
                      scheduled_end_date:this.selectedJob.Scheduled_End_Date,
                      assigned_person:this.selectedJob.Assigned_Person_id,
                      starteddate:this.selectedJob.Started_Date,
                      created_user_id:this.selectedJob.created_user_id,
                      Ended_Date:this.today
                  }

              ).then(response => {
                  console.log(response.body);
                  location.reload();
                  //this.$router.go("http://localhost:8000/job");
              },response => {

              });
            },
            makePagination:function (response) {
                let paginateVar = {
                    current_page :response.meta.current_page,
                    last_page: response.meta.last_page,
                    next_page_url:response.links.next,
                    prev_page_url:response.links.prev,
                }

                let a =JSON.parse(JSON.stringify(paginateVar));

                this.pagination = a;

            },
            fetchPaginateUsers:function (url) {
                this.url= url;
                this.fetchData( );
            },
        }
    };
</script>
