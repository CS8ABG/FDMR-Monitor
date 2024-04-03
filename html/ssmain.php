<?php
include("config.php");
session_start();
include_once "ssconfunc.php";
checkSessionTimeout();

// Handshake from login
if (isset($_SESSION['user_id']) && isset($_SESSION['int_ids'])) {
    $callsign = $_SESSION['user_id'];
    $int_ids = $_SESSION['int_ids'];

    if (count($int_ids) === 1) {
        // If there is only one int_id, select it automatically
        $int_id = $int_ids[0];
        $_SESSION['selected_int_id'] = $int_id;
    } else {
        // If there are multiple int_ids, select the first one automatically
        if (!isset($_SESSION['selected_int_id'])) {
            $_SESSION['selected_int_id'] = $int_ids[0];
        }
        $int_id = $_SESSION['selected_int_id'];
    }

} else {
    // Redirect to login page if not logged in
    header("Location: sslogin.php");
    exit();
}
// Handle form submission from select device
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $int_id = $_POST['int_id'];
    if (!empty($int_id)) {
        $_SESSION['selected_int_id'] = $int_id;
        //echo "You selected int_id: " . htmlspecialchars($int_id) . "<br>";
    }
}
// get device info from DB
if (isset($_SESSION['selected_int_id'])) {
    $selint_id = $_SESSION['selected_int_id'];
    $devDetails = getDevDetails($selint_id);
    $options = explode(';', $devDetails['options']);
    // get DIAL value
    $dialValue = 0;
    foreach ($options as $option) {
        list($key, $value) = explode('=', $option);
        if ($key === 'DIAL') {
            $dialValue = $value;
            break;
        }
    }
    // get VOICE value 
    $voiceValue = '-1';
    foreach ($options as $option) {
        list($key, $value) = explode('=', $option);
        if ($key === 'VOICE') {
            $voiceValue = $value;
            break;
        }
    }
    // get LANG value 
    $langValue = 0;
    foreach ($options as $option) {
        list($key, $value) = explode('=', $option);
        if ($key === 'LANG') {
            $langValue = $value;
            break;
        }
    }
    // get SINGLE value 
    $singleValue = '-1';
    foreach ($options as $option) {
        list($key, $value) = explode('=', $option);
        if ($key === 'SINGLE') {
            $singleValue = $value;
            break;
        }
    }
    // get TIMER value 
    $timerValue = 0;
    foreach ($options as $option) {
        list($key, $value) = explode('=', $option);
        if ($key === 'TIMER') {
            $timerValue = $value;
            break;
        }
    }
    // get TS1 value 
    $ts1Value = 0;
    foreach ($options as $option) {
        list($key, $value) = explode('=', $option);
        if ($key === 'TS1') {
            $ts1Value = $value;
            break;
        }
    }
    $ts1Values = explode(',', $ts1Value);
    // get TS2 value 
    $ts2Value = 0;
    foreach ($options as $option) {
        list($key, $value) = explode('=', $option);
        if ($key === 'TS2') {
            $ts2Value = $value;
            break;
        }
    }
    $ts2Values = explode(',', $ts2Value);

}
// Handle form submission to save changes to the database
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['genText'])) {
        $generatedOptions = $_POST['genText'];
        $intId = $_SESSION['selected_int_id'];
        $result = updateDevOptions($intId, $generatedOptions);

        if ($result) {
            header("Refresh: 0; url=".$_SERVER['PHP_SELF']);
            exit();
        } else {
            $errorMsg = "<p>Failed to update options. Please try again.</p>";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $config['DASHBOARD']['DASHTITLE']; ?></title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="img/favicon.ico">
    <!-- Site Description -->
    <meta name="description" content="<?php echo $config['DASHBOARD']['DASHTITLE']; ?>">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/adminlte/css/adminlte.min.css">
</head>

<body class="hold-transition dark-mode layout-top-nav layout-navbar-fixed text-sm layout-footer-fixed" style="zoom: 85%;">
    <div class="wrapper">
        <?php if ($display_preloader): ?>
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="img/Logo_mini.png" alt="" height="60" width="60">
        </div>
        <?php endif; ?>
        <?php include 'include/navbar.php';?>
        <div class="content-wrapper"<?php if ($config['DASHBOARD']['BACKGROUND']) echo ' style="background-image: url(\'img/bk.jpg\'); background-attachment: fixed;"'; ?>>
            <div class="content-header">
                <div class="container">
                    <div class="row mb-2 justify-content-center">
                        <div class="col-sm-auto">
                            <img src="../img/logo.png" alt="FreeDMR" width="100%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="content">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">
                                        <?php echo "<b>" . $callsign . "</b>  "; ?>
                                        <?php if (count($int_ids) === 1): ?>
                                        <?php echo '   (' . htmlspecialchars($int_id) . ')'; ?>
                                        <?php endif; ?>
                                    </h3>
                                    <div class="card-tools">
                                        <a href="sslogout.php" class="btn btn-tool">
                                        <i class="fas fa-sign-out-alt"></i> <b><span id="calc_lout"></span></b>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <?php if (isset($errorMsg)): ?>
                                        <p>
                                            <?php echo $errorMsg; ?>
                                        </p>
                                    <?php endif; ?>
                                    <div class="blur-content">
                                        <div class="row justify-content-center">
                                            <div class="col-4 text-center mb-4">
                                                <h1>Self Service</h1>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="row justify-content-center">
                                            <div class="form-group col-2">
                                                <div class="row justify-content-center">
                                                    <?php if (count($int_ids) !== 1): ?>
                                                        <p class="mb-1"><b><span id="calc_dev"></span></b></p>
                                                        <form method="post">
                                                            <select class="form-control form-control-sm" name="int_id" onchange="this.form.submit()">
                                                                <?php foreach ($int_ids as $int_id): ?>
                                                                <option value="<?= htmlspecialchars($int_id) ?>" <?= (isset($_SESSION['selected_int_id']) && $_SESSION['selected_int_id'] === $int_id) ? 'selected' : '' ?>><?= htmlspecialchars($int_id) ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </form>
                                                    <?php endif; ?>
                                                    <span class="mt-3"><?php if ($devDetails['mode']== 4) { echo "SIMPLEX" ; } else { echo "DUPLEX" ; } ?></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div id="timeslot1col" class="col-4">
                                                <table class="table table-sm border align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" style="text-align: center;" class="align-middle">Time Slot 1&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-title="" id="calchlpts1"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="timeslotTable">
                                                        <?php foreach ($ts1Values as $index => $value): ?>
                                                        <tr>
                                                            <td class="align-middle text-nowrap">TG <?php echo $index + 1; ?>:</td>
                                                            <td><input type="number" class="form-control form-control-sm" min="0" step="1" onchange="updateGeneratedText()" value="<?php echo $value; ?>"></td>
                                                            <td><button class="btn" onclick="removeRow(this)"><i class="fas fa-times text-danger"></i></button></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <div class="row justify-content-center">
                                                    <button class="btn btn-primary btn-xs" onclick="addRow('timeslotTable')" id="calc_addts1"></button>
                                                </div>
                                            </div>
                                            <div id="timeslot2col" class="col-4">
                                                <table class="table table-sm border align-middle">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="3" style="text-align: center;" class="align-middle">Time Slot 2&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-title="" id="calchlpts2"></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="timeslotTable2">
                                                        <?php foreach ($ts2Values as $index => $value): ?>
                                                        <tr>
                                                            <td class="align-middle text-nowrap">TG <?php echo $index + 1; ?>:</td>
                                                            <td><input type="number" class="form-control form-control-sm" min="0" step="1" onchange="updateGeneratedText()" value="<?php echo $value; ?>"></td>
                                                            <td><button class="btn" onclick="removeRow(this)"><i class="fas fa-times text-danger"></i></button></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                                <div class="row justify-content-center">
                                                    <button class="btn btn-primary btn-xs" onclick="addRow('timeslotTable2')" id="calc_addts2"></button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-8">
                                                <table class="table table-sm border align-middle mt-4">
                                                    <tbody>
                                                        <tr>
                                                            <td class="align-middle text-nowrap"><span id="calc_dialtg"></span>&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-title="" id="calchlpdtg"></i></td>
                                                            <td><input type="number" class="form-control form-control-sm" min="0" step="1" id="dialTGInput" value="<?php echo $dialValue; ?>" oninput="toggleTimeslot2(this.value)"></td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-nowrap"><span id="calc_voice"></span>&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-title="" id="calchlpvoice"></i></td>
                                                            <td>
                                                                <select class="form-control form-control-sm" id="voiceSelect" onchange="toggleLanguageDropdown()">
                                                                    <option value="-1" <?php if ($voiceValue=='-1' ) { echo "selected" ; }; ?> id="calc_voicesrv"></option>
                                                                    <option value="0" <?php if ($voiceValue=='0' ) { echo "selected" ; }; ?> id="calc_voiceoff"></option>
                                                                    <option value="1" <?php if ($voiceValue=='1' ) { echo "selected" ; }; ?> id="calc_voiceon"></option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr id="languagerow">
                                                            <td class="align-middle text-nowrap"><span id="calc_lang"></span>&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-title="" id="calchlplang"></i></td>
                                                            <td>
                                                                <select class="form-control form-control-sm" id="languageselect">
                                                                    <option value="en_GB" <?php if ($langValue=='en_GB' ) { echo "selected" ; }; ?>>English (en_GB)</option>
                                                                    <option value="en_US" <?php if ($langValue=='en_US' ) { echo "selected" ; }; ?>>English (en_US)</option>
                                                                    <option value="es_ES" <?php if ($langValue=='es_ES' ) { echo "selected" ; }; ?>>Spanish (es_ES)</option>
                                                                    <option value="fr_FR" <?php if ($langValue=='fr_FR' ) { echo "selected" ; }; ?>>French (fr_FR)</option>
                                                                    <option value="de_DE" <?php if ($langValue=='de_DE' ) { echo "selected" ; }; ?>>German (de_DE)</option>
                                                                    <option value="dk_DK" <?php if ($langValue=='dk_DK' ) { echo "selected" ; }; ?>>Danish (dk_DK)</option>
                                                                    <option value="it_IT" <?php if ($langValue=='it_IT' ) { echo "selected" ; }; ?>>Italian (it_IT)</option>
                                                                    <option value="no_NO" <?php if ($langValue=='no_NO' ) { echo "selected" ; }; ?>>Norwegian (no_NO)</option>
                                                                    <option value="pl_PL" <?php if ($langValue=='pl_PL' ) { echo "selected" ; }; ?>>Polish (pl_PL)</option>
                                                                    <option value="se_SE" <?php if ($langValue=='se_SE' ) { echo "selected" ; }; ?>>Swedish (se_SE)</option>
                                                                    <option value="pt_PT" <?php if ($langValue=='pt_PT' ) { echo "selected" ; }; ?>>Portuguese (pt_PT)</option>
                                                                    <option value="cy_GB" <?php if ($langValue=='cy_GB' ) { echo "selected" ; }; ?>>Welsh (cy_GB)</option>
                                                                    <option value="el_GR" <?php if ($langValue=='el_GR' ) { echo "selected" ; }; ?>>Greek (el_GR)</option>
                                                                    <option value="CW" <?php if ($langValue=='CW' ) { echo "selected" ; }; ?>>CW</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-nowrap"><span 
                                                                    id="calc_smode"></span>&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-title="" id="calchlpsmode"></i></td>
                                                            <td>
                                                                <select class="form-control form-control-sm" id="singleModeSelect">
                                                                    <option value="-1" <?php if ($singleValue=='-1' ) { echo "selected" ; }; ?> id="calc_smodesrv"></option>
                                                                    <option value="0" <?php if ($singleValue=='0' ) { echo "selected" ; }; ?> id="calc_smodeoff"></option>
                                                                    <option value="1" <?php if ($singleValue=='1' ) { echo "selected" ; }; ?> id="calc_smodeon"></option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle text-nowrap"><span id="calc_tgto"></span>&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true" data-bs-title="" id="calchlpstgto"></i></td>
                                                            <td><input type="number" class="form-control form-control-sm" min="0" step="1" id="timeoutInput" value="<?php echo $timerValue; ?>"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="row justify-content-center mb-3">
                                            <div class="col-6">
                                                <div class="row justify-content-center">
                                                    <p class="mb-1"><b>Options:</b></p>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <textarea class="form-control text-sm form-control-sm" id="genText" rows="2" readonly></textarea>
                                                    <form method="post" id="saveChangesForm" style="display: none;">
                                                        <textarea name="genText" id="genTextHidden"></textarea>
                                                    </form>
                                                    
                                                </div>
                                                <div class="row justify-content-center mt-4 mb-4">
                                                    <button class="btn btn-primary" onclick="saveChanges()" id="calc_save"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="spinner text-center mb-5" style="display: <?php echo $devDetails['modified'] === '1' ? 'block' : 'none'; ?>">
                                        <i class="fas fa-2x fa-sync-alt fa-spin"></i><br><br>
                                        <span class="mt-2" id="calc_wait"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <footer class="main-footer text-sm">
            <?php include 'include/footer.php';?>
        </footer>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="scripts/mode.js"></script>
    <script src="plugins/adminlte/js/adminlte.min.js"></script>
    <script src="scripts/monitor.js"></script>
</body>

</html>
<script>
    function toggleTimeslotTable() {
        var timeSlot1Col = document.getElementById('timeslot1col');
        var modeStatus = <?php echo $devDetails['mode']; ?>;
        if ( modeStatus === 4) {
            timeSlot1Col.style.display = 'none';
        } else {
            timeSlot1Col.style.display = 'block';
        }
        updateGeneratedText();
    }

    function toggleTimeslot2(value) {
        var timeslot2Col = document.getElementById('timeslot2col');
        if (value > 0) {
            timeslot2Col.style.display = 'none';
        } else {
            timeslot2Col.style.display = 'block';
        }
        updateGeneratedText();
    }

    function toggleLanguageDropdown() {
        var voiceSelect = document.getElementById('voiceSelect');
        var languageRow = document.getElementById('languagerow');
        if (voiceSelect.value !== '1') {
            languagerow.style.display = 'none';
        } else {
            languagerow.style.display = 'table-row';
        }
        updateGeneratedText();
    }

    function addRow(tableId) {
        var table = document.getElementById(tableId);
        var rowCount = table.rows.length;
        var row = table.insertRow(rowCount);
        var tgCell = row.insertCell(0);
        var timeslotCell = row.insertCell(1);
        var removeCell = row.insertCell(2);
        tgCell.innerHTML = 'TG ' + (rowCount + 1) + ':';
        tgCell.classList.add('align-middle');
        tgCell.classList.add('text-nowrap');
        timeslotCell.innerHTML = '<input type="number" class="form-control form-control-sm" min="0" step="1" onchange="updateGeneratedText()">';
        removeCell.innerHTML = '<button class="btn" onclick="removeRow(this)"><i class="fas fa-times text-danger"></i></button>';
        updateGeneratedText();
    }

    function removeRow(button) {
        var row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateGeneratedText();
    }

    function checkDupes() {
        let inputs = document.querySelectorAll('#timeslotTable input, #timeslotTable2 input');
        let values = [];
        for (let i = 0; i < inputs.length; i++) {
            if (inputs[i].value !== '') {
                let value = parseInt(inputs[i].value);
                if (values.includes(value)) {
                    //alert('You cannot enter the same number twice!');
                    inputs[i].value = '';
                    updateGeneratedText();
                } else {
                    values.push(value);
                }
            }
        }
    }


    function updateGeneratedText() {
        var timeslotTable = document.getElementById('timeslotTable');
        var timeslotTable2 = document.getElementById('timeslotTable2');
        var dialTGInput = document.getElementById('dialTGInput');
        var voiceSelect = document.getElementById('voiceSelect');
        var languageSelect = document.getElementById('languageselect');
        var singleModeSelect = document.getElementById('singleModeSelect');
        var timeoutInput = document.getElementById('timeoutInput');
        var timeslots1 = [];
        var timeslots2 = [];
        for (var i = 0; i < timeslotTable.rows.length; i++) {
            var row = timeslotTable.rows[i];
            var timeslot = row.cells[1].querySelector('input').value;
            if (timeslot.trim() !== '') {
                timeslots1.push(timeslot);
            }
        }
        for (var i = 0; i < timeslotTable2.rows.length; i++) {
            var row = timeslotTable2.rows[i];
            var timeslot = row.cells[1].querySelector('input').value;
            if (timeslot.trim() !== '') {
                timeslots2.push(timeslot);
            }
        }
        var dialTGValue = dialTGInput.value;
        var voiceValue = voiceSelect.value;
        var languageValue = languageSelect.value;
        var singleModeValue = singleModeSelect.value;
        var timeoutValue = timeoutInput.value;
        var modeSelectorValue = <?php echo $devDetails['mode']; ?>;
        var genText = '';
        if (timeslots1.length > 0 && modeSelectorValue !== 4) {
            genText += 'TS1=' + timeslots1.join(',') + ';';
        }
        if (timeslots2.length > 0 && dialTGValue <= 0) {
            genText += 'TS2=' + timeslots2.join(',') + ';';
        }
        if (dialTGValue > 0) {
            genText += 'DIAL=' + dialTGValue + ';';
        }
        if (voiceValue !== '-1') {
            genText += 'VOICE=' + voiceValue + ';';
        }
        if (voiceValue === '1') {
            genText += 'LANG=' + languageValue + ';';
        }
        if (singleModeValue !== '-1') {
            genText += 'SINGLE=' + singleModeValue + ';';
        }
        if (timeoutValue > 0) {
            genText += 'TIMER=' + timeoutValue;
        }
        document.getElementById('genText').value = genText;
        checkDupes();
    }

    function toggleSpinner(showSpinner) {
        const spinner = document.querySelector('.spinner');
        const blurContent = document.querySelector('.blur-content');
        if (showSpinner) {
        spinner.style.display = 'block'; 
        blurContent.style.display = 'none'; 
        } else {
        spinner.style.display = 'none'; 
        blurContent.style.display = 'block'; 
        }
    }

    function checkModifiedStatus() {
        $.get('sscheck.php', function (data) {
        if (data === '0') {
            toggleSpinner(false);
            clearInterval(interval);
        }
        });
    }

    function saveChanges() {
        var genText = document.getElementById('genText');
        var genTextHidden = document.getElementById('genTextHidden');
        genTextHidden.value = genText.value;
        document.getElementById('saveChangesForm').submit();
    }

    var inputs = document.querySelectorAll('input, select');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', updateGeneratedText);
    }

    // Initial update of generated text
    updateGeneratedText();
    toggleTimeslotTable();
    toggleLanguageDropdown();

    toggleSpinner(<?php echo $devDetails['modified'] === '1' ? 'true' : 'false'; ?>);
    let interval = setInterval(checkModifiedStatus, 500); 

</script>
