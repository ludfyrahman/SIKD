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