<?php
if (session_id() == "") session_start(); // Init session data
ob_start(); // Turn on output buffering
?>
<?php include_once "ewcfg13.php" ?>
<?php include_once ((EW_USE_ADODB) ? "adodb5/adodb.inc.php" : "ewmysql13.php") ?>
<?php include_once "phpfn13.php" ?>
<?php include_once "v07_siswarutinbayarinfo.php" ?>
<?php include_once "v06_siswainfo.php" ?>
<?php include_once "userfn13.php" ?>
<?php

//
// Page class
//

$v07_siswarutinbayar_list = NULL; // Initialize page object first

class cv07_siswarutinbayar_list extends cv07_siswarutinbayar {

	// Page ID
	var $PageID = 'list';

	// Project ID
	var $ProjectID = "{BC6271E5-C752-460B-B029-15A6FD71891F}";

	// Table name
	var $TableName = 'v07_siswarutinbayar';

	// Page object name
	var $PageObjName = 'v07_siswarutinbayar_list';

	// Grid form hidden field names
	var $FormName = 'fv07_siswarutinbayarlist';
	var $FormActionName = 'k_action';
	var $FormKeyName = 'k_key';
	var $FormOldKeyName = 'k_oldkey';
	var $FormBlankRowName = 'k_blankrow';
	var $FormKeyCountName = 'key_count';

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

	// Page URLs
	var $AddUrl;
	var $EditUrl;
	var $CopyUrl;
	var $DeleteUrl;
	var $ViewUrl;
	var $ListUrl;

	// Export URLs
	var $ExportPrintUrl;
	var $ExportHtmlUrl;
	var $ExportExcelUrl;
	var $ExportWordUrl;
	var $ExportXmlUrl;
	var $ExportCsvUrl;
	var $ExportPdfUrl;

	// Custom export
	var $ExportExcelCustom = FALSE;
	var $ExportWordCustom = FALSE;
	var $ExportPdfCustom = FALSE;
	var $ExportEmailCustom = FALSE;

	// Update URLs
	var $InlineAddUrl;
	var $InlineCopyUrl;
	var $InlineEditUrl;
	var $GridAddUrl;
	var $GridEditUrl;
	var $MultiDeleteUrl;
	var $MultiUpdateUrl;

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

		// Table object (v07_siswarutinbayar)
		if (!isset($GLOBALS["v07_siswarutinbayar"]) || get_class($GLOBALS["v07_siswarutinbayar"]) == "cv07_siswarutinbayar") {
			$GLOBALS["v07_siswarutinbayar"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["v07_siswarutinbayar"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->PageUrl() . "export=print";
		$this->ExportExcelUrl = $this->PageUrl() . "export=excel";
		$this->ExportWordUrl = $this->PageUrl() . "export=word";
		$this->ExportHtmlUrl = $this->PageUrl() . "export=html";
		$this->ExportXmlUrl = $this->PageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->PageUrl() . "export=csv";
		$this->ExportPdfUrl = $this->PageUrl() . "export=pdf";
		$this->AddUrl = "v07_siswarutinbayaradd.php";
		$this->InlineAddUrl = $this->PageUrl() . "a=add";
		$this->GridAddUrl = $this->PageUrl() . "a=gridadd";
		$this->GridEditUrl = $this->PageUrl() . "a=gridedit";
		$this->MultiDeleteUrl = "v07_siswarutinbayardelete.php";
		$this->MultiUpdateUrl = "v07_siswarutinbayarupdate.php";

		// Table object (v06_siswa)
		if (!isset($GLOBALS['v06_siswa'])) $GLOBALS['v06_siswa'] = new cv06_siswa();

		// Page ID
		if (!defined("EW_PAGE_ID"))
			define("EW_PAGE_ID", 'list', TRUE);

		// Table name (for backward compatibility)
		if (!defined("EW_TABLE_NAME"))
			define("EW_TABLE_NAME", 'v07_siswarutinbayar', TRUE);

		// Start timer
		if (!isset($GLOBALS["gTimer"])) $GLOBALS["gTimer"] = new cTimer();

		// Open connection
		if (!isset($conn)) $conn = ew_Connect($this->DBID);

		// List options
		$this->ListOptions = new cListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new cListOptions();
		$this->ExportOptions->Tag = "div";
		$this->ExportOptions->TagClassName = "ewExportOption";

		// Other options
		$this->OtherOptions['addedit'] = new cListOptions();
		$this->OtherOptions['addedit']->Tag = "div";
		$this->OtherOptions['addedit']->TagClassName = "ewAddEditOption";
		$this->OtherOptions['detail'] = new cListOptions();
		$this->OtherOptions['detail']->Tag = "div";
		$this->OtherOptions['detail']->TagClassName = "ewDetailOption";
		$this->OtherOptions['action'] = new cListOptions();
		$this->OtherOptions['action']->Tag = "div";
		$this->OtherOptions['action']->TagClassName = "ewActionOption";

		// Filter options
		$this->FilterOptions = new cListOptions();
		$this->FilterOptions->Tag = "div";
		$this->FilterOptions->TagClassName = "ewFilterOption fv07_siswarutinbayarlistsrch";

		// List actions
		$this->ListActions = new cListActions();
	}

	//
	//  Page_Init
	//
	function Page_Init() {
		global $gsExport, $gsCustomExport, $gsExportFile, $UserProfile, $Language, $Security, $objForm;
		$this->CurrentAction = (@$_GET["a"] <> "") ? $_GET["a"] : @$_POST["a_list"]; // Set up current action

		// Get grid add count
		$gridaddcnt = @$_GET[EW_TABLE_GRID_ADD_ROW_COUNT];
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->SetupListOptions();
		$this->rutin_id->SetVisibility();
		$this->a_Nilai->SetVisibility();
		$this->Tanggal_Bayar->SetVisibility();
		$this->Nilai_Bayar->SetVisibility();
		$this->Periode_Text->SetVisibility();

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

		// Set up master detail parameters
		$this->SetUpMasterParms();

		// Setup other options
		$this->SetupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->Add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == EW_ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions->Items["checkbox"]->Visible = TRUE;
				break;
			}
		}
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
		global $EW_EXPORT, $v07_siswarutinbayar;
		if ($this->CustomExport <> "" && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, $EW_EXPORT)) {
				$sContent = ob_get_contents();
			if ($gsExportFile == "") $gsExportFile = $this->TableVar;
			$class = $EW_EXPORT[$this->CustomExport];
			if (class_exists($class)) {
				$doc = new $class($v07_siswarutinbayar);
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
			header("Location: " . $url);
		}
		exit();
	}

