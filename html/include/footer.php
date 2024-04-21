<!-- Credits: SP2ONG 2019-2022 -->
<!-- Credits: OA4DOA 2022 -->
<!-- THIS COPYRIGHT NOTICE MUST BE DISPLAYED AS A CONDITION OF THE LICENCE GRANT FOR THIS SOFTWARE. ALL DERIVATEIVES WORKS MUST CARRY THIS NOTICE -->
<div class="text-center d-none d-sm-inline">
        <div><?php
        if (isset($config['DASHBOARD']['FOOTER1']) && !empty($config['DASHBOARD']['FOOTER1'])) {
            $footer1Value = $config['DASHBOARD']['FOOTER1'];
            echo $footer1Value . ' | ';
        }
        ?>The Regents of the K0USY Group. | <a
                        title="FDMR Monitor OA4DOA v270422" target="_blank"
                        href="https://github.com/yuvelq/FDMR-Monitor.git">OA4DOA</a> Version 2022 | <a title="CS8ABG Dash v24.04ss" href=https://github.com/CS8ABG/FDMR-Monitor.git>CS8ABG</a> Dashboard
                        <?php
        if (isset($config['DASHBOARD']['FOOTER2']) && !empty($config['DASHBOARD']['FOOTER2'])) {
            $footer2Value = $config['DASHBOARD']['FOOTER2'];
            echo ' | ' . $footer2Value;
        }
        ?>
                </div>
</div>