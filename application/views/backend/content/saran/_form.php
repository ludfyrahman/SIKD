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
                  <input type="text" value='<?= ($type == 'Tambah' ? Auth_Helper::Get("nama") : $pengguna['nama']) ?>' name="nama" class="form-control" placeholder="Masukkan nama anda" disabled>
              </div>
              <div class="form-group col-md-6">
                  <label>Email</label>
                  <input type="text" value='<?= ($type == 'Tambah' ? Auth_Helper::Get("email") : $pengguna['email']) ?>' name="nama" class="form-control" placeholder="Masukkan nama anda" disabled>
                  <input type="hidden" value='<?= ($type == 'Tambah' ? Auth_Helper::Get("id") : $pengguna['id']) ?>' name="id_pengguna" class="form-control" placeholder="Masukkan nama anda" >
              </div>
              <div class="form-group col-md-12">
                  <label>Saran</label>
                  <textarea name="saran" class="form-control" id="" cols="30" rows="10"><?= Input_Helper::postOrOr('saran', $data['saran']) ?></textarea>
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