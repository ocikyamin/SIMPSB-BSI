  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
  <div class="table-responsive">

      <table class="table table-sm table-bordered text-sm mid" id="table-presensi">
          <thead>
              <tr>
                  <th class="text-center">No.</th>
                  <th>Nama</th>
                  <th>Waktu</th>
                  <th>Status</th>
              </tr>
          </thead>
          <tbody>
              <?php
        $i=1;
        foreach ($list as $d) {?>
              <tr>
                  <td class="text-center"><?=$i++?></td>
                  <td><?=$d['nama_lengkap']?></td>
                  <td><?=$d['created_at']?></td>
                  <td><?=$d['type_scan']?></td>
              </tr>
              <?php } ?>
          </tbody>
      </table>

      <!-- DataTables -->
      <script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
      <script>
      $(function() {
          $("#table-presensi").DataTable()
      });
      </script>