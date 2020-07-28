<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
        <!-- <small>13 new messages</small> -->
      </h1>
      
      <?php Response_Helper::part('breadcrumb') ?>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      
        <!-- /.col -->
        <div class="col-md-12">
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
                <h5>Dari:<?= $data['pengirim'] ?>
                  <span class="mailbox-read-time pull-right"><?= $data['created_at'] ?></span></h5>
              </div>
              <div class=" mailbox-read-info">
                <div class="row">
                  <div class="col-md-6">
                    <h5>Klasifikasi :<?= $data['klasifikasi'] ?></h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Tanggal Surat :<?= $data['tanggal_surat'] ?></h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Jenis :<?= $data['jenis'] ?></h5>
                  </div>
                  <div class="col-md-6">
                    <h5>Media Pengirim :<?= $data['media'] ?></h5>
                  </div>
                  <!-- <div class="col-md-6">
                    <h5>Tanggal Retensi :<?= $data['tanggal_mulai_retensi'] ?></h5>
                  </div> -->
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <?php
            if($data['status_publik']){?>
              <ul class="mailbox-attachments clearfix">
                <!-- </li> -->
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?= $data['file'] ?></a>
                        <span class="mailbox-attachment-size">
                          <!-- 1,245 KB -->
                          <a target="_blank" href="<?= base_url('assets/upload/surat/masuk/'.$data['file']) ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
                <li>
                  <span class="mailbox-attachment-icon"><i class="fa fa-file-image-o"></i></span>

                  <div class="mailbox-attachment-info">
                    <a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> <?= $data['image'] ?></a>
                        <span class="mailbox-attachment-size">
                          <!-- 1,245 KB -->
                          <a target="_blank" href="<?= base_url('assets/upload/surat/masuk/'.$data['image']) ?>" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
                        </span>
                  </div>
                </li>
              </ul>
            <?php }?>
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <div class="pull-right">
                <!-- <button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button> -->
                <?php if ($data['created_by'] == $_SESSION['userid'] || $_SESSION['userlevel'] == 1) {?>
                <!-- <button type="button" data-toggle="modal" data-target="#forward" class="btn btn-default"><i class="fa fa-share"></i> Teruskan</button> -->
                <a href="<?= base_url("admin/$this->low/edit/$data[id]") ?>"><button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Ubah</button></a>
                <a class="delete" href="<?= base_url("admin/$this->low/delete/$data[id]") ?>"><button type="button" class="btn btn-default"><i class="fa fa-trash"></i> Hapus</button></a>
                <?php } ?>
              </div>
              <?php
              if(isset($data['status'])){
                ?>
                <!-- <a href="<?= base_url('admin/'.$this->low."/aksi/".$data['status']."/berkas/".$data['id_smt']) ?>" class="warning"><button type="button" class="btn btn-default"><i class="fa fa-book"></i> Berkaskan</button></a> -->
                <?php
              }
              ?>
              <!-- <a data-toggle="modal" data-target="#tindak" class="warning"><button type="button" class="btn btn-default"><i class="fa fa-forward"></i> Tindak Lanjuti</button></a> -->
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
  <div class="modal fade" id="forward">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Teruskan Arsip</h4>
        </div>
        <style>
          .select2-container{
            width:100%!important;
          }
        </style>
        <form action="<?= base_url('admin/surat_masuk/teruskan/'.$data['id']) ?>" method="POST">
        <div class="modal-body">
          <div class="form-group">
              <label>Akses</label>
              <input type="hidden" name="akses" id="aksesvalue">
              <select class="form-control select2 akses"  multiple="multiple" data-placeholder="Select a State" required>
              <?php
              $pg = Input_Helper::postOrOr('pengguna', $data['pengguna']);
              foreach ($pengguna as $a) {
              ?>
                <option <?= ($pg == $a['id'] ? "selected" : "")?> value="<?= $a['id'] ?>"><?= $a['nama'] ?></option>
              <?php } ?>
              </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade" id="tindak">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Teruskan Arsip</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
              <label>Pilih Tindakan </label><br>
              <?php 
              if(isset($data['status']) && $_SESSION['userlevel']!=1){
              if(in_array($data['status'], [1,3,4])){
                if(in_array($data['status'], [1,4])){
              ?>
              <a href="<?= base_url('admin/'.$this->low."/aksi/".$data['status']."/sekarang/".$data['id_smt']) ?>"><button class="btn btn-info"><i class="fa fa-flash"></i> Tindak Lanjuti Sekarang</button></a>
                <?php }
                if(in_array($data['status'], [1])){ ?>
              <a href="<?= base_url('admin/'.$this->low."/aksi/".$data['status']."/nanti/".$data['id_smt']) ?>"><button class="btn btn-warning"><i class="fa fa-clock-o"></i> Tindak Lanjuti Nanti</button></a>
              <?php
                } 
              if(in_array($data['status'], [3])){
              ?>
              <a href="<?= base_url('admin/'.$this->low."/aksi/".$data['status']."/tidak/".$data['id_smt']) ?>"><button class="btn btn-danger"><i class="fa fa-close"></i> Tidak Tindak Lanjuti</button></a>
              <?php }}}else{
                if($_SESSION['userlevel'] == '1'){
                  echo "<h3>Anda Tidak Bisa meneruskan arsip ini</h3>";
                }
              } ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
          <!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>