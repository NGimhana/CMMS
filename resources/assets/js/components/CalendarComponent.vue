<template>
    <div style="width: 700px; height: 400px;">
        <div id="calendar"></div>

    </div>

</template>

<script>

export default {

    data() {
        return {

            allCalendarEvents: [],
            jobs: [],
            selectedJob:'',
        }
    },
    computed:{

    },
    mounted() {
        console.log("Calendar Component Mounted");
        this.fetchData();
    },



    methods: {
        showCalendar:function () {

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'listDay,listWeek,month'
                },

                // customize the button names,
                // otherwise they'd all just say "list"
                views: {
                    listDay: { buttonText: 'list day' },
                    listWeek: { buttonText: 'list week' }
                },

                defaultView: 'listWeek',
                defaultDate: '2018-03-12',
                navLinks: true, // can click day/week names to navigate views
                editable: true,
                eventLimit: true, // allow "more" link when too many events
                // events: [
                //     {
                //         title: 'All Day Event',
                //         start: '2018-03-01'
                //     },
                //     {
                //         title: 'Long Event',
                //         start: '2018-03-07',
                //         end: '2018-03-10'
                //     },
                //     {
                //         id: 999,
                //         title: 'Repeating Event',
                //         start: '2018-03-09T16:00:00'
                //     },
                //     {
                //         id: 999,
                //         title: 'Repeating Event',
                //         start: '2018-03-16T16:00:00'
                //     },
                //     {
                //         title: 'Conference',
                //         start: '2018-03-11',
                //         end: '2018-03-13'
                //     },
                //     {
                //         title: 'Meeting',
                //         start: '2018-03-12T10:30:00',
                //         end: '2018-03-12T12:30:00'
                //     },
                //     {
                //         title: 'Lunch',
                //         start: '2018-03-12T12:00:00'
                //     },
                //     {
                //         title: 'Meeting',
                //         start: '2018-03-12T14:30:00'
                //     },
                //     {
                //         title: 'Happy Hour',
                //         start: '2018-03-12T17:30:00'
                //     },
                //     {
                //         title: 'Dinner',
                //         start: '2018-03-12T20:00:00'
                //     },
                //     {
                //         title: 'Birthday Party',
                //         start: '2018-03-13T07:00:00'
                //     },
                //     {
                //         title: 'Click for Google',
                //         url: 'http://google.com/',
                //         start: '2018-03-28'
                //     }
                // ]
                events: this.allCalendarEvents,
            });

        },

        loadAllJob: function () {
            // this.$http.get('http://localhost:8000/api/calendars').then(response=>{
            //     let obj = JSON.parse(JSON.stringify(response.body));
            //     let immediatejobs = [];
            //
            //     obj.forEach(function(value){
            //         immediatejobs.push(value.job_id);
            //     });
            //
            //     this.jobID = immediatejobs;
            //     console.log(this.jobID);
            // },response=>{
            //
            // });


        },

        fetchData: function () {
            this.$http.get('http://localhost:8000/api/job').then(response => {
                this.jobs = (response.body);

                let calenadarEvents = [];

                this.jobs.forEach(function (value) {
                    let jobTask = JSON.parse(JSON.stringify(value));
                    let caledarEvent =
                        {
                            "title": jobTask.id + " : " + jobTask.description,
                            "start": jobTask.Started_Date,
                            "end": jobTask.Scheduled_End_Date
                        };
                    calenadarEvents.push(caledarEvent);
                });


                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'listDay,listWeek,month'
                    },

                    // customize the button names,
                    // otherwise they'd all just say "list"
                    views: {
                        listDay: {buttonText: 'list day'},
                        listWeek: {buttonText: 'list week'}
                    },

                    defaultView: 'listWeek',
                    defaultDate: '2018-03-12',
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: calenadarEvents,

                });


                console.log(calenadarEvents);

            });
        },

        getImmediateJobDetails:function (id) {
            this.$http.get('http://localhost:8000/api/job/'+id).then(response => {
                this.selectedJob = JSON.parse(JSON.stringify(response.body));
            },response => {

            });
        },


    }
};

</script>
