<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark text-sm">
    <div class="container text-nowrap">
        <a href="#" class="navbar-brand">
            <img src="img/Logo_mini.png" alt="FreeDMR" class="brand-image img-circle elevation-3"
                style="opacity: .8">
            <span class="brand-text font-weight-light">FreeDMR</span>
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
                <li class="nav-item">
                    <a href="sslogin.php" class="nav-link">Self Service</a>
                </li>
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
                        <!-- <li>
                            <a href="index.php?p=wwservers" class="dropdown-item" id="nav_srvlst"></a>
                        </li> -->
                    </ul>
                </li>
            </ul>
        </div>
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
            <!-- PUT SOME ICON LINKS HERE -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="" role="button">
                    <i class="fab fa-telegram-plane"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/FreeDMR.United.Kingdom" role="button">
                    <i class="fab fa-facebook"></i>
                </a>
            </li> -->
            <!-- PUT YOUR LANGUAGE IN 1ST TO DEFAULT -->
            <select class="form-select" id="languageSelect">
                <option value="pt">PT</option>
                <option value="en">EN</option>
                <option value="es">ES</option>
                <option value="fr">FR</option>
                <option value="it">IT</option>
                <option value="nl">NL</option>
                <option value="de">DE</option>
            </select>
            <li class="nav-item">
                <a class="nav-link" href="#" role="button" id="toggle-mode">
                    <i class="fas fa-adjust"></i>
                </a>
            </li>
        </ul>
    </div>
</nav>