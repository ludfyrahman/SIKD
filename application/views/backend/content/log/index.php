<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $title ?>
        <small>Pengguna</small>
      </h1>
      <?php Response_Helper::part('breadcrumb') ?>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- row -->
      <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <ul class="timeline">
                <!-- timeline time label -->
                <?php 
                foreach ($day as $d) {
                  $date = date('Y-m-d', strtotime($d['created_at']));
                ?>
                <li class="time-label">
                      <span class="bg-green">
                        <?= Response_Helper::date($d['created_at']) ?>
                      </span>
                </li>
                <!-- /.timeline-label -->
                <?php 
                foreach ($log as $l) {
                  if(strpos($l['created_at'], $date) !== FALSE){
                ?>
                <!-- timeline item -->
                <li>
                  <i class="fa fa-list bg-yellow"></i>

                  <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> <?= Response_Helper::time($l['created_at']) ?></span>

                    <h3 class="timeline-header">
                      <span class="badge bg-<?= TYPE_LOG_COLOR[$l['type']] ?>">  
                        <?= TYPE_LOG[$l['type']] ?>
                      </span>
                    </h3>
                    <div class="timeline-body"><?= $l['deskripsi'] ?></div>
                  </div>
                </li>
                <?php }}} ?>
                <!-- END timeline item -->
                <li>
                  <i class="fa fa-clock-o bg-gray"></i>
                </li>
              </ul>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->