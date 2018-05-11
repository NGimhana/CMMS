<template>

    <div class="ui fluid card">
        <div class="content">
            <div class="header">Job Task</div>
        </div>
        <div class="content">
            <h4 class="ui sub header">Initial Detail</h4>
            <div class="ui small feed">
                <div class="event">
                    <div class="content">
                        <div class="summary">
                            <a>{{$data['job']['created_user_id']}}</a> added <a></a> to the project
                        </div>
                    </div>
                </div>
                <div class="event">
                    <div class="content">
                        <div class="summary">
                            <a>Stevie Feliciano</a> was added as an <a>Administrator</a>
                        </div>
                    </div>
                </div>
                <div class="event">
                    <div class="content">
                        <div class="summary">
                            <a>Helen Troy</a> added two pictures
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="extra content">
            <button class="ui button">Join Project</button>
        </div>
    </div>

</template>

<script>
    export default {
        name: "immediate_-job_-detail",
        props: {
            jobDetails: {
                default: '',
                type: String,
            },
        },

        data() {
            return {
                unreadNotifications: [],
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
            console.log(this.jobDetails);
        },


        methods: {}
    }
</script>

<style scoped>

</style>