	// Class variables
	var $ListOptions; // List options
	var $ExportOptions; // Export options
	var $SearchOptions; // Search options
	var $OtherOptions = array(); // Other options
	var $FilterOptions; // Filter options
	var $ListActions; // List actions
	var $SelectedCount = 0;
	var $SelectedIndex = 0;
	var $DisplayRecs = 20;
	var $StartRec;
	var $StopRec;
	var $TotalRecs = 0;
	var $RecRange = 10;
	var $Pager;
	var $DefaultSearchWhere = ""; // Default search WHERE clause
	var $SearchWhere = ""; // Search WHERE clause
	var $RecCnt = 0; // Record count
	var $EditRowCnt;
	var $StartRowCnt = 1;
	var $RowCnt = 0;
	var $Attrs = array(); // Row attributes and cell attributes
	var $RowIndex = 0; // Row index
	var $KeyCount = 0; // Key count
	var $RowAction = ""; // Row action
	var $RowOldKey = ""; // Row old key (for copy)
	var $RecPerRow = 0;
	var $MultiColumnClass;
	var $MultiColumnEditClass = "col-sm-12";
	var $MultiColumnCnt = 12;
	var $MultiColumnEditCnt = 12;
	var $GridCnt = 0;
	var $ColCnt = 0;
	var $DbMasterFilter = ""; // Master filter
	var $DbDetailFilter = ""; // Detail filter
	var $MasterRecordExists;	
	var $MultiSelectKey;
	var $Command;
	var $RestoreSearch = FALSE;
	var $DetailPages;
	var $Recordset;
	var $OldRecordset;

	//
	// Page main
	//
	function Page_Main() {
		global $objForm, $Language, $gsFormError, $gsSearchError, $Security;

		// Search filters
		$sSrchAdvanced = ""; // Advanced search filter
		$sSrchBasic = ""; // Basic search filter
		$sFilter = "";

		// Get command
		$this->Command = strtolower(@$_GET["cmd"]);
		if ($this->IsPageRequest()) { // Validate request

			// Process list action first
			if ($this->ProcessListAction()) // Ajax request
				$this->Page_Terminate();

			// Handle reset command
			$this->ResetCmd();

			// Set up Breadcrumb
			if ($this->Export == "")
				$this->SetupBreadcrumb();

			// Hide list options
			if ($this->Export <> "") {
				$this->ListOptions->HideAllOptions(array("sequence"));
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->CurrentAction == "gridadd" || $this->CurrentAction == "gridedit") {
				$this->ListOptions->HideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->Export <> "" || $this->CurrentAction <> "") {
				$this->ExportOptions->HideAllOptions();
				$this->FilterOptions->HideAllOptions();
			}

			// Hide other options
			if ($this->Export <> "") {
				foreach ($this->OtherOptions as &$option)
					$option->HideAllOptions();
			}

			// Set up sorting order
			$this->SetUpSortOrder();
		}

		// Restore display records
		if ($this->getRecordsPerPage() <> "") {
			$this->DisplayRecs = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecs = 20; // Load default
		}

		// Load Sorting Order
		$this->LoadSortOrder();

		// Build filter
		$sFilter = "";

		// Restore master/detail filter
		$this->DbMasterFilter = $this->GetMasterFilter(); // Restore master filter
		$this->DbDetailFilter = $this->GetDetailFilter(); // Restore detail filter
		ew_AddFilter($sFilter, $this->DbDetailFilter);
		ew_AddFilter($sFilter, $this->SearchWhere);

		// Load master record
		if ($this->CurrentMode <> "add" && $this->GetMasterFilter() <> "" && $this->getCurrentMasterTable() == "v06_siswa") {
			global $v06_siswa;
			$rsmaster = $v06_siswa->LoadRs($this->DbMasterFilter);
			$this->MasterRecordExists = ($rsmaster && !$rsmaster->EOF);
			if (!$this->MasterRecordExists) {
				$this->setFailureMessage($Language->Phrase("NoRecord")); // Set no record found
				$this->Page_Terminate("v06_siswalist.php"); // Return to master page
			} else {
				$v06_siswa->LoadListRowValues($rsmaster);
				$v06_siswa->RowType = EW_ROWTYPE_MASTER; // Master row
				$v06_siswa->RenderListRow();
				$rsmaster->Close();
			}
		}

		// Set up filter in session
		$this->setSessionWhere($sFilter);
		$this->CurrentFilter = "";

		// Load record count first
		if (!$this->IsAddOrEdit()) {
			$bSelectLimit = $this->UseSelectLimit;
			if ($bSelectLimit) {
				$this->TotalRecs = $this->SelectRecordCount();
			} else {
				if ($this->Recordset = $this->LoadRecordset())
					$this->TotalRecs = $this->Recordset->RecordCount();
			}
		}

		// Search options
		$this->SetupSearchOptions();
	}

