<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">

                                <li class="breadcrumb-item active">Calendar</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Calendar</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-2">
                                    <!-- <button class="btn btn-lg font-16 btn-primary w-100" id="btn-new-event"><i
													class="mdi mdi-plus-circle-outline"></i> Create New Event</button> -->

                                    <div id="external-events">
                                        <br>
                                        <p class="text-muted">Reminder Category
                                        </p>
                                        <div class="external-event bg-success" data-class="bg-success">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Customer
                                        </div>
                                        <div class="external-event bg-info" data-class="bg-info">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Property
                                        </div>
                                        <div class="external-event bg-warning" data-class="bg-warning">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Channel Partner
                                        </div>
                                        <div class="external-event bg-danger" data-class="bg-danger">
                                            <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Lead
                                        </div>
                                    </div>




                                </div> <!-- end col-->

                                <div class="col-lg-10">
                                    <div id="calendar"></div>
                                </div> <!-- end col -->

                            </div> <!-- end row -->
                        </div> <!-- end card body-->
                    </div> <!-- end card -->

                    <!-- Add New Event MODAL -->
                    <div class="modal fade" id="event-modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5 class="modal-title" id="modal-title">Customer</h5>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                        <div class="row">
                                            <div class="">
                                                <h4 class="font-13 text-muted text-uppercase">Reminder Type</h4>
                                                <p class="mb-3" id="remider_type"></p>

                                                <h4 class="font-13 text-muted text-uppercase mb-1">Date and time :</h4>
                                                <p class="mb-3" id="date-time"></p>

                                                <h4 class="font-13 text-muted text-uppercase mb-1">Priority :</h4>
                                                <p class="mb-3" id="priority"></p>

                                                <!-- <h4 class="font-13 text-muted text-uppercase mb-1">Model :</h4>
                                                <p class="mb-3" id="model_id"></p> -->


                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6 col-4">
                                                    <!-- <button type="button" class="btn btn-danger"
															id="btn-delete-event">Delete</button> -->
                                                </div>
                                                <div class="col-md-6 col-8 text-end">
                                                    <!-- <button type="button" class="btn btn-light me-1"
															data-bs-dismiss="modal">Close</button> -->
                                                    <!-- <button type="button" class="btn btn-danger waves-effect waves-light mb-2" data-bs-toggle="modal" data-bs-target="#property-reminders-modal">Add Reminder</button> -->
                                                    <!-- <?php if (isset($_GET['customer_id'])) { ?>
                                                        <a href="<?= base_url('admin/customermaster/' . $_GET['page'] . '/' . $_GET['model_id'] . '#customer-reminders') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back to Customer Reminder</a>
                                                        <?php } elseif (isset($_GET['agent_id'])) { ?>
                                                        <a href="<?= base_url('admin/agentmaster/' . $_GET['page'] . '/' . $_GET['agent_id'] . '#agent-reminders') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back to Channel Partner</a>
                                                        <?php } elseif (isset($_GET['agent_id'])) { ?>
                                                        <a href="<?= base_url('admin/leadmaster/' . $_GET['page'] . '/' . $_GET['lead_id'] . '#reminders') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back to Channel Partner</a>
                                                        <?php } elseif (!isset($_GET['customer_id']) && !isset($_GET['agent_id'])) { ?>
                                                        <a href="<?= base_url('admin/Propertymaster') ?>" class="btn btn-primary waves-effect waves-light mb-2">Back to Property</a>
                                                        <?php } ?>         -->
                                                    <!-- <button type="submit" class="btn btn-success" id="btn-save-event">View</button> -->


                                                    <button type="button" class="btn btn-success" id="btn-save-event" data-modal-id="" data-modal-type="" onclick="redirectToReminderList(this)">View Details</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div>
                    <!-- end modal-->
                </div>
                <!-- end col-12 -->
            </div> <!-- end row -->

        </div> <!-- container -->

    </div> <!-- content -->
