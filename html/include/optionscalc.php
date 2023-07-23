<script type="text/javascript">
    document.getElementById("timeslot1-1").disabled = true;
    document.getElementById("timeslot1-2").disabled = true;
    document.getElementById("timeslot1-3").disabled = true;
    document.getElementById("timeslot1-4").disabled = true;
    document.getElementById("timeslot1-5").disabled = true;

    function ShowHideDiv() {
        var chkDuplex = document.getElementById("duplex")
        var timeslot11 = document.getElementById("timeslot1-1");
        var timeslot12 = document.getElementById("timeslot1-2");
        var timeslot13 = document.getElementById("timeslot1-3");
        var timeslot14 = document.getElementById("timeslot1-4");
        var timeslot15 = document.getElementById("timeslot1-5");

        timeslot11.disabled = chkDuplex.checked ? false : true
        timeslot12.disabled = chkDuplex.checked ? false : true
        timeslot13.disabled = chkDuplex.checked ? false : true
        timeslot14.disabled = chkDuplex.checked ? false : true
        timeslot15.disabled = chkDuplex.checked ? false : true
    }

</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title" id="tbl_bridges">Options Calculator</h3>
                </div>
                <div class="card-body p-0">
                    <p class="p2">This tool is used to help generate the "string" needed for the options field.<br> e.g
                        Static Talkgroups and Configurations in Pi-Star / MMDVM / DMRGateway.</p>
                    <p class="p4">Duplex Hotspots can use TS1 and/or TS2</p>
                    <p class="p4">Simplex Hotspots can only use TS2</p>
                    <p class="p2">Type in the Talk Groups and Settings you want. <br>
                        Click "Generate Pi-Star Options"</p>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <input type="hidden" name="generate" value="yes">
                        <p class="p2">Duplex: <input type="radio" id="duplex" name="hotspot" value="duplex"
                                onclick="ShowHideDiv()" /> Simplex: <input type="radio" id="simplex" name="hotspot"
                                value="simplex" onclick="ShowHideDiv()" checked /></p>
                        <table border="1">
                            <tbody>
                                <td class="p2">
                                    <center><b>Timeslot 1</center></b>
                                </td>
                                <td class="p2">
                                    <center><b>Timeslot 2</center></b>
                                </td>
                                </tr>
                                <p class="p6">If you plan on using &nbsp; Dial-a-TG &nbsp; DO NOT set any Static Talk
                                    Groups on Slot 2</p>
                                <tr>
                                    <td class="p2">&nbsp; TG 1 (leave 0 for none): <input type="text" id="timeslot1-1"
                                            name="timeslot1[]" size="10" value="0" disabled=""></td>
                                    <td class="p2">&nbsp; TG 1 (leave 0 for none): <input type="text" id="timeslot2"
                                            name="timeslot2[]" size="10" value="0"></td>
                                    <td>
                                        <p class="p6">&nbsp;If using Dial-a-TG leave all as 0&nbsp;&nbsp;</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p2">&nbsp; TG 2 (leave 0 for none): <input type="text" id="timeslot1-2"
                                            name="timeslot1[]" size="10" value="0" disabled=""></td>
                                    <td class="p2">&nbsp; TG 2 (leave 0 for none): <input type="text" id="timeslot2"
                                            name="timeslot2[]" size="10" value="0"></td>
                                    <td>
                                        <p class="p6">&nbsp;on Slot 2</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p2">&nbsp; TG 3 (leave 0 for none): <input type="text" id="timeslot1-3"
                                            name="timeslot1[]" size="10" value="0" disabled=""></td>
                                    <td class="p2">&nbsp; TG 3 (leave 0 for none): <input type="text" id="timeslot2"
                                            name="timeslot2[]" size="10" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="p2">&nbsp; TG 4 (leave 0 for none): <input type="text" id="timeslot1-4"
                                            name="timeslot1[]" size="10" value="0" disabled=""></td>
                                    <td class="p2">&nbsp; TG 4 (leave 0 for none): <input type="text" id="timeslot2"
                                            name="timeslot2[]" size="10" value="0"></td>
                                </tr>
                                <tr>
                                    <td class="p2">&nbsp; TG 5 (leave 0 for none): <input type="text" id="timeslot1-5"
                                            name="timeslot1[]" size="10" value="0" disabled=""></td>
                                    <td class="p2">&nbsp; TG 5 (leave 0 for none): <input type="text" id="timeslot2"
                                            name="timeslot2[]" size="10" value="0"></td>
                                </tr>
                        </table>
                        <script>
                            document.getElementById("timeslot1-1").disabled = true;
                            document.getElementById("timeslot1-2").disabled = true;
                            document.getElementById("timeslot1-3").disabled = true;
                            document.getElementById("timeslot1-4").disabled = true;
                            document.getElementById("timeslot1-5").disabled = true;
                        </script>
                        <br>
                        <table border="1">
                            <tr>
                                <td class="p2">&nbsp; Dial-a-TG</td>
                                <td class="p2">&nbsp; 0 or TG</td>
                                <td><input type="text" name="dial" size="10" value="0"></td>
                            </tr>
                            <tr>
                                <td class="p2">&nbsp; Voice Identification &nbsp;</td>
                                <td class="p2">&nbsp; 0 off or 1 on &nbsp;</td>
                                <td><input type="text" name="voice" size="2" value="1"></td>
                            </tr>
                            <tr>
                                <td class="p2">&nbsp; Language</td>
                                <td class="p2">&nbsp; en_GB &nbsp;</td>
                                <td><input type="text" name="lang" size="7" value="en_GB"></td>
                            </tr>
                            <tr>
                                <td class="p2">&nbsp; Single Mode</td>
                                <td class="p2">&nbsp; 0 off or 1 on &nbsp;</td>
                                <td><input type="text" name="single" size="2" value="1"></td>
                            </tr>
                            <tr>
                                <td class="p2">&nbsp; TG Timeout</td>
                                <td class="p2">&nbsp; Minutes</td>
                                <td><input type="text" name="timeout" size="5" value="10"></td>
                            </tr>
                        </table>
                        <br>
                        <input type="submit" value="Generate Pi-Star Options">
                        <br><br>
                        <?php
                        function myFilter($var) {
                            return ($var !== NULL && $var !== FALSE && $var !== "" && $var !== "0");
                        }

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if ($_POST['generate'] == "yes") {
                                $dmrgateway = "Options=\"";
                                if (!empty($_POST["timeslot1"])) {
                                    $ts1result = array_filter($_POST["timeslot1"], "myFilter");
                                    for ($i=0; $i < count($ts1result)+3; $i++) {
                                    $ts1 .= $ts1result[$i];
                                    $next = $i+1;
                                    if (isset($ts1result[$next])) {
                                        $ts1 .= ",";
                                    }
                                    }
                                    if($ts1 !== "") {
                                    $ts1out = "TS1=$ts1;";
                                    }
                                }

                                if (!empty($_POST["timeslot2"])) {
                                    $ts2result = array_filter($_POST["timeslot2"], "myFilter");
                                    for ($i=0; $i < count($ts2result)+3; $i++) {
                                    if ($ts2result[$i] !== "0") {
                                        $ts2 .= $ts2result[$i];
                                    }
                                    $prev = $i-1;
                                    $next = $i+1;
                                    if (isset($ts2result[$next])) {
                                        $ts2 .= ",";
                                    }
                                    }
                                    if($ts2 !== "") {
                                    $ts2out = "TS2=$ts2;";
                                    }
                                }

                            echo "<p class=\"p2\">Results:</p>\n";
                                $rest = "DIAL=".$_POST["dial"].";VOICE=".$_POST["voice"].";LANG=".$_POST["lang"].";SINGLE=".$_POST["single"].";TIMER=".$_POST["timeout"];
                                ## Display the lines.
                                echo "<p class=\"p4\">DMRGateway:&nbsp;&nbsp;&nbsp;&nbsp;".$dmrgateway.$ts1out.$ts2out.$rest.";\"</p>";
                                echo "<p class=\"p2\">DMR Options=:&nbsp;&nbsp;&nbsp;&nbsp;".$ts1out.$ts2out.$rest.";</p>";
                            }
                        }
                        ?>
                        <br>
                        <p class="p2">( Copy & paste the "string" when generated above into the "Options= field" in your
                            device. )<br></p>
                        <br><br><br>
                        <p class="p4">Options Calculator by <a title="" href="https://github.com/nessenj"
                                target="_blank" rel="noopener"><span style="color: #20bd67;">Jim Nessen</span></a>
                            K6JWN.</p>
                        <br>
                        <br>
                        <br>
                </div>
            </div>
        </div>
    </div>
</div>