<template>

    <div>
        <canvas id="myPieChart"
                style="display: block; width: 770px; height: 385px;"></canvas>
    </div>

</template>

<script>

    export default {

        data() {
            return {
                chartData:[],

            }
        },
        computed: {


        },
        mounted() {
            console.log("Component mounted.");
            this.fetchData();

        },
        methods: {
            createChart: function () {
                //console.log(this.chartData)

            },

            fetchData:function() {
                this.$http.get('http://cotence.000webhostapp.com/api/assets/maintainedmost').then(response => {
                    this.chartData = response.body;

                    //Converts JS Object into JSON String => and then converts it(JSON String) into JS Object
                    let obj = JSON.parse(JSON.stringify(this.chartData));
                    let JobCountArray = new Array();
                    let assetNameArray = new Array();

                    obj.forEach(function(value){
                        JobCountArray.push(value.Job_Count);
                    });

                    obj.forEach(function (value) {
                        assetNameArray.push(value.description);
                    })

                    console.log(JobCountArray);

                    let ctx = document.getElementById("myPieChart");
                    let myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            datasets: [{

                                data: JobCountArray,
                                backgroundColor: [
                                    'rgba(255, 0, 0, 10)',
                                    'rgba(0, 255, 0, 10)',
                                    'rgba(0, 0, 255, 10)',
                                    'rgba(100, 100, 0, 10)',
                                    'rgba(0, 100, 100, 10)',
                                    'rgba(200, 0, 200, 10)',
                                    'rgba(100, 200, 0, 10)',
                                    'rgba(100, 0, 200, 10)',
                                    'rgba(255, 100, 200, 10)',
                                    'rgba(100,100, 100, 10)',
                                ],
                                borderColor: [
                                    'rgba(255,255,255,1)',

                                ],
                                borderWidth: 5
                            }],

                            // These labels appear in the legend and in the tooltips when hovering different arcs
                            labels: assetNameArray,
                        },

                        options: {},

                    });


                }, response => {
                    console.log(response.body);
                });
            }



        },

    };



</script>

