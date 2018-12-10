<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg13.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql13.php") ?>
<?php include_once "phpfn13.php" ?>
<?php include_once "t09_siswanonrutintempinfo.php" ?>
<?php include_once "v01_siswainfo.php" ?>
<?php include_once "userfn13.php" ?>
<?php

//
// Page class
//

$t09_siswanonrutintemp_edit = NULL; // Initialize page object first

class ct09_siswanonrutintemp_edit extends ct09_siswanonrutintemp {

	// Page ID
	var $PageID = 'edit';

	// Project ID
	var $ProjectID = "{BC6271E5-C752-460B-B029-15A6FD71891F}";

	// Table name
	var $TableName = 't09_siswanonrutintemp';

	// Page object name
	var $PageObjName = 't09_siswanonrutintemp_edit';

	// Page name
	function PageName() {
		return ew_CurrentPage();
	}

	// Page URL
	function PageUrl() {
		$PageUrl = ew_CurrentPage() . "?";
		if ($this->UseTokenInUrl) $PageUrl .= "t=" . $this->TableVar . "&"; // Add page token
		return $PageUrl;
	}

	// Message
	function getMessage() {
		return @$_SESSION[EW_SESSION_MESSAGE];
	}

	function setMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_MESSAGE], $v);
	}

	function getFailureMessage() {
		return @$_SESSION[EW_SESSION_FAILURE_MESSAGE];
	}

	function setFailureMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_FAILURE_MESSAGE], $v);
	}

	function getSuccessMessage() {
		return @$_SESSION[EW_SESSION_SUCCESS_MESSAGE];
	}

	function setSuccessMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_SUCCESS_MESSAGE], $v);
	}

	function getWarningMessage() {
		return @$_SESSION[EW_SESSION_WARNING_MESSAGE];
	}

	function setWarningMessage($v) {
		ew_AddMessage($_SESSION[EW_SESSION_WARNING_MESSAGE], $v);
	}

	// Methods to clear message
	function ClearMessage() {
		$_SESSION[EW_SESSION_MESSAGE] = "";
	}

	function ClearFailureMessage() {
		$_SESSION[EW_SESSION_FAILURE_MESSAGE] = "";
	}

	function ClearSuccessMessage() {
		$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = "";
	}

	function ClearWarningMessage() {
		$_SESSION[EW_SESSION_WARNING_MESSAGE] = "";
	}

	function ClearMessages() {
		$_SESSION[EW_SESSION_MESSAGE] = "";
		$_SESSION[EW_SESSION_FAILURE_MESSAGE] = "";
		$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = "";
		$_SESSION[EW_SESSION_WARNING_MESSAGE] = "";
	}

	// Show message
	function ShowMessage() {
		$hidden = FALSE;
		$html = "";

		// Message
		$sMessage = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($sMessage, "");
		if ($sMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sMessage;
			$html .= "<div class=\"alert alert-info ewInfo\">" . $sMessage . "</div>";
			$_SESSION[EW_SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$sWarningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($sWarningMessage, "warning");
		if ($sWarningMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sWarningMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sWarningMessage;
			$html .= "<div class=\"alert alert-warning ewWarning\">" . $sWarningMessage . "</div>";
			$_SESSION[EW_SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$sSuccessMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($sSuccessMessage, "success");
		if ($sSuccessMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sSuccessMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sSuccessMessage;
			$html .= "<div class=\"alert alert-success ewSuccess\">" . $sSuccessMessage . "</div>";
			$_SESSION[EW_SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$sErrorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($sErrorMessage, "failure");
		if ($sErrorMessage <> "") { // Message in Session, display
			if (!$hidden)
				$sErrorMessage = "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>" . $sErrorMessage;
			$html .= "<div class=\"alert alert-danger ewError\">" . $sErrorMessage . "</div>";
			$_SESSION[EW_SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo "<div class=\"ewMessageDialog\"" . (($hidden) ? " style=\"display: none;\"" : "") . ">" . $html . "</div>";
	}
	var $PageHeader;
	var $PageFooter;

	// Show Page Header
	function ShowPageHeader() {
		$sHeader = $this->PageHeader;
		$this->Page_DataRendering($sHeader);
		if ($sHeader <> "") { // Header exists, display
			echo "<p>" . $sHeader . "</p>";
		}
	}

	// Show Page Footer
	function ShowPageFooter() {
		$sFooter = $this->PageFooter;
		$this->Page_DataRendered($sFooter);
		if ($sFooter <> "") { // Footer exists, display
			echo "<p>" . $sFooter . "</p>";
		}
	}

	// Validate page request
	function IsPageRequest() {
		global $objForm;
		if ($this->UseTokenInUrl) {
			if ($objForm)
				return ($this->TableVar == $objForm->GetValue("t"));
			if (@$_GET["t"] <> "")
				return ($this->TableVar == $_GET["t"]);
		} else {
			return TRUE;
		}
	}
	var $Token = "";
	var $TokenTimeout = 0;
	var $CheckToken = EW_CHECK_TOKEN;
	var $CheckTokenFn = "ew_CheckToken";
	var $CreateTokenFn = "ew_CreateToken";

	// Valid Post
	function ValidPost() {
		if (!$this->CheckToken || !ew_IsHttpPost())
			return TRUE;
		if (!isset($_POST[EW_TOKEN_NAME]))
			return FALSE;
		$fn = $this->CheckTokenFn;
		if (is_callable($fn))
			return $fn($_POST[EW_TOKEN_NAME], $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	function CreateToken() {
		global $gsToken;
		if ($this->CheckToken) {
			$fn = $this->CreateTokenFn;
			if ($this->Token == "" && is_callable($fn)) // Create token
				$this->Token = $fn();
			$gsToken = $this->Token; // Save to global variable
		}
	}

	//
	// Page class constructor
	//
	function __construct() {
		global $conn, $Language;
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = ew_SessionTimeoutTime();

		// Language object
		if (!isset($Language)) $Language = new cLanguage();

		// Parent constuctor
		parent::__construct();

		// Table object (t09_siswanonrutintemp)
		if (!isset($GLOBALS["t09_siswanonrutintemp"]) || get_class($GLOBALS["t09_siswanonrutintemp"]) == "ct09_siswanonrutintemp") {
			$GLOBALS["t09_siswanonrutintemp"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t09_siswanonrutintemp"];
		}

		// Table object (v01_siswa)
		if (!isset($GLOBALS['v01_siswa'])) $GLOBALS['v01_siswa'] = new cv01_siswa();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'edit', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 't09_siswanonrutintemp', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = ew_Connect($this->DBID);
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsCustomExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;

		// Create form object
		$objForm = new cFormObj();
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action
		$this->id->SetVisibility();
		$this->id->Visible = !$this->IsAdd() && !$this->IsCopy() && !$this->IsGridAdd();
		$this->siswa_id->SetVisibility();
		$this->nonrutin_id->SetVisibility();
		$this->siswanonrutin_id->SetVisibility();
		$this->Nilai->SetVisibility();
		$this->Bayar->SetVisibility();
		$this->Sisa->SetVisibility();

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->ValidPost()) {
			echo $Language->Phrase("InvalidPostRequest");
			$this->Page_Terminate();
			exit();
		}

		// Process auto fill
		if (@$_POST["ajax"] == "autofill") {
			$results = $this->GetAutoFill(@$_POST["name"], @$_POST["q"]);
			if ($results) {

				// Clean output buffer
				if (!EW_DEBUG_ENABLED && ob_get_length())
					ob_end_clean();
				echo $results;
				$this->Page_Terminate();
				exit();
			}
		}

		// Create Token
		$this->CreateToken();
	}

	//
	// Page_Terminate
	//
	function Page_Terminate($url = "") {
		global $gsExportFile, $gTmpImages;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $EW_EXPORT, $t09_siswanonrutintemp;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($t09_siswanonrutintemp);
				$doc->Text = $sContent;
				if ($this->Export == "email")
					echo $this->ExportEmail($doc->Text);
				else
					$doc->Export();
				ew_DeleteTmpImages(); // Delete temp images
				exit();
			}
		}
		$this->Page_Redirecting($url);

		 // Close connection
		ew_CloseConn();

		// Go to URL if specified
		if ($url <> "") {
			if (!EW_DEBUG_ENABLED && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) {
				$row = array();
				$row["url"] = $url;
				echo ew_ArrayToJson(array($row));
			} else {
				header("Location: " . $url);
			}
		}
		exit();
	}
	var $FormClassName = "form-horizontal ewForm ewEditForm";
	var $IsModal = FALSE;
	var $DbMasterFilter;
	var $DbDetailFilter;

	// 
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError;
		global $gbSkipHeaderFooter;

		// Check modal
		$this->IsModal = (@$_GET["modal"] == "1" || @$_POST["modal"] == "1");
		if ($this->IsModal)
			$gbSkipHeaderFooter = TRUE;

		// Load key from QueryString
		if (@$_GET["id"] <> "") {
			$this->id->setQueryStringValue($_GET["id"]);
		}

		// Set up master detail parameters
		$this->SetUpMasterParms();

		// Process form if post back
		if (@$_POST["a_edit"] <> "") {
			$this->CurrentAction = $_POST["a_edit"]; // Get action code
			$this->LoadFormValues(); // Get form values
		} else {
			$this->CurrentAction = "I"; // Default action is display
		}

		// Check if valid key
		if ($this->id->CurrentValue == "") {
			$this->Page_Terminate("t09_siswanonrutintemplist.php"); // Invalid key, return to list
		}

		// Validate form if post back
		if (@$_POST["a_edit"] <> "") {
			if (!$this->ValidateForm()) {
				$this->CurrentAction = ""; // Form error, reset action
				$this->setFailureMessage($gsFormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->RestoreFormValues();
			}
		}
		switch ($this->CurrentAction) {
			case "I": // Get a record to display
				if (!$this->LoadRow()) { // Load record based on key
					if ($this->getFailureMessage() == "") $this->setFailureMessage($Language->Phrase("NoRecord")); // No record found
					$this->Page_Terminate("t09_siswanonrutintemplist.php"); // No matching record, return to list
				}
				break;
			Case "U": // Update
				$sReturnUrl = $this->getReturnUrl();
				if (ew_GetPageName($sReturnUrl) == "t09_siswanonrutintemplist.php")
					$sReturnUrl = $this->AddMasterUrl($sReturnUrl); // List page, return to list page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->EditRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->Phrase("UpdateSuccess")); // Update success
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} elseif ($this->getFailureMessage() == $Language->Phrase("NoRecord")) {
					$this->Page_Terminate($sReturnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->RestoreFormValues(); // Restore form values if update failed
				}
		}

		// Set up Breadcrumb
		$this->SetupBreadcrumb();

		// Render the record
		$this->RowType = EW_ROWTYPE_EDIT; // Render as Edit
		$this->ResetAttrs();
		$this->RenderRow();
	}

	// Set up starting record parameters
	function SetUpStartRec() {
		if ($this->DisplayRecs == 0)
			return;
		if ($this->IsPageRequest()) { // Validate request
			if (@$_GET[EW_TABLE_START_REC] <> "") { // Check for "start" parameter
				$this->StartRec = $_GET[EW_TABLE_START_REC];
				$this->setStartRecordNumber($this->StartRec);
			} elseif (@$_GET[EW_TABLE_PAGE_NO] <> "") {
				$PageNo = $_GET[EW_TABLE_PAGE_NO];
				if (is_numeric($PageNo)) {
					$this->StartRec = ($PageNo-1)*$this->DisplayRecs+1;
					if ($this->StartRec <= 0) {
						$this->StartRec = 1;
					} elseif ($this->StartRec >= intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1) {
						$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1;
					}
					$this->setStartRecordNumber($this->StartRec);
				}
			}
		}
		$this->StartRec = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRec) || $this->StartRec == "") { // Avoid invalid start record counter
			$this->StartRec = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRec);
		} elseif (intval($this->StartRec) > intval($this->TotalRecs)) { // Avoid starting record > total records
			$this->StartRec = intval(($this->TotalRecs-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRec);
		} elseif (($this->StartRec-1) % $this->DisplayRecs <> 0) {
			$this->StartRec = intval(($this->StartRec-1)/$this->DisplayRecs)*$this->DisplayRecs+1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Get upload files
	function GetUploadFiles() {
		global $objForm, $Language;

		// Get upload data
	}

	// Load form values
	function LoadFormValues() {

		// Load from form
		global $objForm;
		if (!$this->id->FldIsDetailKey)
			$this->id->setFormValue($objForm->GetValue("x_id"));
		if (!$this->siswa_id->FldIsDetailKey) {
			$this->siswa_id->setFormValue($objForm->GetValue("x_siswa_id"));
		}
		if (!$this->nonrutin_id->FldIsDetailKey) {
			$this->nonrutin_id->setFormValue($objForm->GetValue("x_nonrutin_id"));
		}
		if (!$this->siswanonrutin_id->FldIsDetailKey) {
			$this->siswanonrutin_id->setFormValue($objForm->GetValue("x_siswanonrutin_id"));
		}
		if (!$this->Nilai->FldIsDetailKey) {
			$this->Nilai->setFormValue($objForm->GetValue("x_Nilai"));
		}
		if (!$this->Bayar->FldIsDetailKey) {
			$this->Bayar->setFormValue($objForm->GetValue("x_Bayar"));
		}
		if (!$this->Sisa->FldIsDetailKey) {
			$this->Sisa->setFormValue($objForm->GetValue("x_Sisa"));
		}
	}

	// Restore form values
	function RestoreFormValues() {
		global $objForm;
		$this->LoadRow();
		$this->id->CurrentValue = $this->id->FormValue;
		$this->siswa_id->CurrentValue = $this->siswa_id->FormValue;
		$this->nonrutin_id->CurrentValue = $this->nonrutin_id->FormValue;
		$this->siswanonrutin_id->CurrentValue = $this->siswanonrutin_id->FormValue;
		$this->Nilai->CurrentValue = $this->Nilai->FormValue;
		$this->Bayar->CurrentValue = $this->Bayar->FormValue;
		$this->Sisa->CurrentValue = $this->Sisa->FormValue;
	}

	// Load row based on key values
	function LoadRow() {
		global $Security, $Language;
		$sFilter = $this->KeyFilter();

		// Call Row Selecting event
		$this->Row_Selecting($sFilter);

		// Load SQL based on filter
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$conn = &$this->Connection();
		$res = FALSE;
		$rs = ew_LoadRecordset($sSql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->LoadRowValues($rs); // Load row values
			$rs->Close();
		}
		return $res;
	}

	// Load row values from recordset
	function LoadRowValues(&$rs) {
		if (!$rs || $rs->EOF) return;

		// Call Row Selected event
		$row = &$rs->fields;
		$this->Row_Selected($row);
		$this->id->setDbValue($rs->fields('id'));
		$this->siswa_id->setDbValue($rs->fields('siswa_id'));
		$this->nonrutin_id->setDbValue($rs->fields('nonrutin_id'));
		$this->siswanonrutin_id->setDbValue($rs->fields('siswanonrutin_id'));
		$this->Nilai->setDbValue($rs->fields('Nilai'));
		$this->Bayar->setDbValue($rs->fields('Bayar'));
		$this->Sisa->setDbValue($rs->fields('Sisa'));
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF) return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->siswa_id->DbValue = $row['siswa_id'];
		$this->nonrutin_id->DbValue = $row['nonrutin_id'];
		$this->siswanonrutin_id->DbValue = $row['siswanonrutin_id'];
		$this->Nilai->DbValue = $row['Nilai'];
		$this->Bayar->DbValue = $row['Bayar'];
		$this->Sisa->DbValue = $row['Sisa'];
	}

	// Render row values based on field settings
	function RenderRow() {
		global $Security, $Language, $gsLanguage;

		// Initialize URLs
		// Convert decimal values if posted back

		if ($this->Nilai->FormValue == $this->Nilai->CurrentValue && is_numeric(ew_StrToFloat($this->Nilai->CurrentValue)))
			$this->Nilai->CurrentValue = ew_StrToFloat($this->Nilai->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Bayar->FormValue == $this->Bayar->CurrentValue && is_numeric(ew_StrToFloat($this->Bayar->CurrentValue)))
			$this->Bayar->CurrentValue = ew_StrToFloat($this->Bayar->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Sisa->FormValue == $this->Sisa->CurrentValue && is_numeric(ew_StrToFloat($this->Sisa->CurrentValue)))
			$this->Sisa->CurrentValue = ew_StrToFloat($this->Sisa->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// siswa_id
		// nonrutin_id
		// siswanonrutin_id
		// Nilai
		// Bayar
		// Sisa

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// id
		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// siswa_id
		$this->siswa_id->ViewValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->ViewCustomAttributes = "";

		// nonrutin_id
		$this->nonrutin_id->ViewValue = $this->nonrutin_id->CurrentValue;
		$this->nonrutin_id->ViewCustomAttributes = "";

		// siswanonrutin_id
		$this->siswanonrutin_id->ViewValue = $this->siswanonrutin_id->CurrentValue;
		$this->siswanonrutin_id->ViewCustomAttributes = "";

		// Nilai
		$this->Nilai->ViewValue = $this->Nilai->CurrentValue;
		$this->Nilai->ViewCustomAttributes = "";

		// Bayar
		$this->Bayar->ViewValue = $this->Bayar->CurrentValue;
		$this->Bayar->ViewCustomAttributes = "";

		// Sisa
		$this->Sisa->ViewValue = $this->Sisa->CurrentValue;
		$this->Sisa->ViewCustomAttributes = "";

			// id
			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";
			$this->id->TooltipValue = "";

			// siswa_id
			$this->siswa_id->LinkCustomAttributes = "";
			$this->siswa_id->HrefValue = "";
			$this->siswa_id->TooltipValue = "";

			// nonrutin_id
			$this->nonrutin_id->LinkCustomAttributes = "";
			$this->nonrutin_id->HrefValue = "";
			$this->nonrutin_id->TooltipValue = "";

			// siswanonrutin_id
			$this->siswanonrutin_id->LinkCustomAttributes = "";
			$this->siswanonrutin_id->HrefValue = "";
			$this->siswanonrutin_id->TooltipValue = "";

			// Nilai
			$this->Nilai->LinkCustomAttributes = "";
			$this->Nilai->HrefValue = "";
			$this->Nilai->TooltipValue = "";

			// Bayar
			$this->Bayar->LinkCustomAttributes = "";
			$this->Bayar->HrefValue = "";
			$this->Bayar->TooltipValue = "";

			// Sisa
			$this->Sisa->LinkCustomAttributes = "";
			$this->Sisa->HrefValue = "";
			$this->Sisa->TooltipValue = "";
		} elseif ($this->RowType == EW_ROWTYPE_EDIT) { // Edit row

			// id
			$this->id->EditAttrs["class"] = "form-control";
			$this->id->EditCustomAttributes = "";
			$this->id->EditValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// siswa_id
			$this->siswa_id->EditAttrs["class"] = "form-control";
			$this->siswa_id->EditCustomAttributes = "";
			if ($this->siswa_id->getSessionValue() <> "") {
				$this->siswa_id->CurrentValue = $this->siswa_id->getSessionValue();
			$this->siswa_id->ViewValue = $this->siswa_id->CurrentValue;
			$this->siswa_id->ViewCustomAttributes = "";
			} else {
			$this->siswa_id->EditValue = ew_HtmlEncode($this->siswa_id->CurrentValue);
			$this->siswa_id->PlaceHolder = ew_RemoveHtml($this->siswa_id->FldCaption());
			}

			// nonrutin_id
			$this->nonrutin_id->EditAttrs["class"] = "form-control";
			$this->nonrutin_id->EditCustomAttributes = "";
			$this->nonrutin_id->EditValue = ew_HtmlEncode($this->nonrutin_id->CurrentValue);
			$this->nonrutin_id->PlaceHolder = ew_RemoveHtml($this->nonrutin_id->FldCaption());

			// siswanonrutin_id
			$this->siswanonrutin_id->EditAttrs["class"] = "form-control";
			$this->siswanonrutin_id->EditCustomAttributes = "";
			$this->siswanonrutin_id->EditValue = ew_HtmlEncode($this->siswanonrutin_id->CurrentValue);
			$this->siswanonrutin_id->PlaceHolder = ew_RemoveHtml($this->siswanonrutin_id->FldCaption());

			// Nilai
			$this->Nilai->EditAttrs["class"] = "form-control";
			$this->Nilai->EditCustomAttributes = "";
			$this->Nilai->EditValue = ew_HtmlEncode($this->Nilai->CurrentValue);
			$this->Nilai->PlaceHolder = ew_RemoveHtml($this->Nilai->FldCaption());
			if (strval($this->Nilai->EditValue) <> "" && is_numeric($this->Nilai->EditValue)) $this->Nilai->EditValue = ew_FormatNumber($this->Nilai->EditValue, -2, -1, -2, 0);

			// Bayar
			$this->Bayar->EditAttrs["class"] = "form-control";
			$this->Bayar->EditCustomAttributes = "";
			$this->Bayar->EditValue = ew_HtmlEncode($this->Bayar->CurrentValue);
			$this->Bayar->PlaceHolder = ew_RemoveHtml($this->Bayar->FldCaption());
			if (strval($this->Bayar->EditValue) <> "" && is_numeric($this->Bayar->EditValue)) $this->Bayar->EditValue = ew_FormatNumber($this->Bayar->EditValue, -2, -1, -2, 0);

			// Sisa
			$this->Sisa->EditAttrs["class"] = "form-control";
			$this->Sisa->EditCustomAttributes = "";
			$this->Sisa->EditValue = ew_HtmlEncode($this->Sisa->CurrentValue);
			$this->Sisa->PlaceHolder = ew_RemoveHtml($this->Sisa->FldCaption());
			if (strval($this->Sisa->EditValue) <> "" && is_numeric($this->Sisa->EditValue)) $this->Sisa->EditValue = ew_FormatNumber($this->Sisa->EditValue, -2, -1, -2, 0);

			// Edit refer script
			// id

			$this->id->LinkCustomAttributes = "";
			$this->id->HrefValue = "";

			// siswa_id
			$this->siswa_id->LinkCustomAttributes = "";
			$this->siswa_id->HrefValue = "";

			// nonrutin_id
			$this->nonrutin_id->LinkCustomAttributes = "";
			$this->nonrutin_id->HrefValue = "";

			// siswanonrutin_id
			$this->siswanonrutin_id->LinkCustomAttributes = "";
			$this->siswanonrutin_id->HrefValue = "";

			// Nilai
			$this->Nilai->LinkCustomAttributes = "";
			$this->Nilai->HrefValue = "";

			// Bayar
			$this->Bayar->LinkCustomAttributes = "";
			$this->Bayar->HrefValue = "";

			// Sisa
			$this->Sisa->LinkCustomAttributes = "";
			$this->Sisa->HrefValue = "";
		}
		if ($this->RowType == EW_ROWTYPE_ADD ||
			$this->RowType == EW_ROWTYPE_EDIT ||
			$this->RowType == EW_ROWTYPE_SEARCH) { // Add / Edit / Search row
			$this->SetupFieldTitles();
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate form
	function ValidateForm() {
		global $Language, $gsFormError;

		// Initialize form error message
		$gsFormError = "";

		// Check if validation required
		if (!EW_SERVER_VALIDATE)
			return ($gsFormError == "");
		if (!$this->siswa_id->FldIsDetailKey && !is_null($this->siswa_id->FormValue) && $this->siswa_id->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->siswa_id->FldCaption(), $this->siswa_id->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->siswa_id->FormValue)) {
			ew_AddMessage($gsFormError, $this->siswa_id->FldErrMsg());
		}
		if (!$this->nonrutin_id->FldIsDetailKey && !is_null($this->nonrutin_id->FormValue) && $this->nonrutin_id->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->nonrutin_id->FldCaption(), $this->nonrutin_id->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->nonrutin_id->FormValue)) {
			ew_AddMessage($gsFormError, $this->nonrutin_id->FldErrMsg());
		}
		if (!$this->siswanonrutin_id->FldIsDetailKey && !is_null($this->siswanonrutin_id->FormValue) && $this->siswanonrutin_id->FormValue == "") {
			ew_AddMessage($gsFormError, str_replace("%s", $this->siswanonrutin_id->FldCaption(), $this->siswanonrutin_id->ReqErrMsg));
		}
		if (!ew_CheckInteger($this->siswanonrutin_id->FormValue)) {
			ew_AddMessage($gsFormError, $this->siswanonrutin_id->FldErrMsg());
		}
		if (!ew_CheckNumber($this->Nilai->FormValue)) {
			ew_AddMessage($gsFormError, $this->Nilai->FldErrMsg());
		}
		if (!ew_CheckNumber($this->Bayar->FormValue)) {
			ew_AddMessage($gsFormError, $this->Bayar->FldErrMsg());
		}
		if (!ew_CheckNumber($this->Sisa->FormValue)) {
			ew_AddMessage($gsFormError, $this->Sisa->FldErrMsg());
		}

		// Return validate result
		$ValidateForm = ($gsFormError == "");

		// Call Form_CustomValidate event
		$sFormCustomError = "";
		$ValidateForm = $ValidateForm && $this->Form_CustomValidate($sFormCustomError);
		if ($sFormCustomError <> "") {
			ew_AddMessage($gsFormError, $sFormCustomError);
		}
		return $ValidateForm;
	}

	// Update record based on key values
	function EditRow() {
		global $Security, $Language;
		$sFilter = $this->KeyFilter();
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$conn = &$this->Connection();
		$this->CurrentFilter = $sFilter;
		$sSql = $this->SQL();
		$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
		$rs = $conn->Execute($sSql);
		$conn->raiseErrorFn = '';
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record message
			$EditRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->LoadDbValues($rsold);
			$rsnew = array();

			// siswa_id
			$this->siswa_id->SetDbValueDef($rsnew, $this->siswa_id->CurrentValue, 0, $this->siswa_id->ReadOnly);

			// nonrutin_id
			$this->nonrutin_id->SetDbValueDef($rsnew, $this->nonrutin_id->CurrentValue, 0, $this->nonrutin_id->ReadOnly);

			// siswanonrutin_id
			$this->siswanonrutin_id->SetDbValueDef($rsnew, $this->siswanonrutin_id->CurrentValue, 0, $this->siswanonrutin_id->ReadOnly);

			// Nilai
			$this->Nilai->SetDbValueDef($rsnew, $this->Nilai->CurrentValue, NULL, $this->Nilai->ReadOnly);

			// Bayar
			$this->Bayar->SetDbValueDef($rsnew, $this->Bayar->CurrentValue, NULL, $this->Bayar->ReadOnly);

			// Sisa
			$this->Sisa->SetDbValueDef($rsnew, $this->Sisa->CurrentValue, NULL, $this->Sisa->ReadOnly);

			// Call Row Updating event
			$bUpdateRow = $this->Row_Updating($rsold, $rsnew);
			if ($bUpdateRow) {
				$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
				if (count($rsnew) > 0)
					$EditRow = $this->Update($rsnew, "", $rsold);
				else
					$EditRow = TRUE; // No field to update
				$conn->raiseErrorFn = '';
				if ($EditRow) {
				}
			} else {
				if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage <> "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->Phrase("UpdateCancelled"));
				}
				$EditRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($EditRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->Close();
		return $EditRow;
	}

	// Set up master/detail based on QueryString
	function SetUpMasterParms() {
		$bValidMaster = FALSE;

		// Get the keys for master table
		if (isset($_GET[EW_TABLE_SHOW_MASTER])) {
			$sMasterTblVar = $_GET[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "v01_siswa") {
				$bValidMaster = TRUE;
				if (@$_GET["fk_id"] <> "") {
					$GLOBALS["v01_siswa"]->id->setQueryStringValue($_GET["fk_id"]);
					$this->siswa_id->setQueryStringValue($GLOBALS["v01_siswa"]->id->QueryStringValue);
					$this->siswa_id->setSessionValue($this->siswa_id->QueryStringValue);
					if (!is_numeric($GLOBALS["v01_siswa"]->id->QueryStringValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		} elseif (isset($_POST[EW_TABLE_SHOW_MASTER])) {
			$sMasterTblVar = $_POST[EW_TABLE_SHOW_MASTER];
			if ($sMasterTblVar == "") {
				$bValidMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($sMasterTblVar == "v01_siswa") {
				$bValidMaster = TRUE;
				if (@$_POST["fk_id"] <> "") {
					$GLOBALS["v01_siswa"]->id->setFormValue($_POST["fk_id"]);
					$this->siswa_id->setFormValue($GLOBALS["v01_siswa"]->id->FormValue);
					$this->siswa_id->setSessionValue($this->siswa_id->FormValue);
					if (!is_numeric($GLOBALS["v01_siswa"]->id->FormValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Save current master table
			$this->setCurrentMasterTable($sMasterTblVar);
			$this->setSessionWhere($this->GetDetailFilter());

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "v01_siswa") {
				if ($this->siswa_id->CurrentValue == "") $this->siswa_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->GetMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->GetDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	function SetupBreadcrumb() {
		global $Breadcrumb, $Language;
		$Breadcrumb = new cBreadcrumb();
		$url = substr(ew_CurrentUrl(), strrpos(ew_CurrentUrl(), "/")+1);
		$Breadcrumb->Add("list", $this->TableVar, $this->AddMasterUrl("t09_siswanonrutintemplist.php"), "", $this->TableVar, TRUE);
		$PageId = "edit";
		$Breadcrumb->Add("edit", $PageId, $url);
	}

	// Setup lookup filters of a field
	function SetupLookupFilters($fld, $pageId = null) {
		global $gsLanguage;
		$pageId = $pageId ?: $this->PageID;
		switch ($fld->FldVar) {
		}
	}

	// Setup AutoSuggest filters of a field
	function SetupAutoSuggestFilters($fld, $pageId = null) {
		global $gsLanguage;
		$pageId = $pageId ?: $this->PageID;
		switch ($fld->FldVar) {
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$CustomError) {

		// Return error message in CustomError
		return TRUE;
	}
}
?>
<?php ew_Header(FALSE) ?>
<?php

// Create page object
if (!isset($t09_siswanonrutintemp_edit)) $t09_siswanonrutintemp_edit = new ct09_siswanonrutintemp_edit();

// Page init
$t09_siswanonrutintemp_edit->Page_Init();

// Page main
$t09_siswanonrutintemp_edit->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t09_siswanonrutintemp_edit->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "edit";
var CurrentForm = ft09_siswanonrutintempedit = new ew_Form("ft09_siswanonrutintempedit", "edit");

// Validate form
ft09_siswanonrutintempedit.Validate = function() {
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
			elm = this.GetElements("x" + infix + "_siswa_id");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $t09_siswanonrutintemp->siswa_id->FldCaption(), $t09_siswanonrutintemp->siswa_id->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_siswa_id");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($t09_siswanonrutintemp->siswa_id->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_nonrutin_id");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $t09_siswanonrutintemp->nonrutin_id->FldCaption(), $t09_siswanonrutintemp->nonrutin_id->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_nonrutin_id");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($t09_siswanonrutintemp->nonrutin_id->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_siswanonrutin_id");
			if (elm && !ew_IsHidden(elm) && !ew_HasValue(elm))
				return this.OnError(elm, "<?php echo ew_JsEncode2(str_replace("%s", $t09_siswanonrutintemp->siswanonrutin_id->FldCaption(), $t09_siswanonrutintemp->siswanonrutin_id->ReqErrMsg)) ?>");
			elm = this.GetElements("x" + infix + "_siswanonrutin_id");
			if (elm && !ew_CheckInteger(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($t09_siswanonrutintemp->siswanonrutin_id->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_Nilai");
			if (elm && !ew_CheckNumber(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($t09_siswanonrutintemp->Nilai->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_Bayar");
			if (elm && !ew_CheckNumber(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($t09_siswanonrutintemp->Bayar->FldErrMsg()) ?>");
			elm = this.GetElements("x" + infix + "_Sisa");
			if (elm && !ew_CheckNumber(elm.value))
				return this.OnError(elm, "<?php echo ew_JsEncode2($t09_siswanonrutintemp->Sisa->FldErrMsg()) ?>");

			// Fire Form_CustomValidate event
			if (!this.Form_CustomValidate(fobj))
				return false;
	}

	// Process detail forms
	var dfs = $fobj.find("input[name='detailpage']").get();
	for (var i = 0; i < dfs.length; i++) {
		var df = dfs[i], val = df.value;
		if (val && ewForms[val])
			if (!ewForms[val].Validate())
				return false;
	}
	return true;
}

// Form_CustomValidate event
ft09_siswanonrutintempedit.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
ft09_siswanonrutintempedit.ValidateRequired = true;
<?php } else { ?>
ft09_siswanonrutintempedit.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
// Form object for search

</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<?php if (!$t09_siswanonrutintemp_edit->IsModal) { ?>
<div class="ewToolbar">
<?php $Breadcrumb->Render(); ?>
<?php echo $Language->SelectionForm(); ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t09_siswanonrutintemp_edit->ShowPageHeader(); ?>
<?php
$t09_siswanonrutintemp_edit->ShowMessage();
?>
<form name="ft09_siswanonrutintempedit" id="ft09_siswanonrutintempedit" class="<?php echo $t09_siswanonrutintemp_edit->FormClassName ?>" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($t09_siswanonrutintemp_edit->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $t09_siswanonrutintemp_edit->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t09_siswanonrutintemp">
<input type="hidden" name="a_edit" id="a_edit" value="U">
<?php if ($t09_siswanonrutintemp_edit->IsModal) { ?>
<input type="hidden" name="modal" value="1">
<?php } ?>
<?php if ($t09_siswanonrutintemp->getCurrentMasterTable() == "v01_siswa") { ?>
<input type="hidden" name="<?php echo EW_TABLE_SHOW_MASTER ?>" value="v01_siswa">
<input type="hidden" name="fk_id" value="<?php echo $t09_siswanonrutintemp->siswa_id->getSessionValue() ?>">
<?php } ?>
<div>
<?php if ($t09_siswanonrutintemp->id->Visible) { // id ?>
	<div id="r_id" class="form-group">
		<label id="elh_t09_siswanonrutintemp_id" class="col-sm-2 control-label ewLabel"><?php echo $t09_siswanonrutintemp->id->FldCaption() ?></label>
		<div class="col-sm-10"><div<?php echo $t09_siswanonrutintemp->id->CellAttributes() ?>>
<span id="el_t09_siswanonrutintemp_id">
<span<?php echo $t09_siswanonrutintemp->id->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $t09_siswanonrutintemp->id->EditValue ?></p></span>
</span>
<input type="hidden" data-table="t09_siswanonrutintemp" data-field="x_id" name="x_id" id="x_id" value="<?php echo ew_HtmlEncode($t09_siswanonrutintemp->id->CurrentValue) ?>">
<?php echo $t09_siswanonrutintemp->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t09_siswanonrutintemp->siswa_id->Visible) { // siswa_id ?>
	<div id="r_siswa_id" class="form-group">
		<label id="elh_t09_siswanonrutintemp_siswa_id" for="x_siswa_id" class="col-sm-2 control-label ewLabel"><?php echo $t09_siswanonrutintemp->siswa_id->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="col-sm-10"><div<?php echo $t09_siswanonrutintemp->siswa_id->CellAttributes() ?>>
<?php if ($t09_siswanonrutintemp->siswa_id->getSessionValue() <> "") { ?>
<span id="el_t09_siswanonrutintemp_siswa_id">
<span<?php echo $t09_siswanonrutintemp->siswa_id->ViewAttributes() ?>>
<p class="form-control-static"><?php echo $t09_siswanonrutintemp->siswa_id->ViewValue ?></p></span>
</span>
<input type="hidden" id="x_siswa_id" name="x_siswa_id" value="<?php echo ew_HtmlEncode($t09_siswanonrutintemp->siswa_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t09_siswanonrutintemp_siswa_id">
<input type="text" data-table="t09_siswanonrutintemp" data-field="x_siswa_id" name="x_siswa_id" id="x_siswa_id" size="30" placeholder="<?php echo ew_HtmlEncode($t09_siswanonrutintemp->siswa_id->getPlaceHolder()) ?>" value="<?php echo $t09_siswanonrutintemp->siswa_id->EditValue ?>"<?php echo $t09_siswanonrutintemp->siswa_id->EditAttributes() ?>>
</span>
<?php } ?>
<?php echo $t09_siswanonrutintemp->siswa_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t09_siswanonrutintemp->nonrutin_id->Visible) { // nonrutin_id ?>
	<div id="r_nonrutin_id" class="form-group">
		<label id="elh_t09_siswanonrutintemp_nonrutin_id" for="x_nonrutin_id" class="col-sm-2 control-label ewLabel"><?php echo $t09_siswanonrutintemp->nonrutin_id->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="col-sm-10"><div<?php echo $t09_siswanonrutintemp->nonrutin_id->CellAttributes() ?>>
<span id="el_t09_siswanonrutintemp_nonrutin_id">
<input type="text" data-table="t09_siswanonrutintemp" data-field="x_nonrutin_id" name="x_nonrutin_id" id="x_nonrutin_id" size="30" placeholder="<?php echo ew_HtmlEncode($t09_siswanonrutintemp->nonrutin_id->getPlaceHolder()) ?>" value="<?php echo $t09_siswanonrutintemp->nonrutin_id->EditValue ?>"<?php echo $t09_siswanonrutintemp->nonrutin_id->EditAttributes() ?>>
</span>
<?php echo $t09_siswanonrutintemp->nonrutin_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t09_siswanonrutintemp->siswanonrutin_id->Visible) { // siswanonrutin_id ?>
	<div id="r_siswanonrutin_id" class="form-group">
		<label id="elh_t09_siswanonrutintemp_siswanonrutin_id" for="x_siswanonrutin_id" class="col-sm-2 control-label ewLabel"><?php echo $t09_siswanonrutintemp->siswanonrutin_id->FldCaption() ?><?php echo $Language->Phrase("FieldRequiredIndicator") ?></label>
		<div class="col-sm-10"><div<?php echo $t09_siswanonrutintemp->siswanonrutin_id->CellAttributes() ?>>
<span id="el_t09_siswanonrutintemp_siswanonrutin_id">
<input type="text" data-table="t09_siswanonrutintemp" data-field="x_siswanonrutin_id" name="x_siswanonrutin_id" id="x_siswanonrutin_id" size="30" placeholder="<?php echo ew_HtmlEncode($t09_siswanonrutintemp->siswanonrutin_id->getPlaceHolder()) ?>" value="<?php echo $t09_siswanonrutintemp->siswanonrutin_id->EditValue ?>"<?php echo $t09_siswanonrutintemp->siswanonrutin_id->EditAttributes() ?>>
</span>
<?php echo $t09_siswanonrutintemp->siswanonrutin_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t09_siswanonrutintemp->Nilai->Visible) { // Nilai ?>
	<div id="r_Nilai" class="form-group">
		<label id="elh_t09_siswanonrutintemp_Nilai" for="x_Nilai" class="col-sm-2 control-label ewLabel"><?php echo $t09_siswanonrutintemp->Nilai->FldCaption() ?></label>
		<div class="col-sm-10"><div<?php echo $t09_siswanonrutintemp->Nilai->CellAttributes() ?>>
<span id="el_t09_siswanonrutintemp_Nilai">
<input type="text" data-table="t09_siswanonrutintemp" data-field="x_Nilai" name="x_Nilai" id="x_Nilai" size="30" placeholder="<?php echo ew_HtmlEncode($t09_siswanonrutintemp->Nilai->getPlaceHolder()) ?>" value="<?php echo $t09_siswanonrutintemp->Nilai->EditValue ?>"<?php echo $t09_siswanonrutintemp->Nilai->EditAttributes() ?>>
</span>
<?php echo $t09_siswanonrutintemp->Nilai->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t09_siswanonrutintemp->Bayar->Visible) { // Bayar ?>
	<div id="r_Bayar" class="form-group">
		<label id="elh_t09_siswanonrutintemp_Bayar" for="x_Bayar" class="col-sm-2 control-label ewLabel"><?php echo $t09_siswanonrutintemp->Bayar->FldCaption() ?></label>
		<div class="col-sm-10"><div<?php echo $t09_siswanonrutintemp->Bayar->CellAttributes() ?>>
<span id="el_t09_siswanonrutintemp_Bayar">
<input type="text" data-table="t09_siswanonrutintemp" data-field="x_Bayar" name="x_Bayar" id="x_Bayar" size="30" placeholder="<?php echo ew_HtmlEncode($t09_siswanonrutintemp->Bayar->getPlaceHolder()) ?>" value="<?php echo $t09_siswanonrutintemp->Bayar->EditValue ?>"<?php echo $t09_siswanonrutintemp->Bayar->EditAttributes() ?>>
</span>
<?php echo $t09_siswanonrutintemp->Bayar->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t09_siswanonrutintemp->Sisa->Visible) { // Sisa ?>
	<div id="r_Sisa" class="form-group">
		<label id="elh_t09_siswanonrutintemp_Sisa" for="x_Sisa" class="col-sm-2 control-label ewLabel"><?php echo $t09_siswanonrutintemp->Sisa->FldCaption() ?></label>
		<div class="col-sm-10"><div<?php echo $t09_siswanonrutintemp->Sisa->CellAttributes() ?>>
<span id="el_t09_siswanonrutintemp_Sisa">
<input type="text" data-table="t09_siswanonrutintemp" data-field="x_Sisa" name="x_Sisa" id="x_Sisa" size="30" placeholder="<?php echo ew_HtmlEncode($t09_siswanonrutintemp->Sisa->getPlaceHolder()) ?>" value="<?php echo $t09_siswanonrutintemp->Sisa->EditValue ?>"<?php echo $t09_siswanonrutintemp->Sisa->EditAttributes() ?>>
</span>
<?php echo $t09_siswanonrutintemp->Sisa->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div>
<?php if (!$t09_siswanonrutintemp_edit->IsModal) { ?>
<div class="form-group">
	<div class="col-sm-offset-2 col-sm-10">
<button class="btn btn-primary ewButton" name="btnAction" id="btnAction" type="submit"><?php echo $Language->Phrase("SaveBtn") ?></button>
<button class="btn btn-default ewButton" name="btnCancel" id="btnCancel" type="button" data-href="<?php echo $t09_siswanonrutintemp_edit->getReturnUrl() ?>"><?php echo $Language->Phrase("CancelBtn") ?></button>
	</div>
</div>
<?php } ?>
</form>
<script type="text/javascript">
ft09_siswanonrutintempedit.Init();
</script>
<?php
$t09_siswanonrutintemp_edit->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$t09_siswanonrutintemp_edit->Page_Terminate();
?>
