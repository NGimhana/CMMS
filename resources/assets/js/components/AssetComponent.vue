<template>
    <div>



        <div class="ui grid">

            <div class="two wide column ">
                <button class="ui positive button"><i class="plus icon"></i> Add Asset
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
        },
        created() {

        },
        methods: {
            fetchData: function () {
                this.$http.get('http://localhost:8000/api/assets/fullassetdetails').then(response => {
                    let p = response.body;
                    this.assets = p;
                    console.log(this.assets);
                }, response => {

                });
            },

            searchAsset: function () {

                // let assArray =new Array();
                //
                // this.assets.forEach(function (value) {
                //     let assetDescription = JSON.parse(JSON.stringify(value));
                //     let assetObject =
                //         {
                //             "category": assetDescription.BuildDesc ,
                //             "title": assetDescription.description
                //         };
                //
                //     assArray.push(assetObject);
                // });
                //
                // //console.log(assArray);
                //
                //
                // let categoryContent = assArray ;
                //
                // let results ;
                //
                // $('.ui.search')
                //     .search(
                //         {
                //         type: 'category',
                //         source: categoryContent,
                //         fullTextSearch: false,
                //
                //         },
                //         'get result','set value',results
                //     )
                // ;
                //
                // console.log(results)

                this.$http.get('http://localhost:8000/api/assets/fullassetdetails/'+this.searchText).then(response=>{
                    this.assets = response.body;
                },response =>{
                    console.log(response.body);
                })

            },

            searchBuilding:function (buildingid) {

            },
            searchSector:function (sectorid) {
                this.$http.get('http://localhost:8000/api/sector/'+sectorid).then(response=>{
                    this.selectedSector = response.body;
                },response=>{

                });
            },
            searchJobs:function (assetid) {

            },
        }


    }
</script>

<style scoped>

</style>