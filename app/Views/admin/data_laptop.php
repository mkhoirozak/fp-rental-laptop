<?= $this->extend('layout/template'); ?>
<?= $this->section('isi'); ?>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Data Laptop</h3>

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
                        <th>Nama</th>
                        <th style="width: 40%">Deskripsi</th>
                        <th class="text-center">Kategori</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($laptop as $l) {
                        echo "<tr>
                            <td class='text-center'>{$no}</td>
                            <td>{$l["merk"]} {$l["seri"]}</td>
                            <td style=\"width: 40%; word-wrap: break-word; word-break: break-all\">{$l["deskripsi"]}</td>
                            <td class='text-center'>{$l["nama_tipe"]}</td>
                            <td class='text-center'>
                                &nbsp;
                                <a href='".
                                    base_url("admin/laptop/{$l["id_laptop"]}/destroy")
                                ."' class='btn btn-danger btn-xs'>
                                    <i class='fa fa-trash'></i> Hapus
                                </a>
                            </td>
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