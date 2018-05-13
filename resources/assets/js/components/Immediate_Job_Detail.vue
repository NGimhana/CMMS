<template>

    <div class="ui segment">
        <h3 class="ui header">Job Task : <span>{{this.jobDetail.id}}</span></h3>

        <a class="ui green image label">
            Status
            <div v-bind:class="[this.isCompleted ? 'green detail' : 'orange detail']">
                {{this.status}}
            </div>
            <div v-bind:class="[this.isOverdue ? 'red detail' : 'red detail']">
                {{this.overDueStatus}}
            </div>

        </a>

        <br>
        <br>
        <div style="padding-left: 7px; padding-bottom: 3px">
            <div v-show="!this.isCompleted" class="ui  green button " v-on:click="completeJobTask()"><i class="checkmark icon"></i>COMPLETE</div>
        </div>

        <br>
        <br>
        <form class="ui form">

            <div class="ui grid">
                <div class="six wide column">

                    <div class="inline two fields">
                        <div class="field">
                            <label>Description</label>
                        </div>
                        <div class="field">
                            <p style="color:red"> {{this.jobDetail.description}} </p>
                        </div>
                    </div>

                    <div class="inline two fields">
                        <div class="field">
                            <label>Asset</label>
                        </div>
                        <div class="field">
                            <p style="color:red">{{this.asset.description}}</p>
                        </div>
                    </div>

                    <div class="inline two fields">
                        <div class="field">
                            <label>Building</label>
                        </div>
                        <div class="field">
                            <p style="color:red">{{this.building.description}}</p>
                        </div>
                    </div>

                    <div class="inline two fields">
                        <div class="field">
                            <label>Sector</label>
                        </div>
                        <div class="field">
                            <p style="color:red">{{this.sector.description}}</p>
                        </div>
                    </div>

                    <div class="inline two fields">
                        <div class="field">
                            <label>Scheduled End Date</label>
                        </div>
                        <div class="field">
                            <p style="color:red">{{this.jobDetail.Scheduled_End_Date}}</p>
                        </div>
                    </div>

                    <div class="inline two fields">
                        <div class="field">
                            <label>End Date</label>
                        </div>
                        <div class="field">
                            <p style="color:red">{{this.jobDetail.Ended_Date}}</p>
                        </div>
                    </div>

                </div>

                <div class="four wide column">

                    <div class="inline two fields">
                        <div class="field">
                            <label>Created By</label>
                        </div>
                        <div class="field">
                            <p style="color:red">{{this.createduser.name}}</p>
                        </div>
                    </div>

                    <div class="inline two fields">
                        <div class="field">
                            <label>Assigned To</label>
                        </div>
                        <div class="field">
                            <p style="color:red">{{this.assigneduser.name}}</p>
                        </div>
                    </div>

                </div>

                <div class="six wide column">
                    <div class="content">
                        <iframe id="mapFrame" width="100%" height="450" frameborder="0" style="border:0"
                                v-bind:src=" this.source "></iframe>
                    </div>

                </div>


            </div>


        </form>

    </div>






</template>

<script>
    export default {

        props: {
            jobdetails: {
                default: '',
                type: String,
            },
        },

        data() {
            return {
                unreadNotifications: [],
                jobDetail :'',
                createduser:'',
                assigneduser:'',
                asset:'',
                building:'',
                sector:'',

                status: '',
                overDueStatus: '',

                today: '',
                dd: '',
                mm: '',
                yyyy: '',

                source:'',

                isCompleted: true,
                isOverdue: '',

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
            console.log("Immediate Job mounted.");
            this.jobDetail = JSON.parse(this.jobdetails);

            this.getCreatedUser(this.jobDetail.created_user_id);
            this.getAssignedUser(this.jobDetail.Assigned_Person_id);
            this.fetchData(this.jobDetail.asset_id);
            this.checkStatus();
            //Create Map
            this.createmap(this.building.description);
        },


        methods: {

            getCreatedUser:function (id) {
              this.$http.get("http://localhost:8000/api/user/"+id).then(response=>{
                  this.createduser = response.data;
              },response=>{

              });
            },

            getAssignedUser:function (id) {
                this.$http.get("http://localhost:8000/api/user/"+id).then(response=>{
                    this.assigneduser = response.data;

                },response =>{

                });
            },

            //Map of the Selected Place of Job Task
            createmap(jobPlace) {
                this.source = "https://www.google.com/maps/embed/v1/search?q="+jobPlace+"&key=AIzaSyBOGCtQ84xGgjZaBiZ48ruA9B3g7AiT0Xg";
                document.getElementById('mapFrame').setAttribute("src", this.source);
            },

            fetchData:function(id){
                this.$http.get("http://localhost:8000/api/asset/"+id).then(response=>{
                    this.asset =response.data;

                    this.$http.get("http://localhost:8000/api/sector/building/"+this.asset.sector_id).then(response=>{
                        this.building = response.body;
                        console.log(this.building);

                        this.$http.get("http://localhost:8000/api/sector/"+this.asset.sector_id).then(response=>{
                            this.sector = response.body;
                            console.log(this.sector);

                        },response=>{
                            console.log(this.response);
                        });

                    },response=>{
                        console.log(this.response.body);
                    });

                },response=>{

                })
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
                if (this.jobDetail.Ended_Date !== null) {

                    if (this.jobDetail.Scheduled_End_Date >= this.jobDetail.Ended_Date) {

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

                    if (this.jobDetail.Scheduled_End_Date > this.today) {

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
            completeJobTask: function () {
                this.getToday();
                this.$http.put('http://localhost:8000/api/job/'+this.jobDetail.id ,
                    {

                        type:this.jobDetail.type,
                        asset_id:this.jobDetail.asset_id,
                        description:this.jobDetail.description,
                        priority:this.jobDetail.priority,
                        scheduled_end_date:this.jobDetail.Scheduled_End_Date,
                        assigned_person:this.jobDetail.Assigned_Person_id,
                        starteddate:this.jobDetail.Started_Date,
                        created_user_id:this.jobDetail.created_user_id,
                        Ended_Date:this.today
                    }

                ).then(response => {
                    console.log(response.body);
                    location.reload();
                    //this.$router.go("http://localhost:8000/job");
                },response => {

                });
            },
        }
    }
</script>

<style scoped>

</style>