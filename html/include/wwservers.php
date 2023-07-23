<div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title" id="tbl_srvrs">Servidores Mundiais</h3>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0 table-striped table-sm">
                <thead>
                  <tr>
                    <th id="tsrvrs_country">País</th>
                    <th id="tsrvrs_dmrid">DMR-ID</th>
                    <th id="tsrvrs_ipname">IP/Nome</th>
                    <th id="tsrvrs_pass">Palavra-passe</th>
                    <th id="tsrvrs_port">Porta</th>
                    <th id="tsrvrs_status">Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $url = '';
                  $data = file_get_contents($url);
                  $lines = explode("\n", trim($data));
                  array_shift($lines); // remove first line
                  array_shift($lines); // remove second line
                  foreach ($lines as $line) {
                      $fields = str_getcsv($line);
                      list($country, $id, $host, $password, $port) = $fields;
                      echo '<tr>';
                      echo '<td>' . htmlspecialchars($country) . '</td>';
                      echo '<td>' . htmlspecialchars($id) . '</td>';
                      echo '<td><a target="_blank" href="http://' . htmlspecialchars($host) . '">' . htmlspecialchars($host) . '</a></td>';
                      echo '<td>' . htmlspecialchars($password) . '</td>';
                      echo '<td>' . htmlspecialchars($port) . '</td>';
                      echo '<td><span class="status" data-host="' . htmlspecialchars($host) . '"><span class="badge badge-warning">Loading...</span></span></td>';
                      echo '</tr>';
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script>
    function updateStatuses() {
        var statuses = document.querySelectorAll('.status');
        statuses.forEach(function(status) {
            var host = status.getAttribute('data-host');
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var badgeClass;
                if (this.responseText === 'Online') {
                    badgeClass = 'badge-success';
                } else if (this.responseText === 'Offline') {
                    badgeClass = 'badge-danger';
                } else {
                    badgeClass = 'badge-warning';
                }
                status.innerHTML = '<span class="badge ' + badgeClass + '">' + this.responseText + '</span>';
                }
            };
            xhr.open('GET', 'include/serverstatus.php?host=' + encodeURIComponent(host), true);
            xhr.send();
        });
    }
    updateStatuses();
</script>