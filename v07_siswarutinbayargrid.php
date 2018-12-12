<?php

// Create page object
if (!isset($v07_siswarutinbayar_grid)) $v07_siswarutinbayar_grid = new cv07_siswarutinbayar_grid();

// Page init
$v07_siswarutinbayar_grid->Page_Init();

// Page main
$v07_siswarutinbayar_grid->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v07_siswarutinbayar_grid->Page_Render();
?>
<?php if ($v07_siswarutinbayar->Export == "") { ?>
<script type="text/javascript">

// Form object
var fv07_siswarutinbayargrid = new ew_Form("fv07_siswarutinbayargrid", "grid");
fv07_siswarutinbayargrid.FormKeyCountName = '<?php echo $v07_siswarutinbayar_grid->FormKeyCountName ?>';

// Validate form
fv07_siswarutinbayargrid.Validate = function() {
	if (!this.ValidateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.GetForm(), $fobj = $(fobj);
	if ($fobj.find("#a_confirm").val() == "F")
		return true;
	var elm, felm, uelm, addcnt = 0;
	var $k = $fobj.find("#" + this.FormKeyCountName); // Get key_count
	var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
	var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
	var gridinsert = $fobj.find("#a_list").val() == "gridinsert";
	for (var i = startcnt; i <= rowcnt; i++) {
		var infix = ($k[0]) ? String(i) : "";
		$fobj.data("rowindex", infix);
		var checkrow = (gridinsert) ? !this.EmptyRow(infix) : true;
		if (checkrow) {
			addcnt++;
			elm = this.GetElements("x" + infix + "_rutin_id");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $v07_siswarutinbayar->rutin_id->FldCaption(), $v07_siswarutinbayar->rutin_id->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_rutin_id");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($v07_siswarutinbayar->rutin_id->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_a_Nilai");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $v07_siswarutinbayar->a_Nilai->FldCaption(), $v07_siswarutinbayar->a_Nilai->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_a_Nilai");
			if (elm && !ew_CheckNumber(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($v07_siswarutinbayar->a_Nilai->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_Tanggal_Bayar");
			if (elm && !ew_CheckDateDef(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($v07_siswarutinbayar->Tanggal_Bayar->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_Nilai_Bayar");
			if (elm && !ew_CheckNumber(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($v07_siswarutinbayar->Nilai_Bayar->FldErrMsg()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
		} // End Grid Add checking
	}
	return true;
}

// Check empty row
fv07_siswarutinbayargrid.EmptyRow = function(infix) {
	var fobj = this.Form;
	if (ew_ValueChanged(fobj, infix, "rutin_id", false)) return false;
	if (ew_ValueChanged(fobj, infix, "a_Nilai", false)) return false;
	if (ew_ValueChanged(fobj, infix, "Tanggal_Bayar", false)) return false;
	if (ew_ValueChanged(fobj, infix, "Nilai_Bayar", false)) return false;
	if (ew_ValueChanged(fobj, infix, "Periode_Text", false)) return false;
	return true;
}

// Form_CustomValidate event
fv07_siswarutinbayargrid.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fv07_siswarutinbayargrid.ValidateRequired = true;
<?php } else { ?>
fv07_siswarutinbayargrid.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
fv07_siswarutinbayargrid.Lists["x_rutin_id"] = {"LinkField":"x_id","Ajax":true,"AutoFill":false,"DisplayFields":["x_Jenis","","",""],"ParentFields":[],"ChildFields":[],"FilterFields":[],"Options":[],"Template":"","LinkTable":"t05_rutin"};

// Form object for search
</script>
<?php } ?>
<?php
if ($v07_siswarutinbayar->CurrentAction == "gridadd") {
	if ($v07_siswarutinbayar->CurrentMode == "copy") {
		$bSelectLimit = $v07_siswarutinbayar_grid->UseSelectLimit;
		if ($bSelectLimit) {
			$v07_siswarutinbayar_grid->TotalRecs = $v07_siswarutinbayar->SelectRecordCount();
			$v07_siswarutinbayar_grid->Recordset = $v07_siswarutinbayar_grid->LoadRecordset($v07_siswarutinbayar_grid->StartRec-1, $v07_siswarutinbayar_grid->DisplayRecs);
		} else {
			if ($v07_siswarutinbayar_grid->Recordset = $v07_siswarutinbayar_grid->LoadRecordset())
				$v07_siswarutinbayar_grid->TotalRecs = $v07_siswarutinbayar_grid->Recordset->RecordCount();
		}
		$v07_siswarutinbayar_grid->StartRec = 1;
		$v07_siswarutinbayar_grid->DisplayRecs = $v07_siswarutinbayar_grid->TotalRecs;
	} else {
		$v07_siswarutinbayar->CurrentFilter = "0=1";
		$v07_siswarutinbayar_grid->StartRec = 1;
		$v07_siswarutinbayar_grid->DisplayRecs = $v07_siswarutinbayar->GridAddRowCount;
	}
	$v07_siswarutinbayar_grid->TotalRecs = $v07_siswarutinbayar_grid->DisplayRecs;
	$v07_siswarutinbayar_grid->StopRec = $v07_siswarutinbayar_grid->DisplayRecs;
} else {
	$bSelectLimit = $v07_siswarutinbayar_grid->UseSelectLimit;
	if ($bSelectLimit) {
		if ($v07_siswarutinbayar_grid->TotalRecs <= 0)
			$v07_siswarutinbayar_grid->TotalRecs = $v07_siswarutinbayar->SelectRecordCount();
	} else {
		if (!$v07_siswarutinbayar_grid->Recordset && ($v07_siswarutinbayar_grid->Recordset = $v07_siswarutinbayar_grid->LoadRecordset()))
			$v07_siswarutinbayar_grid->TotalRecs = $v07_siswarutinbayar_grid->Recordset->RecordCount();
	}
	$v07_siswarutinbayar_grid->StartRec = 1;
	$v07_siswarutinbayar_grid->DisplayRecs = $v07_siswarutinbayar_grid->TotalRecs; // Display all records
	if ($bSelectLimit)
		$v07_siswarutinbayar_grid->Recordset = $v07_siswarutinbayar_grid->LoadRecordset($v07_siswarutinbayar_grid->StartRec-1, $v07_siswarutinbayar_grid->DisplayRecs);

	// Set no record found message
	if ($v07_siswarutinbayar->CurrentAction == "" && $v07_siswarutinbayar_grid->TotalRecs == 0) {
		if ($v07_siswarutinbayar_grid->SearchWhere == "0=101")
			$v07_siswarutinbayar_grid->setWarningMessage($Language->Phrase("EnterSearchCriteria"));
		else
			$v07_siswarutinbayar_grid->setWarningMessage($Language->Phrase("NoRecord"));
	}
}
$v07_siswarutinbayar_grid->RenderOtherOptions();
?>
<?php $v07_siswarutinbayar_grid->ShowPageHeader(); ?>
<?php
$v07_siswarutinbayar_grid->ShowMessage();
?>
<?php if ($v07_siswarutinbayar_grid->TotalRecs > 0 || $v07_siswarutinbayar->CurrentAction <> "") { ?>
<div class="panel panel-default ewGrid v07_siswarutinbayar">
<div id="fv07_siswarutinbayargrid" class="ewForm form-inline">
<div id="gmp_v07_siswarutinbayar" class="<?php if (ew_IsResponsiveLayout()) { echo "table-responsive "; } ?>ewGridMiddlePanel">
<table id="tbl_v07_siswarutinbayargrid" class="table ewTable">
<?php echo $v07_siswarutinbayar->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Header row
$v07_siswarutinbayar_grid->RowType = EW_ROWTYPE_HEADER;

// Render list options
$v07_siswarutinbayar_grid->RenderListOptions();

// Render list options (header, left)
$v07_siswarutinbayar_grid->ListOptions->Render("header", "left");
?>
<?php if ($v07_siswarutinbayar->rutin_id->Visible) { // rutin_id ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->rutin_id) == "") { ?>
		<th data-name="rutin_id"><div id="elh_v07_siswarutinbayar_rutin_id" class="v07_siswarutinbayar_rutin_id"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->rutin_id->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rutin_id"><div><div id="elh_v07_siswarutinbayar_rutin_id" class="v07_siswarutinbayar_rutin_id">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->rutin_id->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->rutin_id->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->rutin_id->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php if ($v07_siswarutinbayar->a_Nilai->Visible) { // a_Nilai ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->a_Nilai) == "") { ?>
		<th data-name="a_Nilai"><div id="elh_v07_siswarutinbayar_a_Nilai" class="v07_siswarutinbayar_a_Nilai"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->a_Nilai->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="a_Nilai"><div><div id="elh_v07_siswarutinbayar_a_Nilai" class="v07_siswarutinbayar_a_Nilai">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->a_Nilai->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->a_Nilai->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->a_Nilai->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php if ($v07_siswarutinbayar->Tanggal_Bayar->Visible) { // Tanggal_Bayar ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Tanggal_Bayar) == "") { ?>
		<th data-name="Tanggal_Bayar"><div id="elh_v07_siswarutinbayar_Tanggal_Bayar" class="v07_siswarutinbayar_Tanggal_Bayar"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Tanggal_Bayar->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal_Bayar"><div><div id="elh_v07_siswarutinbayar_Tanggal_Bayar" class="v07_siswarutinbayar_Tanggal_Bayar">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Tanggal_Bayar->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->Tanggal_Bayar->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->Tanggal_Bayar->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php if ($v07_siswarutinbayar->Nilai_Bayar->Visible) { // Nilai_Bayar ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Nilai_Bayar) == "") { ?>
		<th data-name="Nilai_Bayar"><div id="elh_v07_siswarutinbayar_Nilai_Bayar" class="v07_siswarutinbayar_Nilai_Bayar"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Nilai_Bayar->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nilai_Bayar"><div><div id="elh_v07_siswarutinbayar_Nilai_Bayar" class="v07_siswarutinbayar_Nilai_Bayar">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Nilai_Bayar->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->Nilai_Bayar->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->Nilai_Bayar->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php if ($v07_siswarutinbayar->Periode_Text->Visible) { // Periode_Text ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Periode_Text) == "") { ?>
		<th data-name="Periode_Text"><div id="elh_v07_siswarutinbayar_Periode_Text" class="v07_siswarutinbayar_Periode_Text"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Periode_Text->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode_Text"><div><div id="elh_v07_siswarutinbayar_Periode_Text" class="v07_siswarutinbayar_Periode_Text">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Periode_Text->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->Periode_Text->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->Periode_Text->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$v07_siswarutinbayar_grid->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$v07_siswarutinbayar_grid->StartRec = 1;
$v07_siswarutinbayar_grid->StopRec = $v07_siswarutinbayar_grid->TotalRecs; // Show all records

// Restore number of post back records
if ($objForm) {
	$objForm->Index = -1;
	if ($objForm->HasValue($v07_siswarutinbayar_grid->FormKeyCountName) && ($v07_siswarutinbayar->CurrentAction == "gridadd" || $v07_siswarutinbayar->CurrentAction == "gridedit" || $v07_siswarutinbayar->CurrentAction == "F")) {
		$v07_siswarutinbayar_grid->KeyCount = $objForm->GetValue($v07_siswarutinbayar_grid->FormKeyCountName);
		$v07_siswarutinbayar_grid->StopRec = $v07_siswarutinbayar_grid->StartRec + $v07_siswarutinbayar_grid->KeyCount - 1;
	}
}
$v07_siswarutinbayar_grid->RecCnt = $v07_siswarutinbayar_grid->StartRec - 1;
if ($v07_siswarutinbayar_grid->Recordset && !$v07_siswarutinbayar_grid->Recordset->EOF) {
	$v07_siswarutinbayar_grid->Recordset->MoveFirst();
	$bSelectLimit = $v07_siswarutinbayar_grid->UseSelectLimit;
	if (!$bSelectLimit && $v07_siswarutinbayar_grid->StartRec > 1)
		$v07_siswarutinbayar_grid->Recordset->Move($v07_siswarutinbayar_grid->StartRec - 1);
} elseif (!$v07_siswarutinbayar->AllowAddDeleteRow && $v07_siswarutinbayar_grid->StopRec == 0) {
	$v07_siswarutinbayar_grid->StopRec = $v07_siswarutinbayar->GridAddRowCount;
}

// Initialize aggregate
$v07_siswarutinbayar->RowType = EW_ROWTYPE_AGGREGATEINIT;
$v07_siswarutinbayar->ResetAttrs();
$v07_siswarutinbayar_grid->RenderRow();
if ($v07_siswarutinbayar->CurrentAction == "gridadd")
	$v07_siswarutinbayar_grid->RowIndex = 0;
if ($v07_siswarutinbayar->CurrentAction == "gridedit")
	$v07_siswarutinbayar_grid->RowIndex = 0;
while ($v07_siswarutinbayar_grid->RecCnt < $v07_siswarutinbayar_grid->StopRec) {
	$v07_siswarutinbayar_grid->RecCnt++;
	if (intval($v07_siswarutinbayar_grid->RecCnt) >= intval($v07_siswarutinbayar_grid->StartRec)) {
		$v07_siswarutinbayar_grid->RowCnt++;
		if ($v07_siswarutinbayar->CurrentAction == "gridadd" || $v07_siswarutinbayar->CurrentAction == "gridedit" || $v07_siswarutinbayar->CurrentAction == "F") {
			$v07_siswarutinbayar_grid->RowIndex++;
			$objForm->Index = $v07_siswarutinbayar_grid->RowIndex;
			if ($objForm->HasValue($v07_siswarutinbayar_grid->FormActionName))
				$v07_siswarutinbayar_grid->RowAction = strval($objForm->GetValue($v07_siswarutinbayar_grid->FormActionName));
			elseif ($v07_siswarutinbayar->CurrentAction == "gridadd")
				$v07_siswarutinbayar_grid->RowAction = "insert";
			else
				$v07_siswarutinbayar_grid->RowAction = "";
		}

		// Set up key count
		$v07_siswarutinbayar_grid->KeyCount = $v07_siswarutinbayar_grid->RowIndex;

		// Init row class and style
		$v07_siswarutinbayar->ResetAttrs();
		$v07_siswarutinbayar->CssClass = "";
		if ($v07_siswarutinbayar->CurrentAction == "gridadd") {
			if ($v07_siswarutinbayar->CurrentMode == "copy") {
				$v07_siswarutinbayar_grid->LoadRowValues($v07_siswarutinbayar_grid->Recordset); // Load row values
				$v07_siswarutinbayar_grid->SetRecordKey($v07_siswarutinbayar_grid->RowOldKey, $v07_siswarutinbayar_grid->Recordset); // Set old record key
			} else {
				$v07_siswarutinbayar_grid->LoadDefaultValues(); // Load default values
				$v07_siswarutinbayar_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$v07_siswarutinbayar_grid->LoadRowValues($v07_siswarutinbayar_grid->Recordset); // Load row values
		}
		$v07_siswarutinbayar->RowType = EW_ROWTYPE_VIEW; // Render view
		if ($v07_siswarutinbayar->CurrentAction == "gridadd") // Grid add
			$v07_siswarutinbayar->RowType = EW_ROWTYPE_ADD; // Render add
		if ($v07_siswarutinbayar->CurrentAction == "gridadd" && $v07_siswarutinbayar->EventCancelled && !$objForm->HasValue("k_blankrow")) // Insert failed
			$v07_siswarutinbayar_grid->RestoreCurrentRowFormValues($v07_siswarutinbayar_grid->RowIndex); // Restore form values
		if ($v07_siswarutinbayar->CurrentAction == "gridedit") { // Grid edit
			if ($v07_siswarutinbayar->EventCancelled) {
				$v07_siswarutinbayar_grid->RestoreCurrentRowFormValues($v07_siswarutinbayar_grid->RowIndex); // Restore form values
			}
			if ($v07_siswarutinbayar_grid->RowAction == "insert")
				$v07_siswarutinbayar->RowType = EW_ROWTYPE_ADD; // Render add
			else
				$v07_siswarutinbayar->RowType = EW_ROWTYPE_EDIT; // Render edit
		}
		if ($v07_siswarutinbayar->CurrentAction == "gridedit" && ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT || $v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD) && $v07_siswarutinbayar->EventCancelled) // Update failed
			$v07_siswarutinbayar_grid->RestoreCurrentRowFormValues($v07_siswarutinbayar_grid->RowIndex); // Restore form values
		if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT) // Edit row
			$v07_siswarutinbayar_grid->EditRowCnt++;
		if ($v07_siswarutinbayar->CurrentAction == "F") // Confirm row
			$v07_siswarutinbayar_grid->RestoreCurrentRowFormValues($v07_siswarutinbayar_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$v07_siswarutinbayar->RowAttrs = array_merge($v07_siswarutinbayar->RowAttrs, array('data-rowindex'=>$v07_siswarutinbayar_grid->RowCnt, 'id'=>'r' . $v07_siswarutinbayar_grid->RowCnt . '_v07_siswarutinbayar', 'data-rowtype'=>$v07_siswarutinbayar->RowType));

		// Render row
		$v07_siswarutinbayar_grid->RenderRow();

		// Render list options
		$v07_siswarutinbayar_grid->RenderListOptions();

		// Skip delete row / empty row for confirm page
		if ($v07_siswarutinbayar_grid->RowAction <> "delete" && $v07_siswarutinbayar_grid->RowAction <> "insertdelete" && !($v07_siswarutinbayar_grid->RowAction == "insert" && $v07_siswarutinbayar->CurrentAction == "F" && $v07_siswarutinbayar_grid->EmptyRow())) {
?>
	<tr<?php echo $v07_siswarutinbayar->RowAttributes() ?>>
<?php

// Render list options (body, left)
$v07_siswarutinbayar_grid->ListOptions->Render("body", "left", $v07_siswarutinbayar_grid->RowCnt);
?>
	<?php if ($v07_siswarutinbayar->rutin_id->Visible) { // rutin_id ?>
		<td data-name="rutin_id"<?php echo $v07_siswarutinbayar->rutin_id->CellAttributes() ?>>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_rutin_id" class="form-group v07_siswarutinbayar_rutin_id">
<?php
$wrkonchange = trim(" " . @$v07_siswarutinbayar->rutin_id->EditAttrs["onchange"]);
if ($wrkonchange <> "") $wrkonchange = " onchange=\"" . ew_JsEncode2($wrkonchange) . "\"";
$v07_siswarutinbayar->rutin_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" style="white-space: nowrap; z-index: <?php echo (9000 - $v07_siswarutinbayar_grid->RowCnt * 10) ?>">
	<input type="text" name="sv_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="sv_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo $v07_siswarutinbayar->rutin_id->EditValue ?>" size="30" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->getPlaceHolder()) ?>" data-placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->getPlaceHolder()) ?>"<?php echo $v07_siswarutinbayar->rutin_id->EditAttributes() ?>>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" data-value-separator="<?php echo $v07_siswarutinbayar->rutin_id->DisplayValueSeparatorAttribute() ?>" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<input type="hidden" name="q_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="q_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo $v07_siswarutinbayar->rutin_id->LookupFilterQuery(true) ?>">
<script type="text/javascript">
fv07_siswarutinbayargrid.CreateAutoSuggest({"id":"x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id","forceSelect":false});
</script>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->OldValue) ?>">
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_rutin_id" class="form-group v07_siswarutinbayar_rutin_id">
<?php
$wrkonchange = trim(" " . @$v07_siswarutinbayar->rutin_id->EditAttrs["onchange"]);
if ($wrkonchange <> "") $wrkonchange = " onchange=\"" . ew_JsEncode2($wrkonchange) . "\"";
$v07_siswarutinbayar->rutin_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" style="white-space: nowrap; z-index: <?php echo (9000 - $v07_siswarutinbayar_grid->RowCnt * 10) ?>">
	<input type="text" name="sv_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="sv_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo $v07_siswarutinbayar->rutin_id->EditValue ?>" size="30" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->getPlaceHolder()) ?>" data-placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->getPlaceHolder()) ?>"<?php echo $v07_siswarutinbayar->rutin_id->EditAttributes() ?>>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" data-value-separator="<?php echo $v07_siswarutinbayar->rutin_id->DisplayValueSeparatorAttribute() ?>" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<input type="hidden" name="q_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="q_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo $v07_siswarutinbayar->rutin_id->LookupFilterQuery(true) ?>">
<script type="text/javascript">
fv07_siswarutinbayargrid.CreateAutoSuggest({"id":"x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id","forceSelect":false});
</script>
</span>
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_rutin_id" class="v07_siswarutinbayar_rutin_id">
<span<?php echo $v07_siswarutinbayar->rutin_id->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->rutin_id->ListViewValue() ?></span>
</span>
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" name="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" name="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->OldValue) ?>">
<?php } ?>
<?php } ?>
<a id="<?php echo $v07_siswarutinbayar_grid->PageObjName . "_row_" . $v07_siswarutinbayar_grid->RowCnt ?>"></a></td>
	<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_id" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_id->CurrentValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_id" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_id" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_id->OldValue) ?>">
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT || $v07_siswarutinbayar->CurrentMode == "edit") { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_id" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_id->CurrentValue) ?>">
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_b_id" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_b_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_b_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->b_id->CurrentValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_b_id" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_b_id" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_b_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->b_id->OldValue) ?>">
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT || $v07_siswarutinbayar->CurrentMode == "edit") { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_b_id" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_b_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_b_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->b_id->CurrentValue) ?>">
<?php } ?>
	<?php if ($v07_siswarutinbayar->a_Nilai->Visible) { // a_Nilai ?>
		<td data-name="a_Nilai"<?php echo $v07_siswarutinbayar->a_Nilai->CellAttributes() ?>>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_a_Nilai" class="form-group v07_siswarutinbayar_a_Nilai">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" size="10" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->a_Nilai->EditValue ?>"<?php echo $v07_siswarutinbayar->a_Nilai->EditAttributes() ?>>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->OldValue) ?>">
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_a_Nilai" class="form-group v07_siswarutinbayar_a_Nilai">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" size="10" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->a_Nilai->EditValue ?>"<?php echo $v07_siswarutinbayar->a_Nilai->EditAttributes() ?>>
</span>
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_a_Nilai" class="v07_siswarutinbayar_a_Nilai">
<span<?php echo $v07_siswarutinbayar->a_Nilai->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->a_Nilai->ListViewValue() ?></span>
</span>
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Tanggal_Bayar->Visible) { // Tanggal_Bayar ?>
		<td data-name="Tanggal_Bayar"<?php echo $v07_siswarutinbayar->Tanggal_Bayar->CellAttributes() ?>>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Tanggal_Bayar" class="form-group v07_siswarutinbayar_Tanggal_Bayar">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Tanggal_Bayar->EditValue ?>"<?php echo $v07_siswarutinbayar->Tanggal_Bayar->EditAttributes() ?>>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->OldValue) ?>">
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Tanggal_Bayar" class="form-group v07_siswarutinbayar_Tanggal_Bayar">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Tanggal_Bayar->EditValue ?>"<?php echo $v07_siswarutinbayar->Tanggal_Bayar->EditAttributes() ?>>
</span>
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Tanggal_Bayar" class="v07_siswarutinbayar_Tanggal_Bayar">
<span<?php echo $v07_siswarutinbayar->Tanggal_Bayar->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->Tanggal_Bayar->ListViewValue() ?></span>
</span>
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Nilai_Bayar->Visible) { // Nilai_Bayar ?>
		<td data-name="Nilai_Bayar"<?php echo $v07_siswarutinbayar->Nilai_Bayar->CellAttributes() ?>>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Nilai_Bayar" class="form-group v07_siswarutinbayar_Nilai_Bayar">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" size="30" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Nilai_Bayar->EditValue ?>"<?php echo $v07_siswarutinbayar->Nilai_Bayar->EditAttributes() ?>>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->OldValue) ?>">
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Nilai_Bayar" class="form-group v07_siswarutinbayar_Nilai_Bayar">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" size="30" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Nilai_Bayar->EditValue ?>"<?php echo $v07_siswarutinbayar->Nilai_Bayar->EditAttributes() ?>>
</span>
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Nilai_Bayar" class="v07_siswarutinbayar_Nilai_Bayar">
<span<?php echo $v07_siswarutinbayar->Nilai_Bayar->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->Nilai_Bayar->ListViewValue() ?></span>
</span>
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Periode_Text->Visible) { // Periode_Text ?>
		<td data-name="Periode_Text"<?php echo $v07_siswarutinbayar->Periode_Text->CellAttributes() ?>>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Periode_Text" class="form-group v07_siswarutinbayar_Periode_Text">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" size="30" maxlength="14" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Periode_Text->EditValue ?>"<?php echo $v07_siswarutinbayar->Periode_Text->EditAttributes() ?>>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->OldValue) ?>">
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Periode_Text" class="form-group v07_siswarutinbayar_Periode_Text">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" size="30" maxlength="14" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Periode_Text->EditValue ?>"<?php echo $v07_siswarutinbayar->Periode_Text->EditAttributes() ?>>
</span>
<?php } ?>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $v07_siswarutinbayar_grid->RowCnt ?>_v07_siswarutinbayar_Periode_Text" class="v07_siswarutinbayar_Periode_Text">
<span<?php echo $v07_siswarutinbayar->Periode_Text->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->Periode_Text->ListViewValue() ?></span>
</span>
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="fv07_siswarutinbayargrid$x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->FormValue) ?>">
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="fv07_siswarutinbayargrid$o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v07_siswarutinbayar_grid->ListOptions->Render("body", "right", $v07_siswarutinbayar_grid->RowCnt);
?>
	</tr>
<?php if ($v07_siswarutinbayar->RowType == EW_ROWTYPE_ADD || $v07_siswarutinbayar->RowType == EW_ROWTYPE_EDIT) { ?>
<script type="text/javascript">
fv07_siswarutinbayargrid.UpdateOpts(<?php echo $v07_siswarutinbayar_grid->RowIndex ?>);
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if ($v07_siswarutinbayar->CurrentAction <> "gridadd" || $v07_siswarutinbayar->CurrentMode == "copy")
		if (!$v07_siswarutinbayar_grid->Recordset->EOF) $v07_siswarutinbayar_grid->Recordset->MoveNext();
}
?>
<?php
	if ($v07_siswarutinbayar->CurrentMode == "add" || $v07_siswarutinbayar->CurrentMode == "copy" || $v07_siswarutinbayar->CurrentMode == "edit") {
		$v07_siswarutinbayar_grid->RowIndex = '$rowindex$';
		$v07_siswarutinbayar_grid->LoadDefaultValues();

		// Set row properties
		$v07_siswarutinbayar->ResetAttrs();
		$v07_siswarutinbayar->RowAttrs = array_merge($v07_siswarutinbayar->RowAttrs, array('data-rowindex'=>$v07_siswarutinbayar_grid->RowIndex, 'id'=>'r0_v07_siswarutinbayar', 'data-rowtype'=>EW_ROWTYPE_ADD));
		ew_AppendClass($v07_siswarutinbayar->RowAttrs["class"], "ewTemplate");
		$v07_siswarutinbayar->RowType = EW_ROWTYPE_ADD;

		// Render row
		$v07_siswarutinbayar_grid->RenderRow();

		// Render list options
		$v07_siswarutinbayar_grid->RenderListOptions();
		$v07_siswarutinbayar_grid->StartRowCnt = 0;
?>
	<tr<?php echo $v07_siswarutinbayar->RowAttributes() ?>>
<?php

// Render list options (body, left)
$v07_siswarutinbayar_grid->ListOptions->Render("body", "left", $v07_siswarutinbayar_grid->RowIndex);
?>
	<?php if ($v07_siswarutinbayar->rutin_id->Visible) { // rutin_id ?>
		<td data-name="rutin_id">
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<span id="el$rowindex$_v07_siswarutinbayar_rutin_id" class="form-group v07_siswarutinbayar_rutin_id">
<?php
$wrkonchange = trim(" " . @$v07_siswarutinbayar->rutin_id->EditAttrs["onchange"]);
if ($wrkonchange <> "") $wrkonchange = " onchange=\"" . ew_JsEncode2($wrkonchange) . "\"";
$v07_siswarutinbayar->rutin_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" style="white-space: nowrap; z-index: <?php echo (9000 - $v07_siswarutinbayar_grid->RowCnt * 10) ?>">
	<input type="text" name="sv_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="sv_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo $v07_siswarutinbayar->rutin_id->EditValue ?>" size="30" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->getPlaceHolder()) ?>" data-placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->getPlaceHolder()) ?>"<?php echo $v07_siswarutinbayar->rutin_id->EditAttributes() ?>>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" data-value-separator="<?php echo $v07_siswarutinbayar->rutin_id->DisplayValueSeparatorAttribute() ?>" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->CurrentValue) ?>"<?php echo $wrkonchange ?>>
<input type="hidden" name="q_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="q_x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo $v07_siswarutinbayar->rutin_id->LookupFilterQuery(true) ?>">
<script type="text/javascript">
fv07_siswarutinbayargrid.CreateAutoSuggest({"id":"x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id","forceSelect":false});
</script>
</span>
<?php } else { ?>
<span id="el$rowindex$_v07_siswarutinbayar_rutin_id" class="form-group v07_siswarutinbayar_rutin_id">
<span<?php echo $v07_siswarutinbayar->rutin_id->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $v07_siswarutinbayar->rutin_id->ViewValue ?></p></span>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_rutin_id" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_rutin_id" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->rutin_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->a_Nilai->Visible) { // a_Nilai ?>
		<td data-name="a_Nilai">
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<span id="el$rowindex$_v07_siswarutinbayar_a_Nilai" class="form-group v07_siswarutinbayar_a_Nilai">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" size="10" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->a_Nilai->EditValue ?>"<?php echo $v07_siswarutinbayar->a_Nilai->EditAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v07_siswarutinbayar_a_Nilai" class="form-group v07_siswarutinbayar_a_Nilai">
<span<?php echo $v07_siswarutinbayar->a_Nilai->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $v07_siswarutinbayar->a_Nilai->ViewValue ?></p></span>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_a_Nilai" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_a_Nilai" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->a_Nilai->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Tanggal_Bayar->Visible) { // Tanggal_Bayar ?>
		<td data-name="Tanggal_Bayar">
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<span id="el$rowindex$_v07_siswarutinbayar_Tanggal_Bayar" class="form-group v07_siswarutinbayar_Tanggal_Bayar">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Tanggal_Bayar->EditValue ?>"<?php echo $v07_siswarutinbayar->Tanggal_Bayar->EditAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v07_siswarutinbayar_Tanggal_Bayar" class="form-group v07_siswarutinbayar_Tanggal_Bayar">
<span<?php echo $v07_siswarutinbayar->Tanggal_Bayar->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $v07_siswarutinbayar->Tanggal_Bayar->ViewValue ?></p></span>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Tanggal_Bayar" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Tanggal_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Tanggal_Bayar->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Nilai_Bayar->Visible) { // Nilai_Bayar ?>
		<td data-name="Nilai_Bayar">
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<span id="el$rowindex$_v07_siswarutinbayar_Nilai_Bayar" class="form-group v07_siswarutinbayar_Nilai_Bayar">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" size="30" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Nilai_Bayar->EditValue ?>"<?php echo $v07_siswarutinbayar->Nilai_Bayar->EditAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v07_siswarutinbayar_Nilai_Bayar" class="form-group v07_siswarutinbayar_Nilai_Bayar">
<span<?php echo $v07_siswarutinbayar->Nilai_Bayar->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $v07_siswarutinbayar->Nilai_Bayar->ViewValue ?></p></span>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Nilai_Bayar" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Nilai_Bayar" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Nilai_Bayar->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Periode_Text->Visible) { // Periode_Text ?>
		<td data-name="Periode_Text">
<?php if ($v07_siswarutinbayar->CurrentAction <> "F") { ?>
<span id="el$rowindex$_v07_siswarutinbayar_Periode_Text" class="form-group v07_siswarutinbayar_Periode_Text">
<input type="text" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" size="30" maxlength="14" placeholder="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->getPlaceHolder()) ?>" value="<?php echo $v07_siswarutinbayar->Periode_Text->EditValue ?>"<?php echo $v07_siswarutinbayar->Periode_Text->EditAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_v07_siswarutinbayar_Periode_Text" class="form-group v07_siswarutinbayar_Periode_Text">
<span<?php echo $v07_siswarutinbayar->Periode_Text->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $v07_siswarutinbayar->Periode_Text->ViewValue ?></p></span>
</span>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="x<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="v07_siswarutinbayar" data-field="x_Periode_Text" name="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" id="o<?php echo $v07_siswarutinbayar_grid->RowIndex ?>_Periode_Text" value="<?php echo ew_HtmlEncode($v07_siswarutinbayar->Periode_Text->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v07_siswarutinbayar_grid->ListOptions->Render("body", "right", $v07_siswarutinbayar_grid->RowCnt);
?>
<script type="text/javascript">
fv07_siswarutinbayargrid.UpdateOpts(<?php echo $v07_siswarutinbayar_grid->RowIndex ?>);
</script>
	</tr>
<?php
}
?>
</tbody>
</table>
<?php if ($v07_siswarutinbayar->CurrentMode == "add" || $v07_siswarutinbayar->CurrentMode == "copy") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridinsert">
<input type="hidden" name="<?php echo $v07_siswarutinbayar_grid->FormKeyCountName ?>" id="<?php echo $v07_siswarutinbayar_grid->FormKeyCountName ?>" value="<?php echo $v07_siswarutinbayar_grid->KeyCount ?>">
<?php echo $v07_siswarutinbayar_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($v07_siswarutinbayar->CurrentMode == "edit") { ?>
<input type="hidden" name="a_list" id="a_list" value="gridupdate">
<input type="hidden" name="<?php echo $v07_siswarutinbayar_grid->FormKeyCountName ?>" id="<?php echo $v07_siswarutinbayar_grid->FormKeyCountName ?>" value="<?php echo $v07_siswarutinbayar_grid->KeyCount ?>">
<?php echo $v07_siswarutinbayar_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($v07_siswarutinbayar->CurrentMode == "") { ?>
<input type="hidden" name="a_list" id="a_list" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="fv07_siswarutinbayargrid">
</div>
<?php

// Close recordset
if ($v07_siswarutinbayar_grid->Recordset)
	$v07_siswarutinbayar_grid->Recordset->Close();
?>
<?php if ($v07_siswarutinbayar_grid->ShowOtherOptions) { ?>
<div class="panel-footer ewGridLowerPanel">
<?php
	foreach ($v07_siswarutinbayar_grid->OtherOptions as &$option)
		$option->Render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div>
</div>
<?php } ?>
<?php if ($v07_siswarutinbayar_grid->TotalRecs == 0 && $v07_siswarutinbayar->CurrentAction == "") { // Show other options ?>
<div class="ewListOtherOptions">
<?php
	foreach ($v07_siswarutinbayar_grid->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->Render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if ($v07_siswarutinbayar->Export == "") { ?>
<script type="text/javascript">
fv07_siswarutinbayargrid.Init();
</script>
<?php } ?>
<?php
$v07_siswarutinbayar_grid->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<?php
$v07_siswarutinbayar_grid->Page_Terminate();
?>
