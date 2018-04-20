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
                        <input class="prompt" placeholder="Search Assets..." type="text"
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
                    <a class="header">{{asset.description}}</a>
                    <div class="meta">
                        <span class="cinema"></span>
                    </div>
                    <div class="description">
                        <p></p>
                    </div>
                    <div class="extra">
                        <div class="ui label">IMAX</div>
                        <div class="ui label"><i class="globe icon"></i> Additional Languages</div>
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
                this.$http.get('http://localhost:8000/api/assets').then(response => {
                    this.assets = response.data.data;
                }, response => {

                });
            },

            searchAsset: function () {

                let categoryContent = [
                    {category: 'South America', title: 'Brazil'},
                    {category: 'South America', title: 'Peru'},
                    {category: 'North America', title: 'Canada'},
                    {category: 'Asia', title: 'South Korea'},
                    {category: 'Asia', title: 'Japan'},
                    {category: 'Asia', title: 'China'},
                    {category: 'Europe', title: 'Denmark'},
                    {category: 'Europe', title: 'England'},
                    {category: 'Europe', title: 'France'},
                    {category: 'Europe', title: 'Germany'},
                    {category: 'Africa', title: 'Ethiopia'},
                    {category: 'Africa', title: 'Nigeria'},
                    {category: 'Africa', title: 'Zimbabwe'},
                ];

                $('.ui.search')
                    .search({
                        type: 'category',
                        source: categoryContent,
                    })
                ;
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