<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title" id="clc_title"></h3>
                </div>
                <div class="card-body p-0">


                    <div class="row justify-content-center">
                        <div class="form-group col-2">
                            <div class="row justify-content-center">
                                <p class="mb-1"><b><span id="calc_type"></span></b>&nbsp;&nbsp;&nbsp;<i
                                        class="far fa-question-circle" data-bs-toggle="tooltip" data-bs-placement="top"
                                        data-bs-html="true" data-bs-title="" id="calchlptype"></i></p>
                            </div>
                            <select class="form-control form-control-sm" id="modeSelector" onchange="toggleTimeslotTable()">
                                <option value="Duplex">Duplex</option>
                                <option value="Simplex">Simplex</option>
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div id="timeslot1col" class="col-4">
                            <table class="table table-sm border align-middle">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="text-align: center;" class="align-middle">Time Slot
                                            1&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true"
                                                data-bs-title="" id="calchlpts1"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="timeslotTable">
                                    <tr>
                                        <td class="align-middle text-nowrap">TG 1:</td>
                                        <td><input type="number" class="form-control form-control-sm" min="0" step="1"></td>
                                        <td><button class="btn" onclick="removeRow(this)"><i class="fas fa-times text-danger"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary btn-xs" onclick="addRow('timeslotTable')"
                                    id="calc_addts1"></button>
                            </div>
                        </div>
                        <div id="timeslot2col" class="col-4">
                            <table class="table table-sm border align-middle">
                                <thead>
                                    <tr>
                                        <th colspan="3" style="text-align: center;" class="align-middle">Time Slot
                                            2&nbsp;&nbsp;&nbsp;<i class="far fa-question-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-html="true"
                                                data-bs-title="" id="calchlpts2"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="timeslotTable2">
                                    <tr>
                                        <td class="align-middle text-nowrap">TG 1:</td>
                                        <td><input type="number" class="form-control form-control-sm" min="0" step="1"></td>
                                        <td><button class="btn" onclick="removeRow(this)"><i class="fas fa-times text-danger"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row justify-content-center">
                                <button class="btn btn-primary btn-xs" onclick="addRow('timeslotTable2')"
                                    id="calc_addts2"></button>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <table class="table table-sm table-sm border mt-4">
                                <tbody>
                                    <tr>
                                        <td class="align-middle text-nowrap"><span
                                                id="calc_dialtg"></span>&nbsp;&nbsp;&nbsp;<i
                                                class="far fa-question-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-html="true" data-bs-title=""
                                                id="calchlpdtg"></i></td>
                                        <td><input type="number" class="form-control form-control-sm" min="0" step="1" id="dialTGInput"
                                                value="0" oninput="toggleTimeslot2(this.value)"></td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-nowrap"><span
                                                id="calc_voice"></span>&nbsp;&nbsp;&nbsp;<i
                                                class="far fa-question-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-html="true" data-bs-title=""
                                                id="calchlpvoice"></i></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="voiceSelect"
                                                onchange="toggleLanguageDropdown()">
                                                <option value="-1" id="calc_voicesrv" selected></option>
                                                <option value="0" id="calc_voiceoff"></option>
                                                <option value="1" id="calc_voiceon"></option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr id="languagerow">
                                        <td class="align-middle text-nowrap"><span
                                                id="calc_lang"></span>&nbsp;&nbsp;&nbsp;<i
                                                class="far fa-question-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-html="true" data-bs-title=""
                                                id="calchlplang"></i></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="languageselect">
                                                <option value="en_GB">English (en_GB)</option>
                                                <option value="en_US">English (en_US)</option>
                                                <option value="es_ES">Spanish (es_ES)</option>
                                                <option value="fr_FR">French (fr_FR)</option>
                                                <option value="de_DE">German (de_DE)</option>
                                                <option value="dk_DK">Danish (dk_DK)</option>
                                                <option value="it_IT">Italian (it_IT)</option>
                                                <option value="no_NO">Norwegian (no_NO)</option>
                                                <option value="pl_PL">Polish (pl_PL)</option>
                                                <option value="se_SE">Swedish (se_SE)</option>
                                                <option value="pt_PT">Portuguese (pt_PT)</option>
                                                <option value="cy_GB">Welsh (cy_GB)</option>
                                                <option value="el_GR">Greek (el_GR)</option>
                                                <option value="CW">CW</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-nowrap"><span
                                                id="calc_smode"></span>&nbsp;&nbsp;&nbsp;<i
                                                class="far fa-question-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-html="true" data-bs-title=""
                                                id="calchlpsmode"></i></td>
                                        <td>
                                            <select class="form-control form-control-sm" id="singleModeSelect">
                                                <option value="-1" id="calc_smodesrv" selected></option>
                                                <option value="0" id="calc_smodeoff"></option>
                                                <option value="1" id="calc_smodeon"></option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="align-middle text-nowrap"><span
                                                id="calc_tgto"></span>&nbsp;&nbsp;&nbsp;<i
                                                class="far fa-question-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="top" data-bs-html="true" data-bs-title=""
                                                id="calchlpstgto"></i></td>
                                        <td><input type="number" class="form-control form-control-sm" min="0" step="1" id="timeoutInput"
                                                value="0"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-2 mb-4">
                        <div class="col-11">
                            <img src="../img/wpsd.png" width="100%">
                        </div>
                    </div>


                    <div class="row justify-content-center mb-3">
                        <div class="col-5">
                            <div class="row justify-content-center">
                                <p class="mb-1"><b>DMR Gateway</b></p>
                            </div>
                            <textarea class="form-control text-sm form-control-sm" id="generatedOptionsQuotes" rows="2"
                                readonly></textarea>
                            <div class="row justify-content-center mt-4 mb-4">
                                <button class="btn btn-primary mt-2"
                                    onclick="copyToClipboard('generatedOptionsQuotes')" id="calc_copy1">
                                </button>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row justify-content-center">
                                <p class="mb-1"><b>DMR Options=</b></p>
                            </div>
                            <textarea class="form-control text-sm form-control-sm" id="generatedOptions" rows="2"
                                readonly></textarea>
                            <div class="row justify-content-center mt-4 mb-4">
                                <button class="btn btn-primary mt-2"
                                    onclick="copyToClipboard('generatedOptions')" id="calc_copy2">
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    function toggleTimeslotTable() {
        var modeSelector = document.getElementById('modeSelector');
        var timeslot1Col = document.getElementById('timeslot1col');
        

        if (modeSelector.value === 'Simplex') {
            timeslot1Col.style.display = 'none';
        } else {
            timeslot1Col.style.display = 'block';
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
                    inputs[i].value = '';
                    updateGeneratedText();
                } else {
                    values.push(value);
                }
            }
        }
    }

    function copyToClipboard(elementId) {
        var generatedText = document.getElementById(elementId);
        generatedText.select();
        document.execCommand('copy');
        alert(generatedText.value);
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
        var modeSelectorValue = modeSelector.value;
        // Generate the text without quotes
        var generatedOptions = '';
        if (timeslots1.length > 0 && modeSelectorValue === 'Duplex') {
            generatedOptions += 'TS1=' + timeslots1.join(',') + ';';
        }
        if (timeslots2.length > 0 && dialTGValue <= 0) {
            generatedOptions += 'TS2=' + timeslots2.join(',') + ';';
        }
        if (dialTGValue > 0) {
            generatedOptions += 'DIAL=' + dialTGValue + ';';
        }
        if (voiceValue !== '-1') {
            generatedOptions += 'VOICE=' + voiceValue + ';';
        }
        if (voiceValue === '1') {
            generatedOptions += 'LANG=' + languageValue + ';';
        }
        if (singleModeValue !== '-1') {
            generatedOptions += 'SINGLE=' + singleModeValue + ';';
        }
        if (timeoutValue > 0) {
            generatedOptions += 'TIMER=' + timeoutValue + ';';
        }
        var generatedOptionsQuotes = '';
        if (generatedOptions > '1') {
            generatedOptionsQuotes += 'Options="'+ generatedOptions + '"';
        }
        
        document.getElementById('generatedOptionsQuotes').value = generatedOptionsQuotes;
        document.getElementById('generatedOptions').value = generatedOptions;
        checkDupes();
    }

    // Update generated text when inputs change
    var inputs = document.querySelectorAll('input, select');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', updateGeneratedText);
    }

    // Initial update of generated text
    updateGeneratedText();
    toggleTimeslotTable();
    toggleLanguageDropdown();
</script>