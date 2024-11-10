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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="../public/assets/js/main.js"></script>

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
    $(document).ready(function() {
        $("#table").DataTable();
    });

    $(document).ready(function() {
        $('.dropme').select2();
    });
</script>
</body>

</html>