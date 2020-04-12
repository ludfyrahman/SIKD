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
            <small class="pull-right">Date: <?= $data['tanggal_lahir'] ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          Bagian
          <address>
            <strong>
            <?= $bagian['nama'] ?>
            </strong>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Jabatan
          <address>
            <strong>
              <?= $jabatan['nama'] ?>
            </strong>
          </address>
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Golongan
          <address>
            <strong>
              <?= $golongan['nama'] ?>
            </strong>
          </address>
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Pendidikan
          <address>
            <strong>
              <?= $pendidikan['nama'] ?>
            </strong>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Jenis Kelamin
          <address>
            <strong>
              <?= GENDER[$data['jenis_kelamin']] ?>
            </strong>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Status
          <address>
            <strong>
              <?= STATUS_PENGGUNA[$data['status']] ?>
            </strong>
          </address>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Alamat</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <?= $data['alamat'] ?>
          </p>
        </div>
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>