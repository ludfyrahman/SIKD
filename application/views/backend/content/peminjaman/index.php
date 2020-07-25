<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
        <!-- <small>advanced tables</small> -->
      </h1>
     <?php Response_Helper::part('breadcrumb') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?= $title ?></h3>
              <a href="<?= base_url('admin')."/".$this->uri->segment(2)."/add" ?>">
                <button class="btn btn-primary pull-right">Tambah</button>
              </a>
            </div>
            <?php Response_Helper::part('alert') ?>
            <!-- /.box-header -->
            <?php 
            $field = "
            <tr>
                  <th>No</th>
                  <th>No Arsip</th>
                  <th>Nama Peminjam</th>
                  <th>No Hp</th>
                  <th>Tanggal Peminjaman</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
            ";
            ?>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <?= $field ?>
                </thead>
                <tbody>
                  <?php 
                  $no = 1;
                  $status = ['private', 'umum'];
                  foreach ($data as $d) {
                    ?>
                  <tr>
                    <td><?= $no ?></td>
                    <td><?= $d['no_surat'] ?></td>
                    <td><?= $d['nama_peminjam'] ?></td>
                    <td><?= $d['no_hp'] ?></td>
                    <td><?= $d['tanggal_peminjaman'] ?></td>
                    <td><?= STATUS_PEMINJAMAN[$d['status']] ?></td>
                    <td>
                        <a href="<?= base_url("admin/$this->low/delete/".$d['id']) ?>" class="btn btn-default btn-xs delete" data-toggle="tooltip" data-placement="top" data-original-title="Hapus Data"><i class="fa fa-trash"></i></a>
                        <a href="<?= base_url("admin/$this->low/edit/".$d['id']) ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Ubah Data"><i class="fa fa-pencil"></i></a>
                        <a href="<?= base_url("admin/$this->low/detail/".$d['id']) ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="top" data-original-title="Detail Data"><i class="fa fa-book"></i></a>
                        <?php 
                        if($d['status'] == 0){
                        ?>
                        <a href="<?= base_url("admin/$this->low/kembalikan/".$d['id']) ?>" class="btn btn-default btn-xs warning" data-toggle="tooltip" data-placement="top" data-original-title="Kembalikan"><i class="fa fa-check"></i></a>
                        <?php }?>
                    </td>
                  </tr>
                  <?php $no++;} ?>
                </tbody>
                <tfoot>
                <?= $field ?>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>