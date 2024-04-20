<nav class="main-header navbar navbar-expand-lg navbar-light navbar-dark text-sm">
    <div class="container text-nowrap">
        <a href="#" class="navbar-brand">
            <img src="img/Logo_mini.png" alt="FreeDMR" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light"><?php echo $config['DASHBOARD']['DASHNAME']; ?></span>
        </a>
        <button class="navbar-toggler order-1" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="index.php?p=home" class="nav-link" id="nav_dash"></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=systems" class="nav-link" id="nav_lnksys"></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=systemstg" class="nav-link" id="nav_statg"></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=openbridge" class="nav-link" id="nav_opb"></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=toptg" class="nav-link" id="nav_tptg"></a>
                </li>
                <li class="nav-item">
                    <a href="index.php?p=monitor" class="nav-link" id="nav_mon"></a>
                </li>
                <!-- <li class="nav-item">
                    <a href="sslogin.php" class="nav-link">Self Service</a>
                </li> -->
                <li class="nav-item dropdown dropdown-hover">
                    <a id="dropdownSubMenu1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false" class="nav-link dropdown-toggle"><span
                            id="nav_info"></span></a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li>
                            <a href="index.php?p=calc" class="dropdown-item" id="nav_calc"></a>
                        </li>
                        <li>
                            <a href="index.php?p=wwtg" class="dropdown-item" id="nav_tglst"></a>
                        </li>
                        <li>
                            <a href="index.php?p=wwbridges" class="dropdown-item" id="nav_brdglst"></a>
                        </li>
                        <?php
                        if (isset($config['DASHBOARD']['SERVER_LIST'])) {
                            echo '<li><a href="index.php?p=wwservers" class="dropdown-item" id="nav_srvlst"></a></li>';
                        }
                        ?>
                    </ul>
                </li>
                <?php
                if (isset($config['DASHBOARD']['NAV_LNK_NAME']) && !empty($config['DASHBOARD']['NAV_LNK_NAME'])) {
                    $linksDropdownName = $config['DASHBOARD']['NAV_LNK_NAME'];
                    echo '<li class="nav-item dropdown dropdown-hover">';
                    echo '<a id="dropdownSubMenu1" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">';
                    echo '<span>' . $linksDropdownName . '</span></a>';
                    echo '<ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">';
                    for ($i = 1; isset($config['DASHBOARD']['LINK' . $i]); $i++) {
                        $linkInfo = explode(',', $config['DASHBOARD']['LINK' . $i]);
                        $linkName = trim($linkInfo[0]);
                        $linkURL = trim($linkInfo[1]);
                        
                        echo '<li><a target="_blank" href="' . $linkURL . '" class="dropdown-item">' . $linkName . '</a></li>';
                    }
                    
                    echo '</ul>';
                    echo '</li>';
                }
                ?>
            </ul>
        </div>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <?php
            // Telegram 
            if (isset($config['DASHBOARD']['TELEGRAM']) && !empty($config['DASHBOARD']['TELEGRAM'])) {
                    $telegramLink = $config['DASHBOARD']['TELEGRAM'];
                    echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="' . $telegramLink . '" role="button">';
                    echo '<i class="fab fa-telegram-plane"></i>';
                    echo '</a>';
                    echo '</li>';
            }
            // Whatsapp
            if (isset($config['DASHBOARD']['WHATSAPP']) && !empty($config['DASHBOARD']['WHATSAPP'])) {
                $whatsappLink = $config['DASHBOARD']['WHATSAPP'];
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . $whatsappLink . '" role="button">';
                echo '<i class="fab fa-whatsapp"></i>';
                echo '</a>';
                echo '</li>';
            }
            // Facebook
            if (isset($config['DASHBOARD']['FACEBOOK']) && !empty($config['DASHBOARD']['FACEBOOK'])) {
                $facebookLink = $config['DASHBOARD']['FACEBOOK'];
                echo '<li class="nav-item">';
                echo '<a class="nav-link" href="' . $facebookLink . '" role="button">';
                echo '<i class="fab fa-facebook"></i>';
                echo '</a>';
                echo '</li>';
            }      
            ?>
            <select class="form-select" id="languageSelect">
                <?php
                if (isset($config['DASHBOARD']['LANGUAGE']) && !empty($config['DASHBOARD']['LANGUAGE'])) {
                    $selectedLanguage = $config['DASHBOARD']['LANGUAGE'];
                } else {
                    $selectedLanguage = 'en';
                }
                $languages = array(
                    'pt' => 'PT',
                    'en' => 'EN',
                    'es' => 'ES',
                    'fr' => 'FR',
                    'it' => 'IT',
                    'nl' => 'NL',
                    'de' => 'DE',
                );
                if (array_key_exists($selectedLanguage, $languages)) {
                    $selectedLanguageName = $languages[$selectedLanguage];
                    unset($languages[$selectedLanguage]);
                }
                echo '<option value="' . $selectedLanguage . '">' . $selectedLanguageName . '</option>';
                foreach ($languages as $code => $name) {
                    echo '<option value="' . $code . '">' . $name . '</option>';
                }
                ?>
            </select>
            <li class="nav-item">
                <a class="nav-link" href="#" role="button" id="toggle-mode">
                    <i class="fas fa-adjust"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>
