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
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
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
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                  <td>
                      <a href="<?= base_url() ?>"><span class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                      <a href="<?= base_url() ?>"><span class="badge bg-yellow"><i class="fa fa-pencil"></i></span></a>
                      <a href="<?= base_url() ?>"><span class="badge bg-blue"><i class="fa fa-book"></i></span></a>
                  </td>
                </tr>
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