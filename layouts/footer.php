<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2014-2023 <a href="https://adminlte.io">NEW PRODI</a>.</strong> All rights
    reserved.
</footer>
</div>
</body>
<script>
    $(function() {
        $('#tabel').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
        $('#tabel2').DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': false
        })
    })
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    })
    $('#datepicker_stok').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    })

    function dp_edit(id_barang_in) {
        $('#tgl' + id_barang_in).datepicker({
            format: 'yyyy-mm-dd',
            todayHighlight: true,
            autoclose: true,
            language: "id",
            locale: "id",
        });
    }
</script>

</html>