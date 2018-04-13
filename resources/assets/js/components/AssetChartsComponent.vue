<template>

    <div class="ui grid">
        <div class="six wide column">

            <h3>Assets Maintained Mostly</h3>
            <canvas id="myPieChart" width="770" height="385"
                    style="display: block; width: 770px; height: 385px;"></canvas>
        </div>
    </div>

</template>

<script>

    export default {

        data() {
            return {}
        },
        computed: {},
        mounted() {
            console.log("Component mounted.");
            this.createChart();
        },
        methods: {
            createChart: function () {
                var ctx = document.getElementById("myPieChart");
                var myPieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: [10, 20, 30],
                            backgroundColor: [
                                'rgba(255, 0, 0, 10)',
                                'rgba(0, 255, 0, 10)',
                                'rgba(0, 0, 255, 10)'

                            ],
                            borderColor: [
                                'rgba(255,255,255,1)',
                                'rgba(255, 255, 255, 1)',
                                'rgba(255, 255, 255, 1)'
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
        },

    };

</script>

