<template>
    <div>
        <!--Add Asset To Database-->
        <div class="ui mini modal">
            <div class="header">Add Asset</div>
            <div class="content">

                <form class="ui form">

                    <div class="field">
                        <label>Building</label>
                        <select v-model="selectedBuilding">
                            <option v-on:click="searchSector(building.id)" v-for="building in buildings" v-bind:value="building.id">{{building.id}} : {{building.description}}</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Sector</label>
                        <select>
                            <option v-on:click="setSelectedSector(sector)" v-for="sector in sectors" v-bind:value="sector.id">{{sector.sectorId}} : {{sector.description}}</option>
                        </select>
                    </div>

                    <div class="field">
                        <label>Description</label>
                        <textarea v-model="description" value="Describe The Asset"></textarea>
                    </div>

                    <div class="field">
                        <label>Asset Image</label>
                        <input type="file" v-on:change="onFileChange" class="form-control">
                    </div>

                </form>


            </div>
            <div class="actions">
                <button class="ui button" v-on:click="AddAsset" type="submit">Submit</button>
                <div class="ui cancel button">Cancel</div>
            </div>

        </div>



        <div class="ui grid">

            <div class="two wide column ">
                <button class="ui positive button" v-on:click="createModel"><i class="plus icon"></i> Add Asset
                </button>
            </div>


            <div class="two wide colum">
                <br>
                <div class="ui search">
                    <div class="ui icon input">
                        <input class="prompt" v-model="searchText" placeholder="Search Assets..." type="text"
                               v-on:keyup="searchAsset">
                        <i class="search icon"></i>
                    </div>
                    <div class="results"></div>
                </div>
            </div>

        </div>





        <div class="ui divided items">
            <div class="item" v-for="asset in assets">
                <div class="image">
                    <img src="/images/wireframe/image.png">
                </div>

                <div class="content">
                    <a class="header">{{asset.id}} : {{asset.description}}</a>
                    <div class="meta">
                        <span class="cinema">Sector Details : {{asset.SecDesc}}</span>
                    </div>
                    <div class="description">
                        <p></p>
                    </div>
                    <div class="extra">
                        <div class="ui label">{{asset.SecDesc}}</div>
                        <div class="ui label"><i class="globe icon"></i> <span>Building Description : {{asset.BuildDesc}}</span></div>
                    </div>
                    <div class="extra">
                        <div class="ui right floated primary button">
                            Edit Asset
                            <i class="right chevron icon"></i>
                        </div>
                        <div class="ui right red floated button">Remove Asset
                            <i class="right recycle icon"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>





    </div>
</template>

<script>
    export default {

        name: "asset-component",

        props: [],

        data() {
            return {
                assets: [],
                selectedSector:'',
                searchText:'',

                selectedBuilding:'',
                buildings:'',
                sectors:'',
                description:'',

                image:'',

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
            this.fetchData();
            this.fetchBuildings();


        },
        created() {

        },
        methods: {
            createModel: function () {
                $('.ui.mini.modal').modal('show');
                console.log("clicked Sheduled");
            },
            fetchData: function () {
                this.$http.get('http://localhost:8000/api/assets/fullassetdetails').then(response => {
                    let p = response.body;
                    this.assets = p;
                    console.log(this.assets);
                }, response => {

                });
            },

            onFileChange(e) {
                let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file)

                console.log(vm.image);
            },

            searchAsset: function () {

                this.$http.get('http://localhost:8000/api/assets/fullassetdetails/'+this.searchText).then(response=>{
                    this.assets = response.body;
                },response =>{
                    console.log(response.body);
                })

            },
            setSelectedSector :function(sector){
              this.selectedSector = JSON.parse(JSON.stringify(sector)) ;
              console.log(this.selectedSector);
            },

            fetchBuildings:function () {
                this.$http.get('http://localhost:8000/api/buildings').then(response=>{
                   this.buildings = response.body;
                },response =>{

                });
            },

            searchBuilding:function (buildingid) {

            },
            searchSector:function (buildingid) {
                this.$http.get('http://localhost:8000/api/building/sector/'+buildingid).then(response=>{
                    this.sectors = response.body;
                    console.log(this.sectors);
                },response=>{

                });
            },
            searchJobs:function (assetid) {

            },

            AddAsset:function () {
                console.log(this.selectedSector);
                console.log(this.selectedBuilding);
                this.$http.post('http://localhost:8000/api/asset',
                    {
                        description: this.description,
                        sector_id: this.selectedSector.sectorId,
                        image:this.image,
                    }
                ).then(response=>{
                    console.log(response.body);
                    location.reload();
                },response=>{
                    console.log(response.body);
                });
            },
        }


    }
</script>

<style scoped>

</style>