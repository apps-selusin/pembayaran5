<!-- Begin Main Menu -->
<?php

// Generate all menu items
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(21, "mmi_cf01_home_php", $Language->MenuPhrase("21", "MenuText"), "cf01_home.php", -1, "", TRUE, FALSE, TRUE);
$RootMenu->AddMenuItem(4, "mmi_t04_siswa", $Language->MenuPhrase("4", "MenuText"), "t04_siswalist.php", -1, "", TRUE, FALSE, FALSE);
$RootMenu->AddMenuItem(16, "mmi_v01_siswa", $Language->MenuPhrase("16", "MenuText"), "v01_siswalist.php", -1, "", TRUE, FALSE, FALSE);
$RootMenu->AddMenuItem(22, "mmi_v06_siswa", $Language->MenuPhrase("22", "MenuText"), "v06_siswalist.php", -1, "", TRUE, FALSE, FALSE);
$RootMenu->Render();
?>
<!-- End Main Menu -->
