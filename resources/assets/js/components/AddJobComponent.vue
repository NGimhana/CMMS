<template>

    <div>
        <button class="ui positive button" v-on:click="createJobModel"><i class="plus icon"></i> Create Immediate Job
        </button>

        <button class="ui positive button" v-on:click="createScheduledJobModel"><i class="plus icon"></i> Create
            Scheduled Job
        </button>




        <!--Add Job To Database-->
        <div class="ui large modal">
            <div class="header">Create Immediate Job Task</div>
            <div class="content">

                <form class="ui form">


                    <div class="field" v-if="errors.length">
                        <div class="ui visible error message" >
                            <i class="close icon"></i>
                            <div class="header">
                                There were some errors with your submission
                            </div>
                            <ul class="list">
                                <li v-for="error in errors">{{ error }}</li>
                            </ul>
                        </div>
                    </div>



                    <div class="field">
                        <label>Type</label>
                        <input name="type" v-model="type" placeholder="Type" type="text">
                    </div>

                    <div class="field">
                        <label>Asset</label>
                        <select v-model="selectedAsset">
                            <option v-for="asset in assets" v-bind:value="asset.id">{{asset.description}}</option>
                        </select>

                    </div>
                    <div class="field">
                        <label>Description</label>
                        <textarea name="des" v-model="description" value="Describe The Issue"></textarea>
                    </div>
                    <div class="field">
                        <label>Job Started Date</label>
                        <input name="starteddate" v-model="starteddate" type="date">
                    </div>
                    <div class="field">
                        <label>Job Scheduled End Date</label>
                        <input name="scheduled_end_date" v-model="scheduled_end_date" type="date">
                    </div>
                    <div class="field">
                        <label>Assigned Person</label>
                        <select v-model="assignedPerson">
                            <option v-for="person in persons" v-bind:value="person.id">{{person.name +" : "+
                                person.email}}
                            </option>
                        </select>

                    </div>


                </form>


            </div>
            <div class="actions">
                <button class="ui button" v-on:click="AddJob" type="submit">Submit</button>
                <div class="ui cancel button">Cancel</div>
            </div>

        </div>

        <div class="ui small modal">
            <div class="header">Create Scheduled Job Task</div>
            <div class="content">

                <form class="ui form">
                    <div class="field">
                        <label>Type</label>
                        <input name="type" v-model="type" placeholder="Type" type="text">
                    </div>

                    <div class="field">
                        <label>Asset</label>
                        <select v-model="selectedAsset">
                            <option v-for="asset in assets" v-bind:value="asset.id">{{asset.description}}</option>
                        </select>

                    </div>
                    <div class="field">
                        <label>Description</label>
                        <textarea v-model="description" value="Describe The Issue"></textarea>
                    </div>

                    <div class="field">
                        <label>Job Scheduled Date</label>
                        <input name="scheduled_date" v-model="scheduled_date" type="date">
                    </div>

                    <div class="field">
                        <label>END Year</label>
                        <select v-model="End_Year">
                            <option>2018</option>
                            <option>2019</option>
                            <option>2020</option>
                            <option>2021</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Frequency(Months)</label>
                        <select v-model="frequency">
                            <option>1</option>
                            <option>3</option>
                            <option>6</option>
                            <option>12</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Assigned Person</label>
                        <select v-model="assignedPerson">
                            <option v-for="person in persons" v-bind:value="person.id">{{person.name +" : "+
                                person.email}}
                            </option>
                        </select>
                    </div>




                </form>


            </div>
            <div class="actions">
                <button class="ui button" v-on:click="AddScheduledJob" type="submit">Submit</button>
                <div class="ui cancel button">Cancel</div>
            </div>
        </div>


    </div>


</template>


