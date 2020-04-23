<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
      </h1>
      <?php Response_Helper::part('breadcrumb') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <?php Response_Helper::part('mailSide') ?>
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pesan Masuk</a></li>
              <li><a href="#tab_2" data-toggle="tab">Arsip Saya</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="">
                  <div class="box-header">
                    <h3 class="box-title">Pesan</h3>

                    <div class="box-tools pull-right">
                      <div class="has-feedback">
                        <input type="text" class="form-control input-sm" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                      </div>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <!-- <div class="mailbox-controls">
                      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                      </div>
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                      <div class="pull-right">
                        1-50/200
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                      </div>
                    </div> -->
                    <div class="table-responsive mailbox-messages">
                      <table id="example2" class="table table-hover table-striped">
                        <tbody>
                        <?php 
                        $no = 1;
                        if (count($inbox) < 1) {
                          echo "<tr>
                          <td colspan='6' style='text-align:center'>Surat Masuk Kosong</td>
                          </tr>";
                        }
                        foreach ($inbox as $i) {
                        ?>
                        <tr>
                          <td><input type="checkbox"></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="<?= base_url("admin/$this->low/detail/".$i['id']) ?>"><?= $i['pengirim'] ?></a></td>
                          <td class="mailbox-subject"><?= $i['klasifikasi'] ?>
                          </td>
                          <td class="mailbox-attachment">
                            <i class="fa fa-paperclip"></i>
                          </td>
                          <td class="mailbox-date"><?= Response_Helper::time($i['created_at']) ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer no-padding">
                    <!-- <div class="mailbox-controls">
                      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                      </div>                    
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                      <div class="pull-right">
                        1-50/200
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                      </div>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              <div class="">
                  <div class="box-header">
                    <h3 class="box-title">Arsip</h3>

                    <div class="box-tools pull-right">
                      <div class="has-feedback">
                        <input type="text" class="form-control input-sm" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                      </div>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <div class="mailbox-controls">
                      <!-- Check all button -->
                      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                      </div>
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                      <div class="pull-right">
                        1-50/200
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                      </div>
                      <!-- /.pull-right -->
                    </div>
                    <div class="table-responsive mailbox-messages">
                    <table id="example1" class="table table-hover table-striped">
                        <tbody>
                        <?php 
                        $no = 1;
                        if (count($data) < 1) {
                          echo "<tr>
                          <td colspan='6' style='text-align:center'>Surat Masuk Kosong</td>
                          </tr>";
                        }
                        foreach ($data as $d) {
                        ?>
                        <tr>
                          <td><input type="checkbox"></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="<?= base_url("admin/$this->low/detail/".$d['id']) ?>"><?= $d['pengirim'] ?></a></td>
                          <td class="mailbox-subject"><?= $d['klasifikasi'] ?>
                          </td>
                          <td class="mailbox-attachment">
                            <i class="fa fa-paperclip"></i>
                          </td>
                          <td class="mailbox-date"><?= Response_Helper::time($d['created_at']) ?></td>
                        </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                      <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer no-padding">
                    <div class="mailbox-controls">
                      <!-- Check all button -->
                      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                      </div>
                      <!-- /.btn-group -->
                      <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                      <div class="pull-right">
                        1-50/200
                        <div class="btn-group">
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                          <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        <!-- /.btn-group -->
                      </div>
                      <!-- /.pull-right -->
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>