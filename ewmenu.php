<!-- Begin Main Menu -->
<?php $RootMenu = new cMenu(EW_MENUBAR_ID) ?>
<?php

// Generate all menu items
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(21, "mi_cf01_home_php", $Language->MenuPhrase("21", "MenuText"), "cf01_home.php", -1, "", TRUE, FALSE, TRUE);
$RootMenu->AddMenuItem(4, "mi_t04_siswa", $Language->MenuPhrase("4", "MenuText"), "t04_siswalist.php", -1, "", TRUE, FALSE, FALSE);
$RootMenu->AddMenuItem(16, "mi_v01_siswa", $Language->MenuPhrase("16", "MenuText"), "v01_siswalist.php", -1, "", TRUE, FALSE, FALSE);
$RootMenu->AddMenuItem(10023, "mri_r015fsiswarutinbayar", $Language->MenuPhrase("10023", "MenuText"), "r01_siswarutinbayarsmry.php", -1, "{371AB69E-83C7-4715-818D-BAEB6D2CFBF4}", TRUE, FALSE, FALSE);
$RootMenu->Render();
?>
<!-- End Main Menu -->
