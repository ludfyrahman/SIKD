<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Karyawan
        <small><?= $data['id'] ?></small>
      </h1>
      <?php Response_Helper::part('breadcrumb') ?>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Catatan:</h4>
        data dibawah ini adalah data dari karyawan yang sudah terdaftarkan di aplikasi.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?= $data['nama'] ?>.
            <small class="pull-right">Date: <?= $data['created_at'] ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Nama
          <address>
            <strong>
            <?= $data['nama'] ?>
            </strong>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          Email
          <address>
            <strong>
            <?= $data['email'] ?>
            </strong>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          Status
          <address>
            <strong>
              <?= STATUS_PENGGUNA[$data['status']] ?>
            </strong>
          </address>
        </div>
        <!-- <div class="col-sm-4 invoice-col">
          Bagian
          <address>
            <strong>
            <?= $bagian['nama'] ?>
            </strong>
          </address>
        </div> -->
        <!-- /.col -->
        <!-- <div class="col-sm-4 invoice-col">
          Jabatan
          <address>
            <strong>
              <?= $jabatan['nama'] ?>
            </strong>
          </address>
        </div> -->
        <!-- /.col -->
        <!-- /.col -->
        <!-- <div class="col-sm-4 invoice-col">
          Golongan
          <address>
            <strong>
              <?= $golongan['nama'] ?>
            </strong>
          </address>
        </div> -->
        <!-- /.col -->
        <!-- /.col -->
        <!-- <div class="col-sm-4 invoice-col">
          Pendidikan
          <address>
            <strong>
              <?= $pendidikan['nama'] ?>
            </strong>
          </address>
        </div> -->
        <!-- /.col -->
        <!-- <div class="col-sm-4 invoice-col">
          Jenis Kelamin
          <address>
            <strong>
              <?= GENDER[$data['jenis_kelamin']] ?>
            </strong>
          </address>
        </div> -->
        <!-- /.col -->
        
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Jabatan
                <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#forward">Tambah Jabatan</button>
          </p>
          <div class="row">
            <?php $no = 1; foreach ($jabatan as $j) { ?>
            <div class="col-md-4">
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                <?= $no.". ".$j['nama'] ?>
                <a href="<?= base_url("admin/$this->low/deleteJabatan/".$j['id']) ?>" class="btn btn-default btn-xs delete" data-toggle="tooltip" data-placement="top" data-original-title="Hapus Data"><i class="fa fa-trash"></i></a>
              </p>
            </div>
            <?php $no++;}?>
              
          </div>
        </div>
      </div>
      <!-- /.row -->
      <div class="modal fade" id="forward">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Teruskan Arsip</h4>
            </div>
            <style>
              .select2-container{
                width:100%!important;
              }
            </style>
            <form action="<?= base_url('admin/pengguna/add_jabatan/'.$data['id']) ?>" method="POST">
            <div class="modal-body">
              <div class="form-group">
                  <label>Jabatan</label>
                  <select class="form-control " name="id_jabatan" required>
                  <?php
                  $jb = Input_Helper::postOrOr('pengguna', $data['pengguna']);
                  foreach ($jabatan_all as $ja) {
                  ?>
                    <option <?= ($jb == $ja['id'] ? "selected" : "")?> value="<?= $ja['id'] ?>"><?= $ja['nama'] ?></option>
                  <?php } ?>
                  </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>
    <!-- /.modal-dialog -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  