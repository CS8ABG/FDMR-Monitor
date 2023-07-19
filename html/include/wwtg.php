<div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title" id="tbl_tgs">TalkGroups</h3>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0 table-striped table-sm">
                <thead>
                  <tr>
                    <th id="tbrdgs_country">País</th>
                    <th id="tbrdgs_tg">TalkGroup</th>
                    <th id="tbrdgs_name">Nome</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // URL of the CSV file
                    $csvFile = 'https://freedmr.cymru/talkgroups/Talkgroups_FreeDMR.csv';

                    // Read the CSV file
                    $fileHandle = fopen($csvFile, 'r');
                    if ($fileHandle) {
                        // Create an empty array to store the table rows
                        $tableRows = [];

                        // Skip the first line (header)
                        fgetcsv($fileHandle);

                        // Read each line of the CSV file
                        while (($data = fgetcsv($fileHandle)) !== false) {
                            // Extract the columns: Country, Talk Groups, and Name
                            $country = $data[0];
                            $talkGroups = $data[1];
                            $name = $data[2];

                            // Append the row to the tableRows array
                            $tableRows[] = [$country, $talkGroups, $name];
                        }

                        // Close the file handle
                        fclose($fileHandle);

                        // Sort the tableRows array based on the "Country" column
                        usort($tableRows, function($a, $b) {
                            return strcmp($a[0], $b[0]);
                        });
                        // Loop through the tableRows array and output each row as a table row
                        foreach ($tableRows as $row) {
                            echo '<tr>';
                            echo '<td>' . $row[0] . '</td>';
                            echo '<td>' . $row[1] . '</td>';
                            echo '<td>' . $row[2] . '</td>';
                            echo '</tr>';
                        }


                    } else {
                        echo 'Failed to open the CSV file.';
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