<script>
    export default {

        props: {
            user: {
                default: '',
                type: String,
            }
        },

        data() {
            return {
                //userId: '',
                subheader: 'System',
                type: "",
                asset_id: "",
                description: "",
                priority: "Immediate",
                starteddate: "",
                scheduled_end_date: "",
                assignedPerson: "",
                persons: '',

                frequency:'',
                End_Year:'',
                scheduled_date:'',
                schpriority:"Scheduled",
                Ended_Date:'',

                originalEnd_Date:'',
                dd: '',
                mm: '',
                yyyy: '',

                errors:[],

                assets: '',
                selectedAsset: '',
            };
        },


        computed: {
            divHeaderStyle: function () {
                return {
                    padding: "20px"
                };
            }
        },
        mounted() {
            console.log("Component mounted.");
            console.log(this.userId);

        },
        created() {
            this.getAssets();
            this.getUsers();
        },
        methods: {
            toggleSidebar: function () {
                $(".ui.sidebar").sidebar("toggle");
            },
            userMenu: function () {
                $(".ui.dropdown").dropdown();
            },
            createJobModel: function () {
                $('.ui.large.modal').modal('show');
                console.log("clicked");
            },
            createScheduledJobModel: function () {
                 $('.ui.small.modal').modal('show');
                console.log("clicked Sheduled");
            },
            AddJob: function () {

                this.checkForm()
                //Add Immediate Job Task
                this.$http.post('http://localhost:8000/api/job',
                    {
                        type: this.type,
                        asset_id: this.selectedAsset,
                        description: this.description,
                        priority: this.priority,
                        scheduled_end_date: this.scheduled_end_date,
                        assigned_person: this.assignedPerson,
                        starteddate: this.starteddate,
                        created_user_id: this.user,
                    }
                ).then(response => {
                    console.log(response.body);
                    let storedImmediateJob = JSON.parse(JSON.stringify(response.body));

                    //Add Calendar Event Immediate Job
                    this.$http.post('http://localhost:8000/api/calendar',
                        {
                            job_id: storedImmediateJob.id,
                            scheduled_job_id: null,
                        }
                    ).then(response => {
                        console.log(response.body);
                    }, response => {

                    });


                    //this.$router.go("http://localhost:8000/job");
                    //Page Reloads
                    location.reload();
                }, response => {
                    console.log(this.user);
                    console.log(response)
                });


            },

            AddScheduledJob:function () {
                this.calculateScheduleJobEndDate(this.scheduled_date,this.frequency);
                this.$http.post('http://localhost:8000/api/scheduledjob',
                    {
                        type: this.type,
                        asset_id: this.selectedAsset,
                        description: this.description,
                        priority: this.schpriority,
                        Scheduled_Date: this.scheduled_date,
                        End_Year:this.End_Year,
                        frequency:this.frequency,
                        Ended_Date:this.Ended_Date,
                        created_user_id: this.user,
                        assigned_person: this.assignedPerson,
                    }
                ).then(response=>{
                    console.log(response.body);
                    location.reload();
                },response =>{
                    console.log(response.body);
                });

            },
            calculateScheduleJobEndDate:function(scheduledate,frequency){
                var date = new Date(scheduledate);
                this.originalEnd_Date = new Date(date.setMonth(date.getMonth() + parseInt(frequency)));
                this.dd = this.originalEnd_Date.getDate();
                this.mm = this.originalEnd_Date.getMonth() + 1;
                this.yyyy = this.originalEnd_Date.getFullYear();
                this.Ended_Date = this.yyyy + "-" + this.mm +"-" +this.dd ;
                console.log(this.Ended_Date);
            },

            getAssets() {
                this.$http.get('http://localhost:8000/api/assets').then(response => {
                    this.assets = response.body;
                }, response => {

                });
            },

            getUsers() {
                this.$http.get('http://localhost:8000/api/users').then(response => {
                    this.persons = response.body;
                }, response => {

                });
            },

            checkForm:function() {
                this.errors = [];
                if(!this.description) this.errors.push("Description required.");
                if(!this.type) this.errors.push("Type required.");
                if(!this.selectedAsset) this.errors.push("Asset required.");
                if(!this.scheduled_end_date) this.errors.push("Scheduled End Date Required");
                if(!this.assignedPerson) this.errors.push("Assigned Required");
                if(!this.starteddate) this.errors.push("Started Date Required");
                if(!this.errors.length) return true;
            },

        }
    };
</script>

