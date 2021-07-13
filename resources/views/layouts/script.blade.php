<!-- jQuery -->
<script src="{{ asset("/adminlte/plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("adminlte/plugins/select2/js/select2.full.min.js") }}"></script>
<!-- jQuery UI -->
<script src="{{ asset("/adminlte/plugins/jquery-ui/jquery-ui.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/adminlte/js/adminlte.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("/adminlte/js/demo.js") }}"></script>
<!-- fullCalendar 2.2.5 -->
<script src="{{ asset("/adminlte/plugins/moment/moment.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar/main.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar-daygrid/main.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar-timegrid/main.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar-interaction/main.min.js") }}"></script>
<script src="{{ asset("/adminlte/plugins/fullcalendar-bootstrap/main.min.js") }}"></script>
<!-- Page specific script -->
<script src="{{ asset("/adminlte/js/calendar.js") }}"></script>
<!-- <script src="{{ asset("/adminlte/js/calendar.js") }}"></script> -->

<!-- Page script -->


<!-- modal di add sarana -->
<!-- <script>
    jQuery(document).ready(function ($) {
        $('#mymodal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
</script> -->




<!-- modal di refer audit -->
<script>
    jQuery(document).ready(function ($) {
        $('#modalref').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
</script>

<div class="modal" id="modalref" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title"></h5>
            </div>
            <div class="modal-body">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
    </div>
</div>
