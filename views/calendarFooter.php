</div>
</div>
</div>
</div>
</div>
</div>
<script src="../public/assets/js/core/popper.min.js"></script>
<script src="../public/assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../public/assets/vendors/chart.js/Chart.min.js"></script>
<script src="../public/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
<script src="../public/assets/vendors/progressbar.js/progressbar.min.js"></script>
<script src="../public/assets/js/off-canvas.js"></script>
<script src="../public/assets/js/hoverable-collapse.js"></script>
<script src="../public/assets/js/template.js"></script>
<script src="../public/assets/js/settings.js"></script>
<script src="../public/assets/js/todolist.js"></script>
<script src="../public/assets/js/jquery.cookie.js" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
<script src="../public/assets/js/sweetalert2.min.js"></script>
<script src="../public/assets/js/dashboard.js"></script>
<script src="../public/assets/js/datatables.js"></script>
<script src="../public/assets/js/datatables.min.js"></script>
<script src="../public/assets/js/Chart.roundedBarCharts.js"></script>
<script src="../public/assets/js/main.js"></script>
<script src="../public/assets/fullcalendar/lib/jquery.min.js"></script>
<script src="../public/assets/fullcalendar/lib/moment.min.js"></script>
<script src="../public/assets/fullcalendar/fullcalendar.min.js"></script>
<script src="../public/assets/fullcalendar/calendar_config.js"></script>

<?php if ($flash = getFlash('success')) : ?>
    <script>
        Swal.fire({
            icon: 'success',
            title: "<?php echo $flash; ?>",
            showConfirmButton: true,
        });
    </script>
<?php endif; ?>

<?php if ($flash = getFlash('failed')) : ?>
    <script>
        Swal.fire({
            icon: 'warning',
            title: "<?php echo $flash; ?>",
            showConfirmButton: true,
        });
    </script>
<?php endif; ?>

<script>
    $(document).ready(function() {
        $("#tables").DataTable();
    });
</script>
</body>

</html>