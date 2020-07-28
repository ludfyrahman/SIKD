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
          <form action="<?= base_url('admin/pengguna/updateProfil')?>" method="post">
            <div class="row">
              <div class="form-group col-md-6">
                  <label>Nama</label>
                  <input type="text" value='<?= Input_Helper::postOrOr('nama', $data['nama']) ?>' name="nama" class="form-control" placeholder="Masukkan nama anda" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Email</label>
                  <input type="email" value='<?= Input_Helper::postOrOr('email', $data['email']) ?>' name="email" class="form-control" placeholder="Masukkan email anda" required>
              </div>
              <div class="form-group col-md-6">
                  <label>Password</label>
                  <input type="password" value='<?= Input_Helper::postOrOr('password') ?>' name="password" class="form-control" placeholder="Masukkan password anda" <?= ($type == 'Tambah' ? 'required' : '') ?>>
              </div>
              <div class="form-group col-md-6">
                  <label>Password Konfirmasi</label>
                  <input type="password" value='<?= Input_Helper::postOrOr('password_konfirmasi') ?>' name="password_konfirmasi" class="form-control" placeholder="Masukkan password konfirmasi anda" <?= ($type == 'Tambah' ? 'required' : '') ?>>
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