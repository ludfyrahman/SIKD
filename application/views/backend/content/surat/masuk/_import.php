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
          <form action="<?= base_url("admin/".$ci->uri->segment(2)."/upload") ?>" method="post" enctype="multipart/form-data">
            <div class="row">
              
              <div class="form-group col-md-6">
                  <label>Download Template</label><br>
                  <a target="_blank" href="<?= base_url("admin/".$this->uri->segment(2)."/download") ?>"><button type="button" class="btn btn-success">Download Template</button></a>
              </div>
              <div class="form-group col-md-6">
                  <label>Import File * xls</label>
                  <input type="file" name="file" class="form-control" required>
              </div>
              <div class="col-md-12 ">
                <button class="btn btn-primary pull-right" type="submit" >Import</button>
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