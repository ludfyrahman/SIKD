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
      
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!-- <li class="active"><a href="#tab_1" data-toggle="tab">Pesan Masuk</a></li> -->
              <li class="active"><a href="#tab_2" data-toggle="tab">Arsip Saya</a></li>
              <!-- <li><a href="#berkas" data-toggle="tab">Arsip Diberkaskan</a></li>
              <li><a href="#sekarang" data-toggle="tab">Ditindak Lanjuti</a></li>
              <li><a href="#nanti" data-toggle="tab">Ditindak Nanti</a></li>
              <li><a href="#tidak_ditindak" data-toggle="tab">Tidak Ditindak</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
            </ul>
            <div class="tab-content">
              <!-- /.tab-pane -->
              <div class="tab-pane active" id="tab_2">
              <div class="">
                  <div class="box-header">
                    <h3 class="box-title">Arsip</h3>

                    <div class="box-tools pull-right">
                    <?php 
                    if($_SESSION['userlevel'] == 1){
                    ?>
                    <a href="<?= base_url("admin/".$ci->uri->segment(2)."/add")?>" class="btn btn-primary btn-block margin-bottom">Tambah Arsip</a>
                    <?php } ?>
                      <!-- <div class="has-feedback">
                      <input type="text" class="form-control input-sm" id="search_arsip" placeholder="Search Mail">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                      </div> -->
                    </div>
                    <!-- /.box-tools -->
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    
                    <div class="table-responsive mailbox-messages" id="arsip">
                      <?php  $this->load->view("backend/content/surat/masuk/_list_arsip") ?>
                    </div>
                    <!-- /.mail-box-messages -->
                  </div>
                  <!-- /.box-body -->
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