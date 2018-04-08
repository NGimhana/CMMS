<template>

    <div>
        <button class="ui positive button" v-on:click="createJobModel"><i class="plus icon"></i> Create Immediate Job
        </button>


        <!--Add Job To Database-->
        <div class="ui large modal">
            <div class="header">Create Immediate Job Task</div>
            <div class="content">

                <form class="ui form">
                    <div class="field">
                        <label>Type</label>
                        <input name="type" v-model="type" placeholder="Type" type="text">
                    </div>
                    <div class="field">
                        <label>Asset ID</label>
                        <input name="asset_ID" v-model="asset_id" placeholder="Asset_ID" type="text">
                    </div>
                    <div class="field">
                        <label>Description</label>
                        <textarea v-model="description" value="Describe The Issue"></textarea>
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
                        <input name="assigned_person" v-model="assigned_person" type="text">
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

        props: {
            user: {
                default: '',
                type:String,
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
                assigned_person: "",
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
            AddJob: function () {

                //Add Job Task
                this.$http.post('http://localhost:8000/api/job',
                {
                    type:this.type,
                    asset_id:this.asset_id,
                    description:this.description,
                    priority:this.priority,
                    scheduled_end_date:this.scheduled_end_date,
                    assigned_person:this.assigned_person,
                    starteddate:this.starteddate,
                    created_user_id:this.user,
                }

                ).then(response => {
                  console.log(response.body)
                  this.$router.go("http://localhost:8000/job");
                  }, response => {
                   console.log(this.user);
                   console.log(response)
                });

                // //Add Calendar Event
                // this.$http.post('http://cmms.com/api/calendar',
                //     {
                //         starteddate: this.scheduledate,
                //         enddate: this.enddate,
                //         frequency: this.frequency
                //
                //     }
                // ).then(response => {
                //     console.log(response.body)
                //     this.$router.go("http://cmms.com/job");
                // }, response => {
                //     console.log(response)
                // });
            },

        }
    };
</script>

