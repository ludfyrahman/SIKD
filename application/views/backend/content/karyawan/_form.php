<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
        <!-- <small>Preview</small> -->
      </h1>
      <?php Response_Helper::part('breadcrumb') ?>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"><?= $this->uri->segment(3) ?></h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <?php Response_Helper::part('alert') ?>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="" method="post">
            <div class="row">
              <div class="form-group col-md-6">
                  <label>Nama</label>
                  <input type="text" value='<?= Input_Helper::postOrOr('nama', $data['nama']) ?>' name="nama" class="form-control" placeholder="Masukkan nama" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Jenis Kelamin</label>
                  <select class="form-control select2" name="jenis_kelamin" style="width: 100%;">
                  <?php
                  $jenis_kelamin = Input_Helper::postOrOr('jenis_kelamin', $data['jenis_kelamin']);
                  ?>
                    <option <?= ($jenis_kelamin == 1 ? "selected" : "")?> value="1">Laki laki</option>
                    <option <?= ($jenis_kelamin == 0 ? "selected" : "")?> value="0">Perempuan</option>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Bagian</label>
                  <select class="form-control select2" name="id_bagian" style="width: 100%;">
                  <?php
                  $bag = Input_Helper::postOrOr('id_bagian', $data['id_bagian']);
                  foreach ($bagian as $b) {
                  ?>
                    <option <?= ($bag == $b['id'] ? "selected" : "")?> value="<?= $b['id'] ?>"><?= $b['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Jabatan</label>
                  <select class="form-control select2" name="id_jabatan" style="width: 100%;">
                  <?php
                  $jab = Input_Helper::postOrOr('id_jabatan', $data['id_jabatan']);
                  foreach ($jabatan as $j) {
                  ?>
                    <option <?= ($jab == $j['id'] ? "selected" : "")?> value="<?= $j['id'] ?>"><?= $j['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Golongan</label>
                  <select class="form-control select2" name="id_golongan" style="width: 100%;">
                  <?php
                  $gol = Input_Helper::postOrOr('id_golongan', $data['id_golongan']);
                  foreach ($golongan as $g) {
                  ?>
                    <option <?= ($gol == $g['id'] ? "selected" : "")?> value="<?= $g['id'] ?>"><?= $g['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Pendidikan</label>
                  <select class="form-control select2" name="id_pendidikan" style="width: 100%;">
                  <?php
                  $pend = Input_Helper::postOrOr('id_pendidikan', $data['id_pendidikan']);
                  foreach ($pendidikan as $p) {
                  ?>
                    <option <?= ($pend == $p['id'] ? "selected" : "")?> value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Status</label>
                  <select class="form-control select2" name="status" style="width: 100%;">
                  <?php
                  $status = Input_Helper::postOrOr('status', $data['status']);
                  ?>
                    <option <?= ($status == 1 ? "selected" : "")?> value="1">Aktif</option>
                    <option <?= ($status == 0 ? "selected" : "")?> value="0">Tidak Aktif</option>
                    <!-- <option selected="selected"><?= LEVEL[$i] ?></option> -->
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Tanggal Lahir</label>
                  <input type="text" id="datepicker" value='<?= Input_Helper::postOrOr('tanggal_lahir', $data['tanggal_lahir']) ?>' name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir" required>
              </div>
              <div class="form-group col-md-12">
                  <label>Alamat</label>
                  <textarea name="alamat" class="form-control" id="" cols="30" rows="10"><?= Input_Helper::postOrOr('alamat', $data['alamat']) ?></textarea>
              </div>
              <div class="col-md-12">
                <button class="btn btn-primary"><?= $type ?></button>
              </div>
              
            </div>
          </form>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <!-- <div class="box-footer">
          Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
          the plugin.
        </div> -->
      </div>
      <!-- /.box -->


    </section>
    <!-- /.content -->
  </div>