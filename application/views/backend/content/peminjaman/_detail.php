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
        data dibawah ini adalah data peminjaman yang sudah terdaftarkan di aplikasi.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> <?= $data['nama_peminjam'] ?>.
            <small class="pull-right">Date: <?= $data['tanggal_peminjaman'] ?></small>
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
            <?= $data['nama_peminjam'] ?>
            </strong>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          Alamat
          <address>
            <strong>
            <?= $data['alamat'] ?>
            </strong>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          No hp
          <address>
            <strong>
            <?= $data['no_hp'] ?>
            </strong>
          </address>
        </div>
        <div class="col-sm-4 invoice-col">
          Status
          <address>
            <strong>
              <?= STATUS_PEMINJAMAN[$data['status']] ?>
            </strong>
          </address>
        </div>
        
      </div>
      <!-- /.row -->

    <!-- /.modal-dialog -->
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  