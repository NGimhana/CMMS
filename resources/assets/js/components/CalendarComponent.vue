<template>
    <div style="width: 100%; height: 50%;">
        <div id="calendar"></div>
    </div>
</template>

<script>

export default {

    data() {
        return {
            jobs: [],
        }
    },
    computed:{

    },
    mounted() {
        console.log("Calendar Component Mounted");
        this.fetchData();
    },



    methods: {

        fetchData: function () {
            this.$http.get('http://localhost:8000/api/alljob').then(response => {
                let jobs = (response.body);
                let calenadarEvents = [];

                jobs.forEach(function (value) {
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
                    defaultDate: new Date().toLocaleDateString(),
                    navLinks: true, // can click day/week names to navigate views
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: calenadarEvents,

                    eventClick: function(calEvent, jsEvent, view) {

                        if (confirm("Event: "  + calEvent.title + "Confirm Go to Event")) {
                            window.location.replace("http://localhost:8000/specificjob/"+calEvent.title.split(":")[0]);
                        } else {

                        }
                        // change the border color just for fun
                        $(this).css('background-color', 'red');

                    }
                });

                console.log(calenadarEvents);

            });
        },

    }
};

</script>
