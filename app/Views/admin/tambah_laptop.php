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
        <div class="form-horizontal">
            <div class="form-group">
                <label class="control-label">
                    Tipe
                </label>
                <select name="nama_tipe" id="nama_tipe" class="form-control nama_tipe" required>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Gaming">Gaming</option>
                    <option value="Multimedia">Multimedia</option>
                    <option value="Ultrabook">Ultrabook</option>
                </select>
            </div>
            <div class="form-group">
                <label class="control-label">Merk</label>
                <input type="text" class="form-control merk" id="merk" name="merk" placeholder="Merk" required>
            </div>
            <div class="form-group">
                <label class="control-label">Seri</label>
                <input type="text" class="form-control seri" id="seri" name="seri" placeholder="Seri" required>
            </div>
            <div class="form-group">
                <label class="control-label">Processor</label>
                <input type="text" class="form-control processor" id="processor" name="processor" placeholder="Processor" required>
            </div>
            <div class="form-group">
                <label class="control-label">Ram</label>
                <input type="text" class="form-control ram" id="ram" name="ram" placeholder="Ram" required>
            </div>
            <div class="form-group">
                <label class="control-label">Penyimpan</label>
                <input type="text" class="form-control penyimpanan" id="penyimpanan" name="penyimpanan" placeholder="Penyimpanan" required>
            </div>
            <div class="form-group">
                <label class="control-label">Layar</label>
                <input type="text" class="form-control layar" id="layar" name="layar" placeholder="Layar" required>
            </div>
            <div class="form-group">
                <label class="control-label">VGA</label>
                <input type="text" class="form-control vga" id="vga" name="vga" placeholder="VGA" required>
            </div>
            <div class="form-group">
                <label class="control-label">Harga</label>
                <input type="number" class="form-control harga" id="harga" name="harga" placeholder="Harga" required>
            </div>
        </div>    
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
    </div>
    <!-- /.box-footer-->
</div>
<!-- /.box -->
<?= $this->endsection('isi'); ?>