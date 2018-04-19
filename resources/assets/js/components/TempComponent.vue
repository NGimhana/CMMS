<template>
    <div>

        <div class="ui pointing secondary demo menu">
            <a class="active item" data-tab="first">Immediate Jobs</a>
            <a class=" item" data-tab="second">Scheduled Jobs</a>
        </div>

        <div class="ui active tab" data-tab="first">
            <alljobs-component></alljobs-component>
        </div>

        <div class="ui tab" data-tab="second">
            <allschedulejobs-component></allschedulejobs-component>
        </div>


        <!--<div class="ui shape">-->
        <!--<div class="sides">-->
        <!--<div class="active side">-->
        <!--<allschedulejobs-component></allschedulejobs-component>-->
        <!--</div>-->
        <!--<div class="side">-->
        <!--<alljobs-component></alljobs-component>-->
        <!--</div>-->
        <!--</div>-->
        <!--</div>-->
    </div>
</template>

<script>
    export default {

        data() {
            return {};
        },
        mounted() {
            $(document).ready(function () {
                $('.demo.menu .item').tab({history: false});
            });
        },
        methods: {


            showTab: function () {

            },

        },

    }
</script>

<style scoped>

</style>