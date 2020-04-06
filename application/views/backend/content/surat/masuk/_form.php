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
          <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="form-group col-md-6">
                  <label>No Surat</label>
                  <input type="text" value='<?= Input_Helper::postOrOr('no_surat', $data['no_surat']) ?>' name="no_surat" class="form-control" placeholder="Masukkan Nomor Surat" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Tanggal Surat</label>
                  <input type="text" id="datepicker" value='<?= Input_Helper::postOrOr('tanggal_surat', $data['tanggal_surat']) ?>' name="tanggal_surat" class="form-control" placeholder="Masukkan Tanggal Surat" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Pengirim Surat</label>
                  <input type="text" value='<?= Input_Helper::postOrOr('pengirim', $data['pengirim']) ?>' name="pengirim" class="form-control" placeholder="Masukkan Pengirim" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Klasifikasi</label>
                  <select class="form-control select2" name="id_klasifikasi" style="width: 100%;">
                  <?php
                  $kl = Input_Helper::postOrOr('id_klasifikasi', $data['id_klasifikasi']);
                  foreach ($klasifikasi as $k) {
                  ?>
                    <option <?= ($kl == $k['id'] ? "selected" : "")?> value="<?= $k['id'] ?>"><?= "[".$k['id']."] ".$k['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Jenis</label>
                  <select class="form-control select2" name="id_jenis" style="width: 100%;">
                  <?php
                  $jn = Input_Helper::postOrOr('id_jenis', $data['id_jenis']);
                  foreach ($jenis as $j) {
                  ?>
                    <option <?= ($jn == $j['id'] ? "selected" : "")?> value="<?= $j['id'] ?>"><?= $j['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Media Pengiriman</label>
                  <select class="form-control select2" name="id_media_pengirim" style="width: 100%;">
                  <?php
                  $imp = Input_Helper::postOrOr('id_media_pengirim', $data['id_media_pengirim']);
                  foreach ($pengiriman as $p) {
                  ?>
                    <option <?= ($imp == $p['id'] ? "selected" : "")?> value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Tanggal Mulai Retensi</label>
                  <input type="text" id="datepicker" value='<?= Input_Helper::postOrOr('tanggal_mulai_retensi', $data['tanggal_mulai_retensi']) ?>' name="tanggal_mulai_retensi" class="form-control" placeholder="Masukkan Tanggal Mulai Retensi" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Retensi</label>
                  <select class="form-control select2" name="id_media_pengirim" style="width: 100%;">
                  <?php
                  $imp = Input_Helper::postOrOr('id_media_pengirim', $data['id_media_pengirim']);
                  foreach ($pengiriman as $p) {
                  ?>
                    <option <?= ($imp == $p['id'] ? "selected" : "")?> value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Akses</label>
                  <select class="form-control select2" name="id_media_pengirim" style="width: 100%;">
                  <?php
                  $imp = Input_Helper::postOrOr('id_media_pengirim', $data['id_media_pengirim']);
                  foreach ($akses as $a) {
                  ?>
                    <option <?= ($imp == $a['id'] ? "selected" : "")?> value="<?= $a['id'] ?>"><?= $a['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>File</label>
                  <input type="file" name="file" class="form-control" required>
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