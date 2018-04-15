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
                chartData:new Array(),
                jobCountArray:[],
            }
        },
        computed: {},
        mounted() {
            console.log("Component mounted.");
            console.log(this.jobCountArray);
            this.createChart();

        },
        methods: {
            createChart: function () {
                console.log(this.chartData)

                this.chartData = this.fetchChartData();

                console.log(this.chartData);

                var ctx = document.getElementById("myPieChart");
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{

                            data: this.chartData,
                            backgroundColor: [
                                'rgba(255, 0, 0, 10)'


                            ],
                            borderColor: [
                                'rgba(255,255,255,1)',

                            ],
                            borderWidth: 5
                        }],

                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: [
                            'Red',
                            'Green',
                            'Blue'
                        ]
                    },

                    options: {},
                });
            },

            fetchChartData:function () {

              this.$http.get('http://localhost:8000/api/assets/maintainedmost').then(response => {
                  this.chartData = response.body ;

                  //Converts JS Object into JSON String => and then converts it(JSON String) into JS Object
                  this.chartData = JSON.parse(JSON.stringify(this.chartData));


                  // obj.forEach(function(value){
                  //     this.jobCountArray.push(value.Job_Count);
                  // });

                 this.jobCountArray[0]=1;
                  //console.log(this.jobCountArray) ;
                  //console.log(this.chartData)

              },response => {
                 console.log(response.body);
              });
            },


        },

    };



</script>

