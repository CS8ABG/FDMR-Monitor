<div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title" id="tbl_tgs"></h3>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive p-3">
              <table class="table m-0 table-striped table-sm table-bordered" >
                <thead>
                  <tr>
                    <th id="tbrdgs_tg"></th>
                    <th id="tbrdgs_name"></th>
                    <th id="tbrdgs_country"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    // URL of the CSV file
                    $csvFile = $config['DASHBOARD']['TG_LIST'];

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
                        $numofrows = count($tableRows);
                        // Loop through the tableRows array and output each row as a table row
                        foreach ($tableRows as $row) {
                            echo '<tr>';
                            echo '<td>' . $row[1] . '</td>';
                            echo '<td>' . $row[2] . '</td>';
                            echo '<td>' . $row[0] . '</td>';
                            echo '</tr>';
                        }


                    } else {
                        echo 'Failed to open the CSV file.';
                    }
                  ?>
                </tbody>
                <tfoot class="text-center">
                    <td colspan="3"><span>Number of TalkGroups:</span> <?php echo $numofrows; ?></td>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>