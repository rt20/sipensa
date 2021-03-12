<!-- jQuery -->
<script src="{{ asset("/adminlte/plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- Select2 -->
<script src="{{ asset("/adminlte/plugins/select2/js/select2.full.min.js") }}"></script>
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
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2(
            {
            theme: 'bootstrap4', 
            placeholder: 'Pilih Surat Tugas',
            allowClear: true,
            ajax: {
                    url: '/cari',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                        results:  $.map(data, function (item) {
                            return {
                            text: item.no_st,
                            id: item.id
                            }
                        })
                        };
                    },
                    cache: true
                    }
        }
        )
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4', 
            placeholder: 'Pilih Perusahaan',
            allowClear: true,
            ajax: {
                    url: '/cari',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                        results:  $.map(data, function (item) {
                            return {
                            text: item.nama,
                            id: item.id
                            }
                        })
                        };
                    },
                    cache: true
                    }
        })
        $('.select2ref').select2(
            {
            theme: 'bootstrap4', 
            placeholder: 'Pilih Referensi Audit',
            allowClear: true,
        }
        )
        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                        'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format(
                    'MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function (event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function () {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
</script>

<!-- modal di add sarana -->
<script>
    jQuery(document).ready(function ($) {
        $('#mymodal').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
</script>

<div class="modal" id="mymodal" tabindex="-1" role="dialog">
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

<!-- modal di add surat tugas -->
<script>
    jQuery(document).ready(function ($) {
        $('#modalsurat').on('show.bs.modal', function (e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        });
    });
</script>

<div class="modal" id="modalsurat" tabindex="-1" role="dialog">
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