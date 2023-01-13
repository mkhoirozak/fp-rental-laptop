<?= $this->extend('layout/template'); ?>
<?= $this->section('isi'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data Transaksi</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool hidden" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-customer" id="table-customer">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Laptop</th>
                        <th class="text-center">Jumlah Pinjam</th>
                        <th class="text-center">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($transaksi as $t) {
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no++ ?></td>
                            <td class="text-center"><?php echo $t["laptop"]?></td>
                            <td class="text-center"><?php echo $t["jumlah_pinjam"]?></td>
                            <td class="text-right"><?php echo number_format($t["total_harga"], 0, "", ".") ?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->
<?= $this->endsection('isi'); ?>