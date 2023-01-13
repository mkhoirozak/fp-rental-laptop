<?= $this->extend('layout/template'); ?>
<?= $this->section('isi'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data Customer</h3>

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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($customer as $c) {
                        echo "<tr>
                            <td class='text-center'>{$no}</td>
                            <td>{$c["nama"]}</td>
                            <td>{$c["email"]}</td>
                            <td class='text-center'>{$c["kelamin"]}</td>
                        </tr>";
                        $no++;
                    }?>
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