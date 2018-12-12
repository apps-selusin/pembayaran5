<!-- Begin Main Menu -->
<?php

// Generate all menu items
$RootMenu->IsRoot = TRUE;
$RootMenu->AddMenuItem(23, "mmi_r01_siswarutinbayar", $ReportLanguage->Phrase("DetailSummaryReportMenuItemPrefix") . $ReportLanguage->MenuPhrase("23", "MenuText") . $ReportLanguage->Phrase("DetailSummaryReportMenuItemSuffix"), "r01_siswarutinbayarsmry.php", -1, "", TRUE, FALSE);
$RootMenu->Render();
?>
<!-- End Main Menu -->
