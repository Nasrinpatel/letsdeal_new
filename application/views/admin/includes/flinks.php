<!-- Vendor js -->
<script src="<?= base_url('assets/') ?>js/vendor.min.js"></script>

<!-- Plugins js-->
<script src="<?= base_url('assets/') ?>libs/flatpickr/flatpickr.min.js"></script>
<script src="<?= base_url('assets/') ?>libs/apexcharts/apexcharts.min.js"></script>

<script src="<?= base_url('assets/') ?>libs/selectize/js/standalone/selectize.min.js"></script>

<!-- Dashboar 1 init js-->
<script src="<?= base_url('assets/') ?>js/pages/dashboard-1.init.js"></script>

<script src="<?= base_url('assets/') ?>js/jquery.bootstrap.wizard.min.js"></script>

<!-- Init js-->
<script src="<?= base_url('assets/') ?>js/form-wizard.init.js"></script>

<!-- App js-->
<script src="<?= base_url('assets/') ?>js/app.min.js"></script>

<script src="<?= base_url('assets/') ?>js/select2.min.js"></script>

<script src="<?= base_url('assets/') ?>js/select2.full.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/fileinput.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/selectize.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/') ?>js/switchery.min.js"></script>
<!-- Calendar -->
<script type="text/javascript" src="<?= base_url('assets/') ?>libs/fullcalendar/main.min.js"></script>
<!-- <script type="text/javascript" src="<?= base_url('assets/') ?>js/pages/calendar.init.js"></script> -->
<script>
	$('.select2').select2();
	$('.select2').select2({
		theme: 'bootstrap-5'
		// dropdownParent: $('#state-modal'),
	});
	// $('#city-modal').select2({
	// 	theme:'bootstrap-5'
	// 	// dropdownParent: $('#state-modal'),
	// }); you
	$(document).ready(function() {
		$(document).on('click', ".delete-btn", function(e) {
			e.preventDefault();
			var url = e.currentTarget.getAttribute('href');
			Swal.fire({
				title: 'Are sure?',
				text: "You won't be able to revert this!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes, delete it!'
			}).then((response) => {
				if (response.isConfirmed) {
					window.location.href = url;
				}
			})
		});
	});
</script>
<script>
	! function(l) {
		"use strict";

		function e() {
			this.$body = l("body"), this.$modal = l("#event-modal"), this.$calendar = l("#calendar"), this.$formEvent = l("#form-event"), this.$btnNewEvent = l("#btn-new-event"), this.$btnDeleteEvent = l("#btn-delete-event"), this.$btnSaveEvent = l("#btn-save-event"), this.$modalTitle = l("#modal-title"), this.$calendarObj = null, this.$selectedEvent = null, this.$newEventData = null
		}
		e.prototype.onEventClick = function(e) {
			this.$formEvent[0].reset(), this.$formEvent.removeClass("was-validated"), this.$newEventData = null, this.$btnDeleteEvent.show(), this.$modalTitle.text("Edit Event"), this.$modal.show(), this.$selectedEvent = e.event, l("#event-title").val(this.$selectedEvent.title), l("#event-category").val(this.$selectedEvent.classNames[0])
		}, e.prototype.onSelect = function(e) {
			this.$formEvent[0].reset(), this.$formEvent.removeClass("was-validated"), this.$selectedEvent = null, this.$newEventData = e, this.$btnDeleteEvent.hide(), this.$modalTitle.text("Add New Event"), this.$modal.show(), this.$calendarObj.unselect()
		}, e.prototype.init = function() {
			this.$modal = new bootstrap.Modal(document.getElementById("event-modal"), {
				keyboard: !1
			});
			var e = new Date(l.now());
			new FullCalendar.Draggable(document.getElementById("external-events"), {
				itemSelector: ".external-event",
				eventData: function(e) {
					return {
						title: e.innerText,
						className: l(e).data("class")
					}
				}
			});
			var t = [{
					title: "Meeting with Mr. Shreyu",
					start: new Date(l.now() + 158e6),
					end: new Date(l.now() + 338e6),
					className: "bg-warning"
				}, {
					title: "Interview - Backend Engineer",
					start: e,
					end: e,
					className: "bg-success"
				}, {
					title: "Phone Screen - Frontend Engineer",
					start: new Date(l.now() + 168e6),
					className: "bg-info"
				}, {
					title: "Buy Design Assets",
					start: new Date(l.now() + 338e6),
					end: new Date(l.now() + 4056e5),
					className: "bg-primary"
				}],
				a = this;
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
				initialEvents: t,
				editable: !0,
				droppable: !0,
				selectable: !0,
				dateClick: function(e) {
					a.onSelect(e)
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