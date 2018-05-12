<template>

    <div class="ui segment">
        <h4 class="ui header">Job Task </h4>
        <form class="ui form">

            <div class="ui grid">
                <div class="four wide column">

                    <div class="inline fields">
                        <div class="field">
                            <label>Description</label>
                        </div>
                        <div class="field">
                            <label style="color:red">{{this.jobDetail.description}}</label>
                        </div>
                    </div>

                    <div class="inline two fields">
                        <div class="field">
                            <label>Asset</label>
                        </div>
                        <div class="field">
                            <label style="color:red">{{this.asset.description}}</label>
                        </div>
                    </div>

                </div>

                <div class="four wide column">

                    <div class="inline two fields">
                        <div class="field">
                            <label>Created By</label>
                        </div>
                        <div class="field">
                            <label style="color:red">{{this.createduser.name}}</label>
                        </div>
                    </div>

                    <div class="inline two fields">
                        <div class="field">
                            <label>Assigned To</label>
                        </div>
                        <div class="field">
                            <label style="color:red">{{this.assigneduser.name}}</label>
                        </div>
                    </div>

                </div>

                <div class="four wide column">

                    <div class="inline fields">
                        <div class="field">
                            <label>Building</label>
                        </div>
                        <div class="field">
                            <label style="color:red">{{this.building.description}}</label>
                        </div>
                    </div>

                    <div class="inline fields">
                        <div class="field">
                            <label>Sector</label>
                        </div>
                        <div class="field">
                            <label style="color:red">{{this.sector.description}}</label>
                        </div>
                    </div>

                </div>


            </div>


            <button class="ui positive button" type="submit">Complete</button>

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
            getAsset:function(id){
                this.$http.get("http://localhost:8000/api/asset/"+id).then(response=>{
                    this.asset =response.data;
                },response=>{

                })
            },
            getBuilding:function (id) {
                this.$http.get("http://localhost:8000/api/sector/building/"+id).then(response=>{
                    this.building = response.body;
                    console.log(this.building);
                },response=>{
                    console.log(this.response.body);
                });
            },

            getSector:function (id) {
                this.$http.get("http://localhost:8000/api/sector/"+id).then(response=>{
                    this.sector = response.body;
                    console.log(this.sector);
                },response=>{
                    console.log(this.response);
                });
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
            }
        }
    }
</script>

<style scoped>

</style>