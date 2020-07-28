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
                  <label>No Arsip</label>
                  <input type="text" maxlength="30" value='<?= Input_Helper::postOrOr('no_surat', $data['no_surat']) ?>' name="no_surat" class="form-control" placeholder="Masukkan Nomor Surat" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Tanggal Pencipta</label>
                  <input type="text" id="datepicker" value='<?= Input_Helper::postOrOr('tanggal_surat', $data['tanggal_surat']) ?>' name="tanggal_surat" class="form-control" placeholder="Masukkan Tanggal Pencipta" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Pengirim Surat</label>
                  <input type="text" value='<?= Input_Helper::postOrOr('pengirim', $data['pengirim']) ?>' name="pengirim" class="form-control" placeholder="Masukkan Pengirim" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Berkas</label>
                  <select class="form-control select2 berkas" name="id_berkas" style="width: 100%;">
                  <?php
                  $bk = Input_Helper::postOrOr('id_berkas', $data['id_berkas']);
                  foreach ($berkas as $b) {
                  ?>
                    <option <?= ($bk == $b['id'] ? "selected" : "")?> value="<?= $b['id'] ?>"><?= "[".$b['id']."] ".$b['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Kode Klasifikasi</label>
                  <select class="form-control select2 klasifikasi" name="id_klasifikasi" style="width: 100%;">
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
                  <label>Sifat</label>
                  <select class="form-control select2" name="id_sifat" style="width: 100%;">
                  <?php
                  $sf = Input_Helper::postOrOr('id_sifat', $data['id_sifat']);
                  foreach ($sifat as $s) {
                  ?>
                    <option <?= ($sf == $s['id'] ? "selected" : "")?> value="<?= $s['id'] ?>"><?= $s['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Unit Pencipta</label>
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
                  <label>Lokasi Penyimpanan</label>
                  <select class="form-control select2" name="id_penyimpanan" style="width: 100%;">
                  <?php
                  $pen = Input_Helper::postOrOr('id_penyimpanan', $data['id_penyimpanan']);
                  foreach ($penyimpanan as $py) {
                  ?>
                    <option <?= ($pen == $py['id'] ? "selected" : "")?> value="<?= $py['id'] ?>"><?= $py['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
              <div class="form-group col-md-6">
                  <label>Boks</label>
                  <input type="text"  value='<?= Input_Helper::postOrOr('box', $data['box']) ?>' name="box" class="form-control" placeholder="Masukkan Boks" required>
              </div>
              <div class="form-group col-md-6" style="display:none">
                  <label>Tanggal Mulai Retensi</label>
                  <input type="text" id="datepicker" value='<?= Input_Helper::postOrOr('tanggal_mulai_retensi', $data['tanggal_mulai_retensi']) ?>' name="tanggal_mulai_retensi" class="form-control" placeholder="Masukkan Tanggal Mulai Retensi">
              </div>
              <div class="form-group col-md-6" style="display:none">
                  <label>Retensi</label>
                  <input type="text" disabled class="form-control" id="retensi" value="Retensi">
              </div>
              <!-- <div class="form-group col-md-6">
                  <label>Akses</label>
                  <input type="hidden" name="akses" id="aksesvalue">
                  <select class="form-control select2 akses"  multiple="multiple" data-placeholder="Select a State" >
                  <?php
                  $aks = Input_Helper::postOrOr('akses', $data['akses']);
                  foreach ($hak_akses as $a) {
                  ?>
                    <option <?= ($aks == $a['id'] ? "selected" : "")?> value="<?= $a['id'] ?>"><?= $a['nama']."[".$a['jabatan']."]" ?></option>
                  <?php } ?>
                  </select>
              </div> -->
              <div class="form-group col-md-6">
                  <label>File</label>
                  <input type="file" name="file" class="form-control" <?= ($type == 'Ubah' ? "" : "required") ?>>
              </div>
              <div class="form-group col-md-6">
                  <label>Gambar</label>
                  <input type="file" name="gambar" class="form-control" <?= ($type == 'Ubah' ? "" : "required") ?>>
              </div>
              <div class="col-md-12">
                <button class="btn btn-primary" ><?= $type ?></button>
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