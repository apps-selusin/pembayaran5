<!-- Begin Main Menu -->
<?php

// Generate all menu items
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(21, "mmi_cf01_home_php", $Language->MenuPhrase("21", "MenuText"), "cf01_home.php", -1, "", TRUE, FALSE, TRUE);
$RootMenu->AddMenuItem(4, "mmi_t04_siswa", $Language->MenuPhrase("4", "MenuText"), "t04_siswalist.php", -1, "", TRUE, FALSE, FALSE);
$RootMenu->AddMenuItem(16, "mmi_v01_siswa", $Language->MenuPhrase("16", "MenuText"), "v01_siswalist.php", -1, "", TRUE, FALSE, FALSE);
$RootMenu->AddMenuItem(7, "mmi_t06_siswarutintemp", $Language->MenuPhrase("7", "MenuText"), "t06_siswarutintemplist.php?cmd=resetall", -1, "", TRUE, FALSE, FALSE);
$RootMenu->Render();
?>
<!-- End Main Menu -->