</div>
<script>
    ! function(l) {
        "use strict";

        function e() {
            this.$body = l("body"), this.$modal = l("#event-modal"), this.$calendar = l("#calendar"), this.$formEvent = l("#form-event"), this.$btnNewEvent = l("#btn-new-event"), this.$btnDeleteEvent = l("#btn-delete-event"), this.$btnSaveEvent = l("#btn-save-event"), this.$modalTitle = l("#modal-title"), this.$calendarObj = null, this.$selectedEvent = null, this.$newEventData = null
        }
        e.prototype.onEventClick = function(e) {
            var eventObj = e.event;
            var year = eventObj.start.toLocaleString("default", {
                year: "numeric"
            });
            var month = eventObj.start.toLocaleString("default", {
                month: "2-digit"
            });
            var day = eventObj.start.toLocaleString("default", {
                day: "2-digit"
            });
            var formated_startdate = day + '-' + month + '-' + year;
            var time = eventObj.start.toLocaleString("default", {
                hour: "numeric",
                minute: "numeric",
                hour12: true
            });
            var formated_startdatetime = day + '-' + month + '-' + year + ' ' + time;
            this.$formEvent[0].reset(), this.$formEvent.removeClass("was-validated"), this.$newEventData = null, this.$btnDeleteEvent.show(), this.$modalTitle.text(e.event.extendedProps.type + " Reminder Details"), this.$modal.show(), this.$selectedEvent = e.event, l("#remider_type").html(this.$selectedEvent.title), l("#date-time").html(formated_startdatetime), l("#priority").html(this.$selectedEvent.extendedProps.priority), l("#btn-save-event").attr("data-modal-id", this.$selectedEvent.extendedProps.model_id), l("#btn-save-event").attr("data-modal-type", this.$selectedEvent.extendedProps.type)
        }, e.prototype.onSelect = function(e) {
            this.$formEvent[0].reset(), this.$formEvent.removeClass("was-validated"), this.$selectedEvent = null, this.$newEventData = e, this.$btnDeleteEvent.hide(), this.$modalTitle.text("Add New Event"), this.$modal.show(), this.$calendarObj.unselect()
        }, e.prototype.init = function() {
            this.$modal = new bootstrap.Modal(document.getElementById("event-modal"), {
                keyboard: !1
            });
            var e = new Date(l.now());
            // new FullCalendar.Draggable(document.getElementById("external-events"), {
            //     itemSelector: ".external-event",
            //     eventData: function(e) {
            //         return {
            //             title: e.innerText,
            //             className: l(e).data("class")
            //         }
            //     }
            // });
            // var t = [{
            //         title: "Meeting with Mr. Shreyu",
            //         start: new Date(l.now() + 158e6),
            //         end: new Date(l.now() + 338e6),
            //         className: "bg-warning"
            //     }, {
            //         title: "Interview - Backend Engineer",
            //         start: e,
            //         end: e,
            //         className: "bg-success"
            //     }, {
            //         title: "Phone Screen - Frontend Engineer",
            //         start: new Date(l.now() + 168e6),
            //         className: "bg-info"
            //     }, {
            //         title: "Buy Design Assets",
            //         start: new Date(l.now() + 338e6),
            //         end: new Date(l.now() + 4056e5),
            //         className: "bg-primary"
            //     }];
            var a = this;
            a.$calendarObj = new FullCalendar.Calendar(a.$calendar[0], {
                slotDuration: "00:15:00",
                slotMinTime: "08:00:00",
                slotMaxTime: "19:00:00",
                themeSystem: "bootstrap",
                bootstrapFontAwesome: !1,
                buttonText: {
                    today: "Today",
                    month: "Month",
                    week: "Week",
                    day: "Day",
                    list: "List",
                    prev: "Prev",
                    next: "Next"
                },
                initialView: "dayGridMonth",
                handleWindowResize: !0,
                height: l(window).height() - 200,
                headerToolbar: {
                    left: "prev,next today",
                    center: "title",
                    right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth"
                },
                events: {
                    url: encodeURI('<?= base_url('admin/calendar/getAllCalenderEvents') ?>'),
                    type: 'POST'
                },
                editable: 0,
                droppable: 0,
                selectable: !0,
                dateClick: function(e) {
                    // a.onSelect(e) //on blank date click
                },
                eventClick: function(e) {
                    a.onEventClick(e)
                }
            }), a.$calendarObj.render(), a.$btnNewEvent.on("click", function(e) {
                a.onSelect({
                    date: new Date,
                    allDay: !0
                })
            }), a.$formEvent.on("submit", function(e) {
                e.preventDefault();
                var t, n = a.$formEvent[0];
                n.checkValidity() ? (a.$selectedEvent ? (a.$selectedEvent.setProp("title", l("#event-title").val()), a.$selectedEvent.setProp("classNames", [l("#event-category").val()])) : (t = {
                    title: l("#event-title").val(),
                    start: a.$newEventData.date,
                    allDay: a.$newEventData.allDay,
                    className: l("#event-category").val()
                }, a.$calendarObj.addEvent(t)), a.$modal.hide()) : (e.stopPropagation(), n.classList.add("was-validated"))
            }), l(a.$btnDeleteEvent.on("click", function(e) {
                a.$selectedEvent && (a.$selectedEvent.remove(), a.$selectedEvent = null, a.$modal.hide())
            }))
        }, l.CalendarApp = new e, l.CalendarApp.Constructor = e
    }(window.jQuery),
    function() {
        "use strict";
        window.jQuery.CalendarApp.init()
    }();
</script>


<script>
//Calendar popup View button redirection
    function redirectToReminderList(data) {
        //    debugger;
        //    console.log(data);
        if (data.dataset.modalType == 'Customer') {
            window.location.href = '<?= base_url() ?>admin/customermaster/customerDetails/' + data.dataset.modalId;
        } else if (data.dataset.modalType == 'Property') {
            window.location.href = '<?= base_url() ?>admin/Propertymaster/propertyDetails/' + data.dataset.modalId;
        } else if (data.dataset.modalType == 'Channel Partner') {
            window.location.href = '<?= base_url() ?>admin/agentmaster/agentDetails/' + data.dataset.modalId;
        } else if (data.dataset.modalType == 'Lead') {
            window.location.href = '<?= base_url() ?>admin/Leadmaster/leadDetails/' + data.dataset.modalId;
        }
    }
</script>