	// Build filter for all keys
	function BuildKeyFilter() {
		global $objForm;
		$sWrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$objForm->Index = $rowindex;
		$sThisKey = strval($objForm->GetValue($this->FormKeyName));
		while ($sThisKey <> "") {
			if ($this->SetupKeyValues($sThisKey)) {
				$sFilter = $this->KeyFilter();
				if ($sWrkFilter <> "") $sWrkFilter .= " OR ";
				$sWrkFilter .= $sFilter;
			} else {
				$sWrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$objForm->Index = $rowindex;
			$sThisKey = strval($objForm->GetValue($this->FormKeyName));
		}
		return $sWrkFilter;
	}

	// Set up key values
	function SetupKeyValues($key) {
		$arrKeyFlds = explode($GLOBALS["EW_COMPOSITE_KEY_SEPARATOR"], $key);
		if (count($arrKeyFlds) >= 2) {
			$this->a_id->setFormValue($arrKeyFlds[0]);
			if (!is_numeric($this->a_id->FormValue))
				return FALSE;
			$this->b_id->setFormValue($arrKeyFlds[1]);
			if (!is_numeric($this->b_id->FormValue))
				return FALSE;
		}
		return TRUE;
	}

	// Set up sort parameters
	function SetUpSortOrder() {

		// Check for Ctrl pressed
		$bCtrl = (@$_GET["ctrl"] <> "");

		// Check for "order" parameter
		if (@$_GET["order"] <> "") {
			$this->CurrentOrder = ew_StripSlashes(@$_GET["order"]);
			$this->CurrentOrderType = @$_GET["ordertype"];
			$this->UpdateSort($this->rutin_id, $bCtrl); // rutin_id
			$this->UpdateSort($this->a_Nilai, $bCtrl); // a_Nilai
			$this->UpdateSort($this->Tanggal_Bayar, $bCtrl); // Tanggal_Bayar
			$this->UpdateSort($this->Nilai_Bayar, $bCtrl); // Nilai_Bayar
			$this->UpdateSort($this->Periode_Text, $bCtrl); // Periode_Text
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	function LoadSortOrder() {
		$sOrderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($sOrderBy == "") {
			if ($this->getSqlOrderBy() <> "") {
				$sOrderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($sOrderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)
	function ResetCmd() {

		// Check if reset command
		if (substr($this->Command,0,5) == "reset") {

			// Reset master/detail keys
			if ($this->Command == "resetall") {
				$this->setCurrentMasterTable(""); // Clear master table
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
				$this->siswa_id->setSessionValue("");
			}

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$sOrderBy = "";
				$this->setSessionOrderBy($sOrderBy);
				$this->rutin_id->setSort("");
				$this->a_Nilai->setSort("");
				$this->Tanggal_Bayar->setSort("");
				$this->Nilai_Bayar->setSort("");
				$this->Periode_Text->setSort("");
			}

			// Reset start position
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);
		}
	}

	// Set up list options
	function SetupListOptions() {
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->Add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;

		// List actions
		$item = &$this->ListOptions->Add("listactions");
		$item->CssStyle = "white-space: nowrap;";
		$item->OnLeft = FALSE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->Add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = FALSE;
		$item->Header = "<input type=\"checkbox\" name=\"key\" id=\"key\" onclick=\"ew_SelectAllKey(this);\">";
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// "sequence"
		$item = &$this->ListOptions->Add("sequence");
		$item->CssStyle = "white-space: nowrap;";
		$item->Visible = TRUE;
		$item->OnLeft = TRUE; // Always on left
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseImageAndText = TRUE;
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->Phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && ew_IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;
		$this->ListOptions->ButtonClass = "btn-sm"; // Class for button group

		// Call ListOptions_Load event
		$this->ListOptions_Load();
		$this->SetupListOptionsExt();
		$item = &$this->ListOptions->GetItem($this->ListOptions->GroupOptionName);
		$item->Visible = $this->ListOptions->GroupOptionVisible();
	}

	// Render list options
	function RenderListOptions() {
		global $Security, $Language, $objForm;
		$this->ListOptions->LoadDefault();

		// "sequence"
		$oListOpt = &$this->ListOptions->Items["sequence"];
		$oListOpt->Body = ew_FormatSeqNo($this->RecCnt);

		// Set up list action buttons
		$oListOpt = &$this->ListOptions->GetItem("listactions");
		if ($oListOpt && $this->Export == "" && $this->CurrentAction == "") {
			$body = "";
			$links = array();
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == EW_ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<span class=\"" . ew_HtmlEncode(str_replace(" ewIcon", "", $listaction->Icon)) . "\" data-caption=\"" . ew_HtmlTitle($caption) . "\"></span> " : "";
					$links[] = "<li><a class=\"ewAction ewListAction\" data-action=\"" . ew_HtmlEncode($action) . "\" data-caption=\"" . ew_HtmlTitle($caption) . "\" href=\"\" onclick=\"ew_SubmitAction(event,jQuery.extend({key:" . $this->KeyToJson() . "}," . $listaction->ToJson(TRUE) . "));return false;\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ewAction ewListAction\" data-action=\"" . ew_HtmlEncode($action) . "\" title=\"" . ew_HtmlTitle($caption) . "\" data-caption=\"" . ew_HtmlTitle($caption) . "\" href=\"\" onclick=\"ew_SubmitAction(event,jQuery.extend({key:" . $this->KeyToJson() . "}," . $listaction->ToJson(TRUE) . "));return false;\">" . $Language->Phrase("ListActionButton") . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default btn-sm ewActions\" title=\"" . ew_HtmlTitle($Language->Phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->Phrase("ListActionButton") . "<b class=\"caret\"></b></button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($oListOpt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$oListOpt->Body = $body;
				$oListOpt->Visible = TRUE;
			}
		}

		// "checkbox"
		$oListOpt = &$this->ListOptions->Items["checkbox"];
		$oListOpt->Body = "<input type=\"checkbox\" name=\"key_m[]\" value=\"" . ew_HtmlEncode($this->a_id->CurrentValue . $GLOBALS["EW_COMPOSITE_KEY_SEPARATOR"] . $this->b_id->CurrentValue) . "\" onclick='ew_ClickMultiCheckbox(event);'>";
		$this->RenderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	function SetupOtherOptions() {
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Set up options default
		foreach ($options as &$option) {
			$option->UseImageAndText = TRUE;
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;
			$option->ButtonClass = "btn-sm"; // Class for button group
			$item = &$option->Add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->Phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->Phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->Phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->Add("savecurrentfilter");
		$item->Body = "<a class=\"ewSaveFilter\" data-form=\"fv07_siswarutinbayarlistsrch\" href=\"#\">" . $Language->Phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = FALSE;
		$item = &$this->FilterOptions->Add("deletefilter");
		$item->Body = "<a class=\"ewDeleteFilter\" data-form=\"fv07_siswarutinbayarlistsrch\" href=\"#\">" . $Language->Phrase("DeleteFilter") . "</a>";
		$item->Visible = FALSE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->Phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->Add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	function RenderOtherOptions() {
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = &$options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == EW_ACTION_MULTIPLE) {
					$item = &$option->Add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon <> "") ? "<span class=\"" . ew_HtmlEncode($listaction->Icon) . "\" data-caption=\"" . ew_HtmlEncode($caption) . "\"></span> " : $caption;
					$item->Body = "<a class=\"ewAction ewListAction\" title=\"" . ew_HtmlEncode($caption) . "\" data-caption=\"" . ew_HtmlEncode($caption) . "\" href=\"\" onclick=\"ew_SubmitAction(event,jQuery.extend({f:document.fv07_siswarutinbayarlist}," . $listaction->ToJson(TRUE) . "));return false;\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecs <= 0) {
				$option = &$options["addedit"];
				$item = &$option->GetItem("gridedit");
				if ($item) $item->Visible = FALSE;
				$option = &$options["action"];
				$option->HideAllOptions();
			}
	}

	// Process list action
	function ProcessListAction() {
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$sFilter = $this->GetKeyFilter();
		$UserAction = @$_POST["useraction"];
		if ($sFilter <> "" && $UserAction <> "") {

			// Check permission first
			$ActionCaption = $UserAction;
			if (array_key_exists($UserAction, $this->ListActions->Items)) {
				$ActionCaption = $this->ListActions->Items[$UserAction]->Caption;
				if (!$this->ListActions->Items[$UserAction]->Allow) {
					$errmsg = str_replace('%s', $ActionCaption, $Language->Phrase("CustomActionNotAllowed"));
					if (@$_POST["ajax"] == $UserAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $sFilter;
			$sSql = $this->SQL();
			$conn = &$this->Connection();
			$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
			$rs = $conn->Execute($sSql);
			$conn->raiseErrorFn = '';
			$this->CurrentAction = $UserAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->BeginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$Processed = $this->Row_CustomAction($UserAction, $row);
					if (!$Processed) break;
					$rs->MoveNext();
				}
				if ($Processed) {
					$conn->CommitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage(str_replace('%s', $ActionCaption, $Language->Phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->RollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() <> "" || $this->getFailureMessage() <> "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage <> "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $ActionCaption, $Language->Phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->Close();
			$this->CurrentAction = ""; // Clear action
			if (@$_POST["ajax"] == $UserAction) { // Ajax
				if ($this->getSuccessMessage() <> "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->ClearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() <> "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->ClearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up search options
	function SetupSearchOptions() {
		global $Language;
		$this->SearchOptions = new cListOptions();
		$this->SearchOptions->Tag = "div";
		$this->SearchOptions->TagClassName = "ewSearchOption";

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseImageAndText = TRUE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->Phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->Add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->Export <> "" || $this->CurrentAction <> "")
			$this->SearchOptions->HideAllOptions();
	}

	function SetupListOptionsExt() {
		global $Security, $Language;
	}

	function RenderListOptionsExt() {
		global $Security, $Language;
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

	// Load recordset
	function LoadRecordset($offset = -1, $rowcnt = -1) {

		// Load List page SQL
		$sSql = $this->SelectSQL();
		$conn = &$this->Connection();

		// Load recordset
		$dbtype = ew_GetConnectionType($this->DBID);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = $GLOBALS["EW_ERROR_FN"];
			if ($dbtype == "MSSQL") {
				$rs = $conn->SelectLimit($sSql, $rowcnt, $offset, array("_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())));
			} else {
				$rs = $conn->SelectLimit($sSql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = '';
		} else {
			$rs = ew_LoadRecordset($sSql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
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
		$this->a_id->setDbValue($rs->fields('a_id'));
		$this->siswa_id->setDbValue($rs->fields('siswa_id'));
		$this->rutin_id->setDbValue($rs->fields('rutin_id'));
		$this->a_Nilai->setDbValue($rs->fields('a_Nilai'));
		$this->b_id->setDbValue($rs->fields('b_id'));
		$this->siswarutin_id->setDbValue($rs->fields('siswarutin_id'));
		$this->Bulan->setDbValue($rs->fields('Bulan'));
		$this->Tahun->setDbValue($rs->fields('Tahun'));
		$this->b_Nilai->setDbValue($rs->fields('b_Nilai'));
		$this->Tanggal_Bayar->setDbValue($rs->fields('Tanggal_Bayar'));
		$this->Nilai_Bayar->setDbValue($rs->fields('Nilai_Bayar'));
		$this->Periode_Tahun_Bulan->setDbValue($rs->fields('Periode_Tahun_Bulan'));
		$this->Periode_Text->setDbValue($rs->fields('Periode_Text'));
		$this->Per_Thn_Bln_Byr->setDbValue($rs->fields('Per_Thn_Bln_Byr'));
		$this->Per_Thn_Bln_Byr_Text->setDbValue($rs->fields('Per_Thn_Bln_Byr_Text'));
	}

	// Load DbValue from recordset
	function LoadDbValues(&$rs) {
		if (!$rs || !is_array($rs) && $rs->EOF) return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->a_id->DbValue = $row['a_id'];
		$this->siswa_id->DbValue = $row['siswa_id'];
		$this->rutin_id->DbValue = $row['rutin_id'];
		$this->a_Nilai->DbValue = $row['a_Nilai'];
		$this->b_id->DbValue = $row['b_id'];
		$this->siswarutin_id->DbValue = $row['siswarutin_id'];
		$this->Bulan->DbValue = $row['Bulan'];
		$this->Tahun->DbValue = $row['Tahun'];
		$this->b_Nilai->DbValue = $row['b_Nilai'];
		$this->Tanggal_Bayar->DbValue = $row['Tanggal_Bayar'];
		$this->Nilai_Bayar->DbValue = $row['Nilai_Bayar'];
		$this->Periode_Tahun_Bulan->DbValue = $row['Periode_Tahun_Bulan'];
		$this->Periode_Text->DbValue = $row['Periode_Text'];
		$this->Per_Thn_Bln_Byr->DbValue = $row['Per_Thn_Bln_Byr'];
		$this->Per_Thn_Bln_Byr_Text->DbValue = $row['Per_Thn_Bln_Byr_Text'];
	}

	// Load old record
	function LoadOldRecord() {

		// Load key values from Session
		$bValidKey = TRUE;
		if (strval($this->getKey("a_id")) <> "")
			$this->a_id->CurrentValue = $this->getKey("a_id"); // a_id
		else
			$bValidKey = FALSE;
		if (strval($this->getKey("b_id")) <> "")
			$this->b_id->CurrentValue = $this->getKey("b_id"); // b_id
		else
			$bValidKey = FALSE;

		// Load old recordset
		if ($bValidKey) {
			$this->CurrentFilter = $this->KeyFilter();
			$sSql = $this->SQL();
			$conn = &$this->Connection();
			$this->OldRecordset = ew_LoadRecordset($sSql, $conn);
			$this->LoadRowValues($this->OldRecordset); // Load row values
		} else {
			$this->OldRecordset = NULL;
		}
		return $bValidKey;
	}

	// Render row values based on field settings
	function RenderRow() {
		global $Security, $Language, $gsLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->GetViewUrl();
		$this->EditUrl = $this->GetEditUrl();
		$this->InlineEditUrl = $this->GetInlineEditUrl();
		$this->CopyUrl = $this->GetCopyUrl();
		$this->InlineCopyUrl = $this->GetInlineCopyUrl();
		$this->DeleteUrl = $this->GetDeleteUrl();

		// Convert decimal values if posted back
		if ($this->a_Nilai->FormValue == $this->a_Nilai->CurrentValue && is_numeric(ew_StrToFloat($this->a_Nilai->CurrentValue)))
			$this->a_Nilai->CurrentValue = ew_StrToFloat($this->a_Nilai->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Nilai_Bayar->FormValue == $this->Nilai_Bayar->CurrentValue && is_numeric(ew_StrToFloat($this->Nilai_Bayar->CurrentValue)))
			$this->Nilai_Bayar->CurrentValue = ew_StrToFloat($this->Nilai_Bayar->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// a_id
		// siswa_id
		// rutin_id
		// a_Nilai
		// b_id
		// siswarutin_id
		// Bulan
		// Tahun
		// b_Nilai
		// Tanggal_Bayar
		// Nilai_Bayar
		// Periode_Tahun_Bulan
		// Periode_Text
		// Per_Thn_Bln_Byr
		// Per_Thn_Bln_Byr_Text

		if ($this->RowType == EW_ROWTYPE_VIEW) { // View row

		// a_id
		$this->a_id->ViewValue = $this->a_id->CurrentValue;
		$this->a_id->ViewCustomAttributes = "";

		// siswa_id
		$this->siswa_id->ViewValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->ViewCustomAttributes = "";

		// rutin_id
		$this->rutin_id->ViewValue = $this->rutin_id->CurrentValue;
		if (strval($this->rutin_id->CurrentValue) <> "") {
			$sFilterWrk = "`id`" . ew_SearchString("=", $this->rutin_id->CurrentValue, EW_DATATYPE_NUMBER, "");
		$sSqlWrk = "SELECT `id`, `Jenis` AS `DispFld`, '' AS `Disp2Fld`, '' AS `Disp3Fld`, '' AS `Disp4Fld` FROM `t05_rutin`";
		$sWhereWrk = "";
		$this->rutin_id->LookupFilters = array();
		ew_AddFilter($sWhereWrk, $sFilterWrk);
		$this->Lookup_Selecting($this->rutin_id, $sWhereWrk); // Call Lookup selecting
		if ($sWhereWrk <> "") $sSqlWrk .= " WHERE " . $sWhereWrk;
			$rswrk = Conn()->Execute($sSqlWrk);
			if ($rswrk && !$rswrk->EOF) { // Lookup values found
				$arwrk = array();
				$arwrk[1] = $rswrk->fields('DispFld');
				$this->rutin_id->ViewValue = $this->rutin_id->DisplayValue($arwrk);
				$rswrk->Close();
			} else {
				$this->rutin_id->ViewValue = $this->rutin_id->CurrentValue;
			}
		} else {
			$this->rutin_id->ViewValue = NULL;
		}
		$this->rutin_id->ViewCustomAttributes = "";

		// a_Nilai
		$this->a_Nilai->ViewValue = $this->a_Nilai->CurrentValue;
		$this->a_Nilai->ViewValue = ew_FormatNumber($this->a_Nilai->ViewValue, 2, -2, -2, -2);
		$this->a_Nilai->CellCssStyle .= "text-align: right;";
		$this->a_Nilai->ViewCustomAttributes = "";

		// b_id
		$this->b_id->ViewValue = $this->b_id->CurrentValue;
		$this->b_id->ViewCustomAttributes = "";

		// siswarutin_id
		$this->siswarutin_id->ViewValue = $this->siswarutin_id->CurrentValue;
		$this->siswarutin_id->ViewCustomAttributes = "";

		// Bulan
		$this->Bulan->ViewValue = $this->Bulan->CurrentValue;
		$this->Bulan->ViewCustomAttributes = "";

		// Tahun
		$this->Tahun->ViewValue = $this->Tahun->CurrentValue;
		$this->Tahun->ViewCustomAttributes = "";

		// b_Nilai
		$this->b_Nilai->ViewValue = $this->b_Nilai->CurrentValue;
		$this->b_Nilai->ViewCustomAttributes = "";

		// Tanggal_Bayar
		$this->Tanggal_Bayar->ViewValue = $this->Tanggal_Bayar->CurrentValue;
		$this->Tanggal_Bayar->ViewValue = ew_FormatDateTime($this->Tanggal_Bayar->ViewValue, 0);
		$this->Tanggal_Bayar->ViewCustomAttributes = "";

		// Nilai_Bayar
		$this->Nilai_Bayar->ViewValue = $this->Nilai_Bayar->CurrentValue;
		$this->Nilai_Bayar->ViewValue = ew_FormatNumber($this->Nilai_Bayar->ViewValue, 2, -2, -2, -2);
		$this->Nilai_Bayar->CellCssStyle .= "text-align: right;";
		$this->Nilai_Bayar->ViewCustomAttributes = "";

		// Periode_Tahun_Bulan
		$this->Periode_Tahun_Bulan->ViewValue = $this->Periode_Tahun_Bulan->CurrentValue;
		$this->Periode_Tahun_Bulan->ViewCustomAttributes = "";

		// Periode_Text
		$this->Periode_Text->ViewValue = $this->Periode_Text->CurrentValue;
		$this->Periode_Text->ViewCustomAttributes = "";

		// Per_Thn_Bln_Byr
		$this->Per_Thn_Bln_Byr->ViewValue = $this->Per_Thn_Bln_Byr->CurrentValue;
		$this->Per_Thn_Bln_Byr->ViewCustomAttributes = "";

		// Per_Thn_Bln_Byr_Text
		$this->Per_Thn_Bln_Byr_Text->ViewValue = $this->Per_Thn_Bln_Byr_Text->CurrentValue;
		$this->Per_Thn_Bln_Byr_Text->ViewCustomAttributes = "";

			// rutin_id
			$this->rutin_id->LinkCustomAttributes = "";
			$this->rutin_id->HrefValue = "";
			$this->rutin_id->TooltipValue = "";

			// a_Nilai
			$this->a_Nilai->LinkCustomAttributes = "";
			$this->a_Nilai->HrefValue = "";
			$this->a_Nilai->TooltipValue = "";

			// Tanggal_Bayar
			$this->Tanggal_Bayar->LinkCustomAttributes = "";
			$this->Tanggal_Bayar->HrefValue = "";
			$this->Tanggal_Bayar->TooltipValue = "";

			// Nilai_Bayar
			$this->Nilai_Bayar->LinkCustomAttributes = "";
			$this->Nilai_Bayar->HrefValue = "";
			$this->Nilai_Bayar->TooltipValue = "";

			// Periode_Text
			$this->Periode_Text->LinkCustomAttributes = "";
			$this->Periode_Text->HrefValue = "";
			$this->Periode_Text->TooltipValue = "";
		}

		// Call Row Rendered event
		if ($this->RowType <> EW_ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
			if ($sMasterTblVar == "v06_siswa") {
				$bValidMaster = TRUE;
				if (@$_GET["fk_id"] <> "") {
					$GLOBALS["v06_siswa"]->id->setQueryStringValue($_GET["fk_id"]);
					$this->siswa_id->setQueryStringValue($GLOBALS["v06_siswa"]->id->QueryStringValue);
					$this->siswa_id->setSessionValue($this->siswa_id->QueryStringValue);
					if (!is_numeric($GLOBALS["v06_siswa"]->id->QueryStringValue)) $bValidMaster = FALSE;
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
			if ($sMasterTblVar == "v06_siswa") {
				$bValidMaster = TRUE;
				if (@$_POST["fk_id"] <> "") {
					$GLOBALS["v06_siswa"]->id->setFormValue($_POST["fk_id"]);
					$this->siswa_id->setFormValue($GLOBALS["v06_siswa"]->id->FormValue);
					$this->siswa_id->setSessionValue($this->siswa_id->FormValue);
					if (!is_numeric($GLOBALS["v06_siswa"]->id->FormValue)) $bValidMaster = FALSE;
				} else {
					$bValidMaster = FALSE;
				}
			}
		}
		if ($bValidMaster) {

			// Update URL
			$this->AddUrl = $this->AddMasterUrl($this->AddUrl);
			$this->InlineAddUrl = $this->AddMasterUrl($this->InlineAddUrl);
			$this->GridAddUrl = $this->AddMasterUrl($this->GridAddUrl);
			$this->GridEditUrl = $this->AddMasterUrl($this->GridEditUrl);

			// Save current master table
			$this->setCurrentMasterTable($sMasterTblVar);

			// Reset start record counter (new master key)
			$this->StartRec = 1;
			$this->setStartRecordNumber($this->StartRec);

			// Clear previous master key from Session
			if ($sMasterTblVar <> "v06_siswa") {
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
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->Add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example: 
		//$this->ListOptions->Items["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}
}
?>
<?php ew_Header(FALSE) ?>
<?php

// Create page object
if (!isset($v07_siswarutinbayar_list)) $v07_siswarutinbayar_list = new cv07_siswarutinbayar_list();

// Page init
$v07_siswarutinbayar_list->Page_Init();

// Page main
$v07_siswarutinbayar_list->Page_Main();

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v07_siswarutinbayar_list->Page_Render();
?>
<?php include_once "header.php" ?>
<script type="text/javascript">

// Form object
var CurrentPageID = EW_PAGE_ID = "list";
var CurrentForm = fv07_siswarutinbayarlist = new ew_Form("fv07_siswarutinbayarlist", "list");
fv07_siswarutinbayarlist.FormKeyCountName = '<?php echo $v07_siswarutinbayar_list->FormKeyCountName ?>';

// Form_CustomValidate event
fv07_siswarutinbayarlist.Form_CustomValidate = 
 function(fobj) { // DO NOT CHANGE THIS LINE!

 	// Your custom validation code here, return false if invalid. 
 	return true;
 }

// Use JavaScript validation or not
<?php if (EW_CLIENT_VALIDATE) { ?>
fv07_siswarutinbayarlist.ValidateRequired = true;
<?php } else { ?>
fv07_siswarutinbayarlist.ValidateRequired = false; 
<?php } ?>

// Dynamic selection lists
fv07_siswarutinbayarlist.Lists["x_rutin_id"] = {"LinkField":"x_id","Ajax":true,"AutoFill":false,"DisplayFields":["x_Jenis","","",""],"ParentFields":[],"ChildFields":[],"FilterFields":[],"Options":[],"Template":"","LinkTable":"t05_rutin"};

// Form object for search
</script>
<script type="text/javascript">

// Write your client script here, no need to add script tags.
</script>
<div class="ewToolbar">
<?php $Breadcrumb->Render(); ?>
<?php if ($v07_siswarutinbayar_list->TotalRecs > 0 && $v07_siswarutinbayar_list->ExportOptions->Visible()) { ?>
<?php $v07_siswarutinbayar_list->ExportOptions->Render("body") ?>
<?php } ?>
<?php echo $Language->SelectionForm(); ?>
<div class="clearfix"></div>
</div>
<?php if (($v07_siswarutinbayar->Export == "") || (EW_EXPORT_MASTER_RECORD && $v07_siswarutinbayar->Export == "print")) { ?>
<?php
if ($v07_siswarutinbayar_list->DbMasterFilter <> "" && $v07_siswarutinbayar->getCurrentMasterTable() == "v06_siswa") {
	if ($v07_siswarutinbayar_list->MasterRecordExists) {
?>
<?php include_once "v06_siswamaster.php" ?>
<?php
	}
}
?>
<?php } ?>
<?php
	$bSelectLimit = $v07_siswarutinbayar_list->UseSelectLimit;
	if ($bSelectLimit) {
		if ($v07_siswarutinbayar_list->TotalRecs <= 0)
			$v07_siswarutinbayar_list->TotalRecs = $v07_siswarutinbayar->SelectRecordCount();
	} else {
		if (!$v07_siswarutinbayar_list->Recordset && ($v07_siswarutinbayar_list->Recordset = $v07_siswarutinbayar_list->LoadRecordset()))
			$v07_siswarutinbayar_list->TotalRecs = $v07_siswarutinbayar_list->Recordset->RecordCount();
	}
	$v07_siswarutinbayar_list->StartRec = 1;
	if ($v07_siswarutinbayar_list->DisplayRecs <= 0 || ($v07_siswarutinbayar->Export <> "" && $v07_siswarutinbayar->ExportAll)) // Display all records
		$v07_siswarutinbayar_list->DisplayRecs = $v07_siswarutinbayar_list->TotalRecs;
	if (!($v07_siswarutinbayar->Export <> "" && $v07_siswarutinbayar->ExportAll))
		$v07_siswarutinbayar_list->SetUpStartRec(); // Set up start record position
	if ($bSelectLimit)
		$v07_siswarutinbayar_list->Recordset = $v07_siswarutinbayar_list->LoadRecordset($v07_siswarutinbayar_list->StartRec-1, $v07_siswarutinbayar_list->DisplayRecs);

	// Set no record found message
	if ($v07_siswarutinbayar->CurrentAction == "" && $v07_siswarutinbayar_list->TotalRecs == 0) {
		if ($v07_siswarutinbayar_list->SearchWhere == "0=101")
			$v07_siswarutinbayar_list->setWarningMessage($Language->Phrase("EnterSearchCriteria"));
		else
			$v07_siswarutinbayar_list->setWarningMessage($Language->Phrase("NoRecord"));
	}
$v07_siswarutinbayar_list->RenderOtherOptions();
?>
<?php $v07_siswarutinbayar_list->ShowPageHeader(); ?>
<?php
$v07_siswarutinbayar_list->ShowMessage();
?>
<?php if ($v07_siswarutinbayar_list->TotalRecs > 0 || $v07_siswarutinbayar->CurrentAction <> "") { ?>
<div class="panel panel-default ewGrid v07_siswarutinbayar">
<form name="fv07_siswarutinbayarlist" id="fv07_siswarutinbayarlist" class="form-inline ewForm ewListForm" action="<?php echo ew_CurrentPage() ?>" method="post">
<?php if ($v07_siswarutinbayar_list->CheckToken) { ?>
<input type="hidden" name="<?php echo EW_TOKEN_NAME ?>" value="<?php echo $v07_siswarutinbayar_list->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v07_siswarutinbayar">
<?php if ($v07_siswarutinbayar->getCurrentMasterTable() == "v06_siswa" && $v07_siswarutinbayar->CurrentAction <> "") { ?>
<input type="hidden" name="<?php echo EW_TABLE_SHOW_MASTER ?>" value="v06_siswa">
<input type="hidden" name="fk_id" value="<?php echo $v07_siswarutinbayar->siswa_id->getSessionValue() ?>">
<?php } ?>
<div id="gmp_v07_siswarutinbayar" class="<?php if (ew_IsResponsiveLayout()) { echo "table-responsive "; } ?>ewGridMiddlePanel">
<?php if ($v07_siswarutinbayar_list->TotalRecs > 0 || $v07_siswarutinbayar->CurrentAction == "gridedit") { ?>
<table id="tbl_v07_siswarutinbayarlist" class="table ewTable">
<?php echo $v07_siswarutinbayar->TableCustomInnerHtml ?>
<thead><!-- Table header -->
	<tr class="ewTableHeader">
<?php

// Header row
$v07_siswarutinbayar_list->RowType = EW_ROWTYPE_HEADER;

// Render list options
$v07_siswarutinbayar_list->RenderListOptions();

// Render list options (header, left)
$v07_siswarutinbayar_list->ListOptions->Render("header", "left");
?>
<?php if ($v07_siswarutinbayar->rutin_id->Visible) { // rutin_id ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->rutin_id) == "") { ?>
		<th data-name="rutin_id"><div id="elh_v07_siswarutinbayar_rutin_id" class="v07_siswarutinbayar_rutin_id"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->rutin_id->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="rutin_id"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->rutin_id) ?>',2);"><div id="elh_v07_siswarutinbayar_rutin_id" class="v07_siswarutinbayar_rutin_id">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->rutin_id->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->rutin_id->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->rutin_id->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php if ($v07_siswarutinbayar->a_Nilai->Visible) { // a_Nilai ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->a_Nilai) == "") { ?>
		<th data-name="a_Nilai"><div id="elh_v07_siswarutinbayar_a_Nilai" class="v07_siswarutinbayar_a_Nilai"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->a_Nilai->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="a_Nilai"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->a_Nilai) ?>',2);"><div id="elh_v07_siswarutinbayar_a_Nilai" class="v07_siswarutinbayar_a_Nilai">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->a_Nilai->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->a_Nilai->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->a_Nilai->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php if ($v07_siswarutinbayar->Tanggal_Bayar->Visible) { // Tanggal_Bayar ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Tanggal_Bayar) == "") { ?>
		<th data-name="Tanggal_Bayar"><div id="elh_v07_siswarutinbayar_Tanggal_Bayar" class="v07_siswarutinbayar_Tanggal_Bayar"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Tanggal_Bayar->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Tanggal_Bayar"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Tanggal_Bayar) ?>',2);"><div id="elh_v07_siswarutinbayar_Tanggal_Bayar" class="v07_siswarutinbayar_Tanggal_Bayar">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Tanggal_Bayar->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->Tanggal_Bayar->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->Tanggal_Bayar->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php if ($v07_siswarutinbayar->Nilai_Bayar->Visible) { // Nilai_Bayar ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Nilai_Bayar) == "") { ?>
		<th data-name="Nilai_Bayar"><div id="elh_v07_siswarutinbayar_Nilai_Bayar" class="v07_siswarutinbayar_Nilai_Bayar"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Nilai_Bayar->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Nilai_Bayar"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Nilai_Bayar) ?>',2);"><div id="elh_v07_siswarutinbayar_Nilai_Bayar" class="v07_siswarutinbayar_Nilai_Bayar">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Nilai_Bayar->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->Nilai_Bayar->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->Nilai_Bayar->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php if ($v07_siswarutinbayar->Periode_Text->Visible) { // Periode_Text ?>
	<?php if ($v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Periode_Text) == "") { ?>
		<th data-name="Periode_Text"><div id="elh_v07_siswarutinbayar_Periode_Text" class="v07_siswarutinbayar_Periode_Text"><div class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Periode_Text->FldCaption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Periode_Text"><div class="ewPointer" onclick="ew_Sort(event,'<?php echo $v07_siswarutinbayar->SortUrl($v07_siswarutinbayar->Periode_Text) ?>',2);"><div id="elh_v07_siswarutinbayar_Periode_Text" class="v07_siswarutinbayar_Periode_Text">
			<div class="ewTableHeaderBtn"><span class="ewTableHeaderCaption"><?php echo $v07_siswarutinbayar->Periode_Text->FldCaption() ?></span><span class="ewTableHeaderSort"><?php if ($v07_siswarutinbayar->Periode_Text->getSort() == "ASC") { ?><span class="caret ewSortUp"></span><?php } elseif ($v07_siswarutinbayar->Periode_Text->getSort() == "DESC") { ?><span class="caret"></span><?php } ?></span></div>
        </div></div></th>
	<?php } ?>
<?php } ?>		
<?php

// Render list options (header, right)
$v07_siswarutinbayar_list->ListOptions->Render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v07_siswarutinbayar->ExportAll && $v07_siswarutinbayar->Export <> "") {
	$v07_siswarutinbayar_list->StopRec = $v07_siswarutinbayar_list->TotalRecs;
} else {

	// Set the last record to display
	if ($v07_siswarutinbayar_list->TotalRecs > $v07_siswarutinbayar_list->StartRec + $v07_siswarutinbayar_list->DisplayRecs - 1)
		$v07_siswarutinbayar_list->StopRec = $v07_siswarutinbayar_list->StartRec + $v07_siswarutinbayar_list->DisplayRecs - 1;
	else
		$v07_siswarutinbayar_list->StopRec = $v07_siswarutinbayar_list->TotalRecs;
}
$v07_siswarutinbayar_list->RecCnt = $v07_siswarutinbayar_list->StartRec - 1;
if ($v07_siswarutinbayar_list->Recordset && !$v07_siswarutinbayar_list->Recordset->EOF) {
	$v07_siswarutinbayar_list->Recordset->MoveFirst();
	$bSelectLimit = $v07_siswarutinbayar_list->UseSelectLimit;
	if (!$bSelectLimit && $v07_siswarutinbayar_list->StartRec > 1)
		$v07_siswarutinbayar_list->Recordset->Move($v07_siswarutinbayar_list->StartRec - 1);
} elseif (!$v07_siswarutinbayar->AllowAddDeleteRow && $v07_siswarutinbayar_list->StopRec == 0) {
	$v07_siswarutinbayar_list->StopRec = $v07_siswarutinbayar->GridAddRowCount;
}

// Initialize aggregate
$v07_siswarutinbayar->RowType = EW_ROWTYPE_AGGREGATEINIT;
$v07_siswarutinbayar->ResetAttrs();
$v07_siswarutinbayar_list->RenderRow();
while ($v07_siswarutinbayar_list->RecCnt < $v07_siswarutinbayar_list->StopRec) {
	$v07_siswarutinbayar_list->RecCnt++;
	if (intval($v07_siswarutinbayar_list->RecCnt) >= intval($v07_siswarutinbayar_list->StartRec)) {
		$v07_siswarutinbayar_list->RowCnt++;

		// Set up key count
		$v07_siswarutinbayar_list->KeyCount = $v07_siswarutinbayar_list->RowIndex;

		// Init row class and style
		$v07_siswarutinbayar->ResetAttrs();
		$v07_siswarutinbayar->CssClass = "";
		if ($v07_siswarutinbayar->CurrentAction == "gridadd") {
		} else {
			$v07_siswarutinbayar_list->LoadRowValues($v07_siswarutinbayar_list->Recordset); // Load row values
		}
		$v07_siswarutinbayar->RowType = EW_ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v07_siswarutinbayar->RowAttrs = array_merge($v07_siswarutinbayar->RowAttrs, array('data-rowindex'=>$v07_siswarutinbayar_list->RowCnt, 'id'=>'r' . $v07_siswarutinbayar_list->RowCnt . '_v07_siswarutinbayar', 'data-rowtype'=>$v07_siswarutinbayar->RowType));

		// Render row
		$v07_siswarutinbayar_list->RenderRow();

		// Render list options
		$v07_siswarutinbayar_list->RenderListOptions();
?>
	<tr<?php echo $v07_siswarutinbayar->RowAttributes() ?>>
<?php

// Render list options (body, left)
$v07_siswarutinbayar_list->ListOptions->Render("body", "left", $v07_siswarutinbayar_list->RowCnt);
?>
	<?php if ($v07_siswarutinbayar->rutin_id->Visible) { // rutin_id ?>
		<td data-name="rutin_id"<?php echo $v07_siswarutinbayar->rutin_id->CellAttributes() ?>>
<span id="el<?php echo $v07_siswarutinbayar_list->RowCnt ?>_v07_siswarutinbayar_rutin_id" class="v07_siswarutinbayar_rutin_id">
<span<?php echo $v07_siswarutinbayar->rutin_id->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->rutin_id->ListViewValue() ?></span>
</span>
<a id="<?php echo $v07_siswarutinbayar_list->PageObjName . "_row_" . $v07_siswarutinbayar_list->RowCnt ?>"></a></td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->a_Nilai->Visible) { // a_Nilai ?>
		<td data-name="a_Nilai"<?php echo $v07_siswarutinbayar->a_Nilai->CellAttributes() ?>>
<span id="el<?php echo $v07_siswarutinbayar_list->RowCnt ?>_v07_siswarutinbayar_a_Nilai" class="v07_siswarutinbayar_a_Nilai">
<span<?php echo $v07_siswarutinbayar->a_Nilai->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->a_Nilai->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Tanggal_Bayar->Visible) { // Tanggal_Bayar ?>
		<td data-name="Tanggal_Bayar"<?php echo $v07_siswarutinbayar->Tanggal_Bayar->CellAttributes() ?>>
<span id="el<?php echo $v07_siswarutinbayar_list->RowCnt ?>_v07_siswarutinbayar_Tanggal_Bayar" class="v07_siswarutinbayar_Tanggal_Bayar">
<span<?php echo $v07_siswarutinbayar->Tanggal_Bayar->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->Tanggal_Bayar->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Nilai_Bayar->Visible) { // Nilai_Bayar ?>
		<td data-name="Nilai_Bayar"<?php echo $v07_siswarutinbayar->Nilai_Bayar->CellAttributes() ?>>
<span id="el<?php echo $v07_siswarutinbayar_list->RowCnt ?>_v07_siswarutinbayar_Nilai_Bayar" class="v07_siswarutinbayar_Nilai_Bayar">
<span<?php echo $v07_siswarutinbayar->Nilai_Bayar->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->Nilai_Bayar->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v07_siswarutinbayar->Periode_Text->Visible) { // Periode_Text ?>
		<td data-name="Periode_Text"<?php echo $v07_siswarutinbayar->Periode_Text->CellAttributes() ?>>
<span id="el<?php echo $v07_siswarutinbayar_list->RowCnt ?>_v07_siswarutinbayar_Periode_Text" class="v07_siswarutinbayar_Periode_Text">
<span<?php echo $v07_siswarutinbayar->Periode_Text->ViewAttributes() ?>>
<?php echo $v07_siswarutinbayar->Periode_Text->ListViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v07_siswarutinbayar_list->ListOptions->Render("body", "right", $v07_siswarutinbayar_list->RowCnt);
?>
	</tr>
<?php
	}
	if ($v07_siswarutinbayar->CurrentAction <> "gridadd")
		$v07_siswarutinbayar_list->Recordset->MoveNext();
}
?>
</tbody>
</table>
<?php } ?>
<?php if ($v07_siswarutinbayar->CurrentAction == "") { ?>
<input type="hidden" name="a_list" id="a_list" value="">
<?php } ?>
</div>
</form>
<?php

// Close recordset
if ($v07_siswarutinbayar_list->Recordset)
	$v07_siswarutinbayar_list->Recordset->Close();
?>
<div class="panel-footer ewGridLowerPanel">
<?php if ($v07_siswarutinbayar->CurrentAction <> "gridadd" && $v07_siswarutinbayar->CurrentAction <> "gridedit") { ?>
<form name="ewPagerForm" class="ewForm form-inline ewPagerForm" action="<?php echo ew_CurrentPage() ?>">
<?php if (!isset($v07_siswarutinbayar_list->Pager)) $v07_siswarutinbayar_list->Pager = new cPrevNextPager($v07_siswarutinbayar_list->StartRec, $v07_siswarutinbayar_list->DisplayRecs, $v07_siswarutinbayar_list->TotalRecs) ?>
<?php if ($v07_siswarutinbayar_list->Pager->RecordCount > 0 && $v07_siswarutinbayar_list->Pager->Visible) { ?>
<div class="ewPager">
<span><?php echo $Language->Phrase("Page") ?>&nbsp;</span>
<div class="ewPrevNext"><div class="input-group">
<div class="input-group-btn">
<!--first page button-->
	<?php if ($v07_siswarutinbayar_list->Pager->FirstButton->Enabled) { ?>
	<a class="btn btn-default btn-sm" title="<?php echo $Language->Phrase("PagerFirst") ?>" href="<?php echo $v07_siswarutinbayar_list->PageUrl() ?>start=<?php echo $v07_siswarutinbayar_list->Pager->FirstButton->Start ?>"><span class="icon-first ewIcon"></span></a>
	<?php } else { ?>
	<a class="btn btn-default btn-sm disabled" title="<?php echo $Language->Phrase("PagerFirst") ?>"><span class="icon-first ewIcon"></span></a>
	<?php } ?>
<!--previous page button-->
	<?php if ($v07_siswarutinbayar_list->Pager->PrevButton->Enabled) { ?>
	<a class="btn btn-default btn-sm" title="<?php echo $Language->Phrase("PagerPrevious") ?>" href="<?php echo $v07_siswarutinbayar_list->PageUrl() ?>start=<?php echo $v07_siswarutinbayar_list->Pager->PrevButton->Start ?>"><span class="icon-prev ewIcon"></span></a>
	<?php } else { ?>
	<a class="btn btn-default btn-sm disabled" title="<?php echo $Language->Phrase("PagerPrevious") ?>"><span class="icon-prev ewIcon"></span></a>
	<?php } ?>
</div>
<!--current page number-->
	<input class="form-control input-sm" type="text" name="<?php echo EW_TABLE_PAGE_NO ?>" value="<?php echo $v07_siswarutinbayar_list->Pager->CurrentPage ?>">
<div class="input-group-btn">
<!--next page button-->
	<?php if ($v07_siswarutinbayar_list->Pager->NextButton->Enabled) { ?>
	<a class="btn btn-default btn-sm" title="<?php echo $Language->Phrase("PagerNext") ?>" href="<?php echo $v07_siswarutinbayar_list->PageUrl() ?>start=<?php echo $v07_siswarutinbayar_list->Pager->NextButton->Start ?>"><span class="icon-next ewIcon"></span></a>
	<?php } else { ?>
	<a class="btn btn-default btn-sm disabled" title="<?php echo $Language->Phrase("PagerNext") ?>"><span class="icon-next ewIcon"></span></a>
	<?php } ?>
<!--last page button-->
	<?php if ($v07_siswarutinbayar_list->Pager->LastButton->Enabled) { ?>
	<a class="btn btn-default btn-sm" title="<?php echo $Language->Phrase("PagerLast") ?>" href="<?php echo $v07_siswarutinbayar_list->PageUrl() ?>start=<?php echo $v07_siswarutinbayar_list->Pager->LastButton->Start ?>"><span class="icon-last ewIcon"></span></a>
	<?php } else { ?>
	<a class="btn btn-default btn-sm disabled" title="<?php echo $Language->Phrase("PagerLast") ?>"><span class="icon-last ewIcon"></span></a>
	<?php } ?>
</div>
</div>
</div>
<span>&nbsp;<?php echo $Language->Phrase("of") ?>&nbsp;<?php echo $v07_siswarutinbayar_list->Pager->PageCount ?></span>
</div>
<div class="ewPager ewRec">
	<span><?php echo $Language->Phrase("Record") ?>&nbsp;<?php echo $v07_siswarutinbayar_list->Pager->FromIndex ?>&nbsp;<?php echo $Language->Phrase("To") ?>&nbsp;<?php echo $v07_siswarutinbayar_list->Pager->ToIndex ?>&nbsp;<?php echo $Language->Phrase("Of") ?>&nbsp;<?php echo $v07_siswarutinbayar_list->Pager->RecordCount ?></span>
</div>
<?php } ?>
</form>
<?php } ?>
<div class="ewListOtherOptions">
<?php
	foreach ($v07_siswarutinbayar_list->OtherOptions as &$option)
		$option->Render("body", "bottom");
?>
</div>
<div class="clearfix"></div>
</div>
</div>
<?php } ?>
<?php if ($v07_siswarutinbayar_list->TotalRecs == 0 && $v07_siswarutinbayar->CurrentAction == "") { // Show other options ?>
<div class="ewListOtherOptions">
<?php
	foreach ($v07_siswarutinbayar_list->OtherOptions as &$option) {
		$option->ButtonClass = "";
		$option->Render("body", "");
	}
?>
</div>
<div class="clearfix"></div>
<?php } ?>
<script type="text/javascript">
fv07_siswarutinbayarlist.Init();
</script>
<?php
$v07_siswarutinbayar_list->ShowPageFooter();
if (EW_DEBUG_ENABLED)
	echo ew_DebugMsg();
?>
<script type="text/javascript">

// Write your table-specific startup script here
// document.write("page loaded");

</script>
<?php include_once "footer.php" ?>
<?php
$v07_siswarutinbayar_list->Page_Terminate();
?>
