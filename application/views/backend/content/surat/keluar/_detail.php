<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>13 new messages</small>
      </h1>
      <?php Response_Helper::part('breadcrumb') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <?php Response_Helper::part('mailSide') ?>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?= $title ?></h3>

              <div class="box-tools pull-right">
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
                <a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3>No Surat <?= $data['no_surat'] ?></h3>
                <h5>Tujuan:<?= $data['tujuan'] ?>
                  <span class="mailbox-read-time pull-right"><?= $data['created_at'] ?></span></h5>
              </div>
              <div class=" mailbox-read-info">
                <div class="row">
                  <div class="col-md-6">
                    <h5>Klasifikasi :<?= $data['klasifikasi'] ?></h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Tanggal Dirikim :<?= $data['tanggal_dikirim'] ?></h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Tujuan :<?= $data['tujuan'] ?></h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Perihal :<?= $data['perihal'] ?></h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Media Pengirim :<?= $data['media'] ?></h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Keterangan :<?= $data['keterangan'] ?></h5>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">

              <ul class="mailbox-attachments clearfix">
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?= $data['file'] ?></a>
                        <span class="mailbox-attachment-size">
                          1,245 KB
                          <a target="_blank" href="<?= base_url('assets/upload/surat/keluar/'.$data['file']) ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
                <button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
              </div>
              <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
              <button type="button" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>