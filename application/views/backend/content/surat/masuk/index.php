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
              <li><a href="#berkas" data-toggle="tab">Arsip Diberkaskan</a></li>
              <li><a href="#sekarang" data-toggle="tab">Ditindak Lanjuti</a></li>
              <li><a href="#nanti" data-toggle="tab">Ditindak Nanti</a></li>
              <li><a href="#tidak_ditindak" data-toggle="tab">Tidak Ditindak</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="">
                  <div class="box-header">
                    <h3 class="box-title">Pesan</h3>

                    <div class="box-tools pull-right">
                      <div class="has-feedback">
                        <input type="text" class="form-control input-sm" id="search_mail" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                      </div>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <div class="table-responsive mailbox-messages" id="inbox">
                      <?php  $this->load->view("backend/content/surat/masuk/_list") ?>
                      <!-- /.table -->
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer no-padding">
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
                      <input type="text" class="form-control input-sm" id="search_arsip" placeholder="Search Mail">
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
                    <div class="table-responsive mailbox-messages" id="arsip">
                      <?php  $this->load->view("backend/content/surat/masuk/_list_arsip") ?>
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
              <div class="tab-pane" id="berkas">
                <div class="">
                  <div class="box-header">
                    <h3 class="box-title">Berkas</h3>

                    <div class="box-tools pull-right">
                      <div class="has-feedback">
                        <input type="text" class="form-control input-sm" id="search_mail" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                      </div>
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <div class="table-responsive mailbox-messages" id="inbox">
                    <table id="example2" class="table table-hover table-striped">
                        <tbody>
                        <?php 
                        $no = 1;
                        if (count($berkas) < 1) {
                            echo "<tr>
                            <td colspan='6' style='text-align:center'> Berkas Kosong</td>
                            </tr>";
                        }
                        foreach ($berkas as $b) {
                        ?>
                        <tr>
                            <td><input type="checkbox"></td>
                            <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                            <td class="mailbox-name"><a href="<?= base_url("admin/$this->low/detail/".$b['id']) ?>"><?= $b['pengirim'] ?></a></td>
                            <td class="mailbox-subject"><?= $b['klasifikasi'] ?>
                            </td>
                            <td class="mailbox-attachment">
                            <?= ($b['dilihat'] == 1 ? 'dilihat' : 'belum dilihat') ?>
                            </td>
                            <td class="mailbox-date"><?= Response_Helper::time($b['created_at']) ?></td>
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
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="sekarang">
              <div class="">
                <div class="box-header">
                  <h3 class="box-title">Ditindak Sekarang</h3>

                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" id="search_mail" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages" id="inbox">
                  <table id="example2" class="table table-hover table-striped">
                      <tbody>
                      <?php 
                      $no = 1;
                      if (count($sekarang) < 1) {
                          echo "<tr>
                          <td colspan='6' style='text-align:center'>Surat Ditindak Sekarang Kosong</td>
                          </tr>";
                      }
                      foreach ($sekarang as $s) {
                      ?>
                      <tr>
                          <td><input type="checkbox"></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="<?= base_url("admin/$this->low/detail/".$s['id']) ?>"><?= $s['pengirim'] ?></a></td>
                          <td class="mailbox-subject"><?= $s['klasifikasi'] ?>
                          </td>
                          <td class="mailbox-attachment">
                          <?= ($s['dilihat'] == 1 ? 'dilihat' : 'belum dilihat') ?>
                          </td>
                          <td class="mailbox-date"><?= Response_Helper::time($s['created_at']) ?></td>
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
                </div>
              </div>
            </div>
            <div class="tab-pane" id="nanti">
              <div class="">
                <div class="box-header">
                  <h3 class="box-title">Ditindak Nanti</h3>

                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" id="search_mail" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages" id="inbox">
                  <table id="example2" class="table table-hover table-striped">
                      <tbody>
                      <?php 
                      $no = 1;
                      if (count($nanti) < 1) {
                          echo "<tr>
                          <td colspan='6' style='text-align:center'>Surat Ditindak Nanti Kosong</td>
                          </tr>";
                      }
                      foreach ($nanti as $n) {
                      ?>
                      <tr>
                          <td><input type="checkbox"></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="<?= base_url("admin/$this->low/detail/".$n['id']) ?>"><?= $n['pengirim'] ?></a></td>
                          <td class="mailbox-subject"><?= $n['klasifikasi'] ?>
                          </td>
                          <td class="mailbox-attachment">
                          <?= ($n['dilihat'] == 1 ? 'dilihat' : 'belum dilihat') ?>
                          </td>
                          <td class="mailbox-date"><?= Response_Helper::time($n['created_at']) ?></td>
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
                </div>
              </div>
            </div>
            <div class="tab-pane" id="tidak_ditindak">
              <div class="">
                <div class="box-header">
                  <h3 class="box-title">Tidak Ditindak Lanjuti</h3>

                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                      <input type="text" class="form-control input-sm" id="search_mail" placeholder="Search Mail">
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="table-responsive mailbox-messages" id="inbox">
                  <table id="example2" class="table table-hover table-striped">
                    <tbody>
                    <?php 
                    $no = 1;
                    if (count($tidak_ditindak) < 1) {
                        echo "<tr>
                        <td colspan='6' style='text-align:center'>Surat Tidak Ditindak Lanjuti Kosong</td>
                        </tr>";
                    }
                    foreach ($tidak_ditindak as $td) {
                    ?>
                    <tr>
                        <td><input type="checkbox"></td>
                        <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                        <td class="mailbox-name"><a href="<?= base_url("admin/$this->low/detail/".$td['id']) ?>"><?= $td['pengirim'] ?></a></td>
                        <td class="mailbox-subject"><?= $td['klasifikasi'] ?>
                        </td>
                        <td class="mailbox-attachment">
                        <?= ($td['dilihat'] == 1 ? 'dilihat' : 'belum dilihat') ?>
                        </td>
                        <td class="mailbox-date"><?= Response_Helper::time($td['created_at']) ?></td>
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