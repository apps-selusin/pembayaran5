<?php

// Global variable for table object
$v07_siswarutinbayar = NULL;

//
// Table class for v07_siswarutinbayar
//
class cv07_siswarutinbayar extends cTable {
	var $a_id;
	var $siswa_id;
	var $rutin_id;
	var $a_Nilai;
	var $b_id;
	var $siswarutin_id;
	var $Bulan;
	var $Tahun;
	var $b_Nilai;
	var $Tanggal_Bayar;
	var $Nilai_Bayar;
	var $Periode_Tahun_Bulan;
	var $Periode_Text;
	var $Per_Thn_Bln_Byr;
	var $Per_Thn_Bln_Byr_Text;

	//
	// Table class constructor
	//
	function __construct() {
		global $Language;

		// Language object
		if (!isset($Language)) $Language = new cLanguage();
		$this->TableVar = 'v07_siswarutinbayar';
		$this->TableName = 'v07_siswarutinbayar';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v07_siswarutinbayar`";
		$this->DBID = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PHPExcel only)
		$this->ExportExcelPageSize = ""; // Page size (PHPExcel only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 1;
		$this->AllowAddDeleteRow = ew_AllowAddDeleteRow(); // Allow add/delete row
		$this->UserIDAllowSecurity = 0; // User ID Allow
		$this->BasicSearch = new cBasicSearch($this->TableVar);

		// a_id
		$this->a_id = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_a_id', 'a_id', '`a_id`', '`a_id`', 3, -1, FALSE, '`a_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->a_id->Sortable = TRUE; // Allow sort
		$this->a_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['a_id'] = &$this->a_id;

		// siswa_id
		$this->siswa_id = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_siswa_id', 'siswa_id', '`siswa_id`', '`siswa_id`', 3, -1, FALSE, '`siswa_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->siswa_id->Sortable = TRUE; // Allow sort
		$this->siswa_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['siswa_id'] = &$this->siswa_id;

		// rutin_id
		$this->rutin_id = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_rutin_id', 'rutin_id', '`rutin_id`', '`rutin_id`', 3, -1, FALSE, '`rutin_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->rutin_id->Sortable = TRUE; // Allow sort
		$this->rutin_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['rutin_id'] = &$this->rutin_id;

		// a_Nilai
		$this->a_Nilai = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_a_Nilai', 'a_Nilai', '`a_Nilai`', '`a_Nilai`', 4, -1, FALSE, '`a_Nilai`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->a_Nilai->Sortable = TRUE; // Allow sort
		$this->a_Nilai->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['a_Nilai'] = &$this->a_Nilai;

		// b_id
		$this->b_id = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_b_id', 'b_id', '`b_id`', '`b_id`', 3, -1, FALSE, '`b_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->b_id->Sortable = TRUE; // Allow sort
		$this->b_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['b_id'] = &$this->b_id;

		// siswarutin_id
		$this->siswarutin_id = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_siswarutin_id', 'siswarutin_id', '`siswarutin_id`', '`siswarutin_id`', 3, -1, FALSE, '`siswarutin_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->siswarutin_id->Sortable = TRUE; // Allow sort
		$this->siswarutin_id->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['siswarutin_id'] = &$this->siswarutin_id;

		// Bulan
		$this->Bulan = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_Bulan', 'Bulan', '`Bulan`', '`Bulan`', 16, -1, FALSE, '`Bulan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Bulan->Sortable = TRUE; // Allow sort
		$this->Bulan->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Bulan'] = &$this->Bulan;

		// Tahun
		$this->Tahun = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_Tahun', 'Tahun', '`Tahun`', '`Tahun`', 2, -1, FALSE, '`Tahun`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tahun->Sortable = TRUE; // Allow sort
		$this->Tahun->FldDefaultErrMsg = $Language->Phrase("IncorrectInteger");
		$this->fields['Tahun'] = &$this->Tahun;

		// b_Nilai
		$this->b_Nilai = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_b_Nilai', 'b_Nilai', '`b_Nilai`', '`b_Nilai`', 4, -1, FALSE, '`b_Nilai`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->b_Nilai->Sortable = TRUE; // Allow sort
		$this->b_Nilai->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['b_Nilai'] = &$this->b_Nilai;

		// Tanggal_Bayar
		$this->Tanggal_Bayar = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_Tanggal_Bayar', 'Tanggal_Bayar', '`Tanggal_Bayar`', ew_CastDateFieldForLike('`Tanggal_Bayar`', 0, "DB"), 133, 0, FALSE, '`Tanggal_Bayar`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Tanggal_Bayar->Sortable = TRUE; // Allow sort
		$this->Tanggal_Bayar->FldDefaultErrMsg = str_replace("%s", $GLOBALS["EW_DATE_FORMAT"], $Language->Phrase("IncorrectDate"));
		$this->fields['Tanggal_Bayar'] = &$this->Tanggal_Bayar;

		// Nilai_Bayar
		$this->Nilai_Bayar = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_Nilai_Bayar', 'Nilai_Bayar', '`Nilai_Bayar`', '`Nilai_Bayar`', 4, -1, FALSE, '`Nilai_Bayar`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Nilai_Bayar->Sortable = TRUE; // Allow sort
		$this->Nilai_Bayar->FldDefaultErrMsg = $Language->Phrase("IncorrectFloat");
		$this->fields['Nilai_Bayar'] = &$this->Nilai_Bayar;

		// Periode_Tahun_Bulan
		$this->Periode_Tahun_Bulan = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_Periode_Tahun_Bulan', 'Periode_Tahun_Bulan', '`Periode_Tahun_Bulan`', '`Periode_Tahun_Bulan`', 200, -1, FALSE, '`Periode_Tahun_Bulan`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Periode_Tahun_Bulan->Sortable = TRUE; // Allow sort
		$this->fields['Periode_Tahun_Bulan'] = &$this->Periode_Tahun_Bulan;

		// Periode_Text
		$this->Periode_Text = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_Periode_Text', 'Periode_Text', '`Periode_Text`', '`Periode_Text`', 200, -1, FALSE, '`Periode_Text`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Periode_Text->Sortable = TRUE; // Allow sort
		$this->fields['Periode_Text'] = &$this->Periode_Text;

		// Per_Thn_Bln_Byr
		$this->Per_Thn_Bln_Byr = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_Per_Thn_Bln_Byr', 'Per_Thn_Bln_Byr', '`Per_Thn_Bln_Byr`', '`Per_Thn_Bln_Byr`', 200, -1, FALSE, '`Per_Thn_Bln_Byr`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Per_Thn_Bln_Byr->Sortable = TRUE; // Allow sort
		$this->fields['Per_Thn_Bln_Byr'] = &$this->Per_Thn_Bln_Byr;

		// Per_Thn_Bln_Byr_Text
		$this->Per_Thn_Bln_Byr_Text = new cField('v07_siswarutinbayar', 'v07_siswarutinbayar', 'x_Per_Thn_Bln_Byr_Text', 'Per_Thn_Bln_Byr_Text', '`Per_Thn_Bln_Byr_Text`', '`Per_Thn_Bln_Byr_Text`', 200, -1, FALSE, '`Per_Thn_Bln_Byr_Text`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Per_Thn_Bln_Byr_Text->Sortable = TRUE; // Allow sort
		$this->fields['Per_Thn_Bln_Byr_Text'] = &$this->Per_Thn_Bln_Byr_Text;
	}

	// Set Field Visibility
	function SetFieldVisibility($fldparm) {
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Multiple column sort
	function UpdateSort(&$ofld, $ctrl) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			if ($ctrl) {
				$sOrderBy = $this->getSessionOrderBy();
				if (strpos($sOrderBy, $sSortField . " " . $sLastSort) !== FALSE) {
					$sOrderBy = str_replace($sSortField . " " . $sLastSort, $sSortField . " " . $sThisSort, $sOrderBy);
				} else {
					if ($sOrderBy <> "") $sOrderBy .= ", ";
					$sOrderBy .= $sSortField . " " . $sThisSort;
				}
				$this->setSessionOrderBy($sOrderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sSortField . " " . $sThisSort); // Save to Session
			}
		} else {
			if (!$ctrl) $ofld->setSort("");
		}
	}

	// Current master table name
	function getCurrentMasterTable() {
		return @$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_MASTER_TABLE];
	}

	function setCurrentMasterTable($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_MASTER_TABLE] = $v;
	}

	// Session master WHERE clause
	function GetMasterFilter() {

		// Master filter
		$sMasterFilter = "";
		if ($this->getCurrentMasterTable() == "v06_siswa") {
			if ($this->siswa_id->getSessionValue() <> "")
				$sMasterFilter .= "`id`=" . ew_QuotedValue($this->siswa_id->getSessionValue(), EW_DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $sMasterFilter;
	}

	// Session detail WHERE clause
	function GetDetailFilter() {

		// Detail filter
		$sDetailFilter = "";
		if ($this->getCurrentMasterTable() == "v06_siswa") {
			if ($this->siswa_id->getSessionValue() <> "")
				$sDetailFilter .= "`siswa_id`=" . ew_QuotedValue($this->siswa_id->getSessionValue(), EW_DATATYPE_NUMBER, "DB");
			else
				return "";
		}
		return $sDetailFilter;
	}

	// Master filter
	function SqlMasterFilter_v06_siswa() {
		return "`id`=@id@";
	}

	// Detail filter
	function SqlDetailFilter_v06_siswa() {
		return "`siswa_id`=@siswa_id@";
	}

	// Table level SQL
	var $_SqlFrom = "";

	function getSqlFrom() { // From
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`v07_siswarutinbayar`";
	}

	function SqlFrom() { // For backward compatibility
		return $this->getSqlFrom();
	}

	function setSqlFrom($v) {
		$this->_SqlFrom = $v;
	}
	var $_SqlSelect = "";

	function getSqlSelect() { // Select
		return ($this->_SqlSelect <> "") ? $this->_SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelect() { // For backward compatibility
		return $this->getSqlSelect();
	}

	function setSqlSelect($v) {
		$this->_SqlSelect = $v;
	}
	var $_SqlWhere = "";

	function getSqlWhere() { // Where
		$sWhere = ($this->_SqlWhere <> "") ? $this->_SqlWhere : "";
		$this->TableFilter = "";
		ew_AddFilter($sWhere, $this->TableFilter);
		return $sWhere;
	}

	function SqlWhere() { // For backward compatibility
		return $this->getSqlWhere();
	}

	function setSqlWhere($v) {
		$this->_SqlWhere = $v;
	}
	var $_SqlGroupBy = "";

	function getSqlGroupBy() { // Group By
		return ($this->_SqlGroupBy <> "") ? $this->_SqlGroupBy : "";
	}

	function SqlGroupBy() { // For backward compatibility
		return $this->getSqlGroupBy();
	}

	function setSqlGroupBy($v) {
		$this->_SqlGroupBy = $v;
	}
	var $_SqlHaving = "";

	function getSqlHaving() { // Having
		return ($this->_SqlHaving <> "") ? $this->_SqlHaving : "";
	}

	function SqlHaving() { // For backward compatibility
		return $this->getSqlHaving();
	}

	function setSqlHaving($v) {
		$this->_SqlHaving = $v;
	}
	var $_SqlOrderBy = "";

	function getSqlOrderBy() { // Order By
		return ($this->_SqlOrderBy <> "") ? $this->_SqlOrderBy : "";
	}

	function SqlOrderBy() { // For backward compatibility
		return $this->getSqlOrderBy();
	}

	function setSqlOrderBy($v) {
		$this->_SqlOrderBy = $v;
	}

	// Apply User ID filters
	function ApplyUserIDFilters($sFilter) {
		return $sFilter;
	}

	// Check if User ID security allows view all
	function UserIDAllow($id = "") {
		$allow = EW_USER_ID_ALLOW;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get SQL
	function GetSQL($where, $orderby) {
		return ew_BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderby);
	}

	// Table SQL
	function SQL() {
		$sFilter = $this->CurrentFilter;
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$sFilter, $sSort);
	}

	// Table SQL with List page filter
	function SelectSQL() {
		$sFilter = $this->getSessionWhere();
		ew_AddFilter($sFilter, $this->CurrentFilter);
		$sFilter = $this->ApplyUserIDFilters($sFilter);
		$this->Recordset_Selecting($sFilter);
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $sFilter, $sSort);
	}

	// Get ORDER BY clause
	function GetOrderBy() {
		$sSort = $this->getSessionOrderBy();
		return ew_BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sSort);
	}

	// Try to get record count
	function TryGetRecordCount($sSql) {
		$cnt = -1;
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') && preg_match("/^SELECT \* FROM/i", $sSql)) {
			$sSql = "SELECT COUNT(*) FROM" . preg_replace('/^SELECT\s([\s\S]+)?\*\sFROM/i', "", $sSql);
			$sOrderBy = $this->GetOrderBy();
			if (substr($sSql, strlen($sOrderBy) * -1) == $sOrderBy)
				$sSql = substr($sSql, 0, strlen($sSql) - strlen($sOrderBy)); // Remove ORDER BY clause
		} else {
			$sSql = "SELECT COUNT(*) FROM (" . $sSql . ") EW_COUNT_TABLE";
		}
		$conn = &$this->Connection();
		if ($rs = $conn->Execute($sSql)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// Get record count based on filter (for detail record count in master table pages)
	function LoadRecordCount($sFilter) {
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $sFilter;
		$this->Recordset_Selecting($this->CurrentFilter);

		//$sSql = $this->SQL();
		$sSql = $this->GetSQL($this->CurrentFilter, "");
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			if ($rs = $this->LoadRs($this->CurrentFilter)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		$this->CurrentFilter = $origFilter;
		return intval($cnt);
	}

	// Get record count (for current List page)
	function SelectRecordCount() {
		$sSql = $this->SelectSQL();
		$cnt = $this->TryGetRecordCount($sSql);
		if ($cnt == -1) {
			$conn = &$this->Connection();
			if ($rs = $conn->Execute($sSql)) {
				$cnt = $rs->RecordCount();
				$rs->Close();
			}
		}
		return intval($cnt);
	}

	// INSERT statement
	function InsertSQL(&$rs) {
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->FldIsCustom)
				continue;
			$names .= $this->fields[$name]->FldExpression . ",";
			$values .= ew_QuotedValue($value, $this->fields[$name]->FldDataType, $this->DBID) . ",";
		}
		while (substr($names, -1) == ",")
			$names = substr($names, 0, -1);
		while (substr($values, -1) == ",")
			$values = substr($values, 0, -1);
		return "INSERT INTO " . $this->UpdateTable . " ($names) VALUES ($values)";
	}

	// Insert
	function Insert(&$rs) {
		$conn = &$this->Connection();
		$bInsert = $conn->Execute($this->InsertSQL($rs));
		if ($bInsert) {

			// Get insert id if necessary
			$this->a_id->setDbValue($conn->Insert_ID());
			$rs['a_id'] = $this->a_id->DbValue;

			// Get insert id if necessary
			$this->b_id->setDbValue($conn->Insert_ID());
			$rs['b_id'] = $this->b_id->DbValue;
		}
		return $bInsert;
	}

	// UPDATE statement
	function UpdateSQL(&$rs, $where = "", $curfilter = TRUE) {
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->FldIsCustom)
				continue;
			$sql .= $this->fields[$name]->FldExpression . "=";
			$sql .= ew_QuotedValue($value, $this->fields[$name]->FldDataType, $this->DBID) . ",";
		}
		while (substr($sql, -1) == ",")
			$sql = substr($sql, 0, -1);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->ArrayToFilter($where);
		ew_AddFilter($filter, $where);
		if ($filter <> "")	$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	function Update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE) {
		$conn = &$this->Connection();
		$bUpdate = $conn->Execute($this->UpdateSQL($rs, $where, $curfilter));
		return $bUpdate;
	}

	// DELETE statement
	function DeleteSQL(&$rs, $where = "", $curfilter = TRUE) {
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->ArrayToFilter($where);
		if ($rs) {
			if (array_key_exists('a_id', $rs))
				ew_AddFilter($where, ew_QuotedName('a_id', $this->DBID) . '=' . ew_QuotedValue($rs['a_id'], $this->a_id->FldDataType, $this->DBID));
			if (array_key_exists('b_id', $rs))
				ew_AddFilter($where, ew_QuotedName('b_id', $this->DBID) . '=' . ew_QuotedValue($rs['b_id'], $this->b_id->FldDataType, $this->DBID));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		ew_AddFilter($filter, $where);
		if ($filter <> "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	function Delete(&$rs, $where = "", $curfilter = TRUE) {
		$conn = &$this->Connection();
		$bDelete = $conn->Execute($this->DeleteSQL($rs, $where, $curfilter));
		return $bDelete;
	}

	// Key filter WHERE clause
	function SqlKeyFilter() {
		return "`a_id` = @a_id@ AND `b_id` = @b_id@";
	}

	// Key filter
	function KeyFilter() {
		$sKeyFilter = $this->SqlKeyFilter();
		if (!is_numeric($this->a_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@a_id@", ew_AdjustSql($this->a_id->CurrentValue, $this->DBID), $sKeyFilter); // Replace key value
		if (!is_numeric($this->b_id->CurrentValue))
			$sKeyFilter = "0=1"; // Invalid key
		$sKeyFilter = str_replace("@b_id@", ew_AdjustSql($this->b_id->CurrentValue, $this->DBID), $sKeyFilter); // Replace key value
		return $sKeyFilter;
	}

	// Return page URL
	function getReturnUrl() {
		$name = EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL;

		// Get referer URL automatically
		if (ew_ServerVar("HTTP_REFERER") <> "" && ew_ReferPage() <> ew_CurrentPage() && ew_ReferPage() <> "login.php") // Referer not same page or login page
			$_SESSION[$name] = ew_ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] <> "") {
			return $_SESSION[$name];
		} else {
			return "v07_siswarutinbayarlist.php";
		}
	}

	function setReturnUrl($v) {
		$_SESSION[EW_PROJECT_NAME . "_" . $this->TableVar . "_" . EW_TABLE_RETURN_URL] = $v;
	}

	// List URL
	function GetListUrl() {
		return "v07_siswarutinbayarlist.php";
	}

	// View URL
	function GetViewUrl($parm = "") {
		if ($parm <> "")
			$url = $this->KeyUrl("v07_siswarutinbayarview.php", $this->UrlParm($parm));
		else
			$url = $this->KeyUrl("v07_siswarutinbayarview.php", $this->UrlParm(EW_TABLE_SHOW_DETAIL . "="));
		return $this->AddMasterUrl($url);
	}

	// Add URL
	function GetAddUrl($parm = "") {
		if ($parm <> "")
			$url = "v07_siswarutinbayaradd.php?" . $this->UrlParm($parm);
		else
			$url = "v07_siswarutinbayaradd.php";
		return $this->AddMasterUrl($url);
	}

	// Edit URL
	function GetEditUrl($parm = "") {
		$url = $this->KeyUrl("v07_siswarutinbayaredit.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline edit URL
	function GetInlineEditUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=edit"));
		return $this->AddMasterUrl($url);
	}

	// Copy URL
	function GetCopyUrl($parm = "") {
		$url = $this->KeyUrl("v07_siswarutinbayaradd.php", $this->UrlParm($parm));
		return $this->AddMasterUrl($url);
	}

	// Inline copy URL
	function GetInlineCopyUrl() {
		$url = $this->KeyUrl(ew_CurrentPage(), $this->UrlParm("a=copy"));
		return $this->AddMasterUrl($url);
	}

	// Delete URL
	function GetDeleteUrl() {
		return $this->KeyUrl("v07_siswarutinbayardelete.php", $this->UrlParm());
	}

	// Add master url
	function AddMasterUrl($url) {
		if ($this->getCurrentMasterTable() == "v06_siswa" && strpos($url, EW_TABLE_SHOW_MASTER . "=") === FALSE) {
			$url .= (strpos($url, "?") !== FALSE ? "&" : "?") . EW_TABLE_SHOW_MASTER . "=" . $this->getCurrentMasterTable();
			$url .= "&fk_id=" . urlencode($this->siswa_id->CurrentValue);
		}
		return $url;
	}

	function KeyToJson() {
		$json = "";
		$json .= "a_id:" . ew_VarToJson($this->a_id->CurrentValue, "number", "'");
		$json .= ",b_id:" . ew_VarToJson($this->b_id->CurrentValue, "number", "'");
		return "{" . $json . "}";
	}

	// Add key value to URL
	function KeyUrl($url, $parm = "") {
		$sUrl = $url . "?";
		if ($parm <> "") $sUrl .= $parm . "&";
		if (!is_null($this->a_id->CurrentValue)) {
			$sUrl .= "a_id=" . urlencode($this->a_id->CurrentValue);
		} else {
			return "javascript:ew_Alert(ewLanguage.Phrase('InvalidRecord'));";
		}
		if (!is_null($this->b_id->CurrentValue)) {
			$sUrl .= "&b_id=" . urlencode($this->b_id->CurrentValue);
		} else {
			return "javascript:ew_Alert(ewLanguage.Phrase('InvalidRecord'));";
		}
		return $sUrl;
	}

	// Sort URL
	function SortUrl(&$fld) {
		if ($this->CurrentAction <> "" || $this->Export <> "" ||
			in_array($fld->FldType, array(128, 204, 205))) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$sUrlParm = $this->UrlParm("order=" . urlencode($fld->FldName) . "&amp;ordertype=" . $fld->ReverseSort());
			return $this->AddMasterUrl(ew_CurrentPage() . "?" . $sUrlParm);
		} else {
			return "";
		}
	}

	// Get record keys from $_POST/$_GET/$_SESSION
	function GetRecordKeys() {
		global $EW_COMPOSITE_KEY_SEPARATOR;
		$arKeys = array();
		$arKey = array();
		if (isset($_POST["key_m"])) {
			$arKeys = ew_StripSlashes($_POST["key_m"]);
			$cnt = count($arKeys);
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode($EW_COMPOSITE_KEY_SEPARATOR, $arKeys[$i]);
		} elseif (isset($_GET["key_m"])) {
			$arKeys = ew_StripSlashes($_GET["key_m"]);
			$cnt = count($arKeys);
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode($EW_COMPOSITE_KEY_SEPARATOR, $arKeys[$i]);
		} elseif (!empty($_GET) || !empty($_POST)) {
			$isPost = ew_IsHttpPost();
			if ($isPost && isset($_POST["a_id"]))
				$arKey[] = ew_StripSlashes($_POST["a_id"]);
			elseif (isset($_GET["a_id"]))
				$arKey[] = ew_StripSlashes($_GET["a_id"]);
			else
				$arKeys = NULL; // Do not setup
			if ($isPost && isset($_POST["b_id"]))
				$arKey[] = ew_StripSlashes($_POST["b_id"]);
			elseif (isset($_GET["b_id"]))
				$arKey[] = ew_StripSlashes($_GET["b_id"]);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = array();
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) <> 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // a_id
					continue;
				if (!is_numeric($key[1])) // b_id
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get key filter
	function GetKeyFilter() {
		$arKeys = $this->GetRecordKeys();
		$sKeyFilter = "";
		foreach ($arKeys as $key) {
			if ($sKeyFilter <> "") $sKeyFilter .= " OR ";
			$this->a_id->CurrentValue = $key[0];
			$this->b_id->CurrentValue = $key[1];
			$sKeyFilter .= "(" . $this->KeyFilter() . ")";
		}
		return $sKeyFilter;
	}

	// Load rows based on filter
	function &LoadRs($sFilter) {

		// Set up filter (SQL WHERE clause) and get return SQL
		//$this->CurrentFilter = $sFilter;
		//$sSql = $this->SQL();

		$sSql = $this->GetSQL($sFilter, "");
		$conn = &$this->Connection();
		$rs = $conn->Execute($sSql);
		return $rs;
	}

	// Load row values from recordset
	function LoadListRowValues(&$rs) {
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

	// Render list row values
	function RenderListRow() {
		global $Security, $gsLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

   // Common render codes
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

		// a_id
		$this->a_id->LinkCustomAttributes = "";
		$this->a_id->HrefValue = "";
		$this->a_id->TooltipValue = "";

		// siswa_id
		$this->siswa_id->LinkCustomAttributes = "";
		$this->siswa_id->HrefValue = "";
		$this->siswa_id->TooltipValue = "";

		// rutin_id
		$this->rutin_id->LinkCustomAttributes = "";
		$this->rutin_id->HrefValue = "";
		$this->rutin_id->TooltipValue = "";

		// a_Nilai
		$this->a_Nilai->LinkCustomAttributes = "";
		$this->a_Nilai->HrefValue = "";
		$this->a_Nilai->TooltipValue = "";

		// b_id
		$this->b_id->LinkCustomAttributes = "";
		$this->b_id->HrefValue = "";
		$this->b_id->TooltipValue = "";

		// siswarutin_id
		$this->siswarutin_id->LinkCustomAttributes = "";
		$this->siswarutin_id->HrefValue = "";
		$this->siswarutin_id->TooltipValue = "";

		// Bulan
		$this->Bulan->LinkCustomAttributes = "";
		$this->Bulan->HrefValue = "";
		$this->Bulan->TooltipValue = "";

		// Tahun
		$this->Tahun->LinkCustomAttributes = "";
		$this->Tahun->HrefValue = "";
		$this->Tahun->TooltipValue = "";

		// b_Nilai
		$this->b_Nilai->LinkCustomAttributes = "";
		$this->b_Nilai->HrefValue = "";
		$this->b_Nilai->TooltipValue = "";

		// Tanggal_Bayar
		$this->Tanggal_Bayar->LinkCustomAttributes = "";
		$this->Tanggal_Bayar->HrefValue = "";
		$this->Tanggal_Bayar->TooltipValue = "";

		// Nilai_Bayar
		$this->Nilai_Bayar->LinkCustomAttributes = "";
		$this->Nilai_Bayar->HrefValue = "";
		$this->Nilai_Bayar->TooltipValue = "";

		// Periode_Tahun_Bulan
		$this->Periode_Tahun_Bulan->LinkCustomAttributes = "";
		$this->Periode_Tahun_Bulan->HrefValue = "";
		$this->Periode_Tahun_Bulan->TooltipValue = "";

		// Periode_Text
		$this->Periode_Text->LinkCustomAttributes = "";
		$this->Periode_Text->HrefValue = "";
		$this->Periode_Text->TooltipValue = "";

		// Per_Thn_Bln_Byr
		$this->Per_Thn_Bln_Byr->LinkCustomAttributes = "";
		$this->Per_Thn_Bln_Byr->HrefValue = "";
		$this->Per_Thn_Bln_Byr->TooltipValue = "";

		// Per_Thn_Bln_Byr_Text
		$this->Per_Thn_Bln_Byr_Text->LinkCustomAttributes = "";
		$this->Per_Thn_Bln_Byr_Text->HrefValue = "";
		$this->Per_Thn_Bln_Byr_Text->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Render edit row values
	function RenderEditRow() {
		global $Security, $gsLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// a_id
		$this->a_id->EditAttrs["class"] = "form-control";
		$this->a_id->EditCustomAttributes = "";
		$this->a_id->EditValue = $this->a_id->CurrentValue;
		$this->a_id->ViewCustomAttributes = "";

		// siswa_id
		$this->siswa_id->EditAttrs["class"] = "form-control";
		$this->siswa_id->EditCustomAttributes = "";
		if ($this->siswa_id->getSessionValue() <> "") {
			$this->siswa_id->CurrentValue = $this->siswa_id->getSessionValue();
		$this->siswa_id->ViewValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->ViewCustomAttributes = "";
		} else {
		$this->siswa_id->EditValue = $this->siswa_id->CurrentValue;
		$this->siswa_id->PlaceHolder = ew_RemoveHtml($this->siswa_id->FldCaption());
		}

		// rutin_id
		$this->rutin_id->EditAttrs["class"] = "form-control";
		$this->rutin_id->EditCustomAttributes = "";
		$this->rutin_id->EditValue = $this->rutin_id->CurrentValue;
		$this->rutin_id->PlaceHolder = ew_RemoveHtml($this->rutin_id->FldCaption());

		// a_Nilai
		$this->a_Nilai->EditAttrs["class"] = "form-control";
		$this->a_Nilai->EditCustomAttributes = "";
		$this->a_Nilai->EditValue = $this->a_Nilai->CurrentValue;
		$this->a_Nilai->PlaceHolder = ew_RemoveHtml($this->a_Nilai->FldCaption());
		if (strval($this->a_Nilai->EditValue) <> "" && is_numeric($this->a_Nilai->EditValue)) $this->a_Nilai->EditValue = ew_FormatNumber($this->a_Nilai->EditValue, -2, -2, -2, -2);

		// b_id
		$this->b_id->EditAttrs["class"] = "form-control";
		$this->b_id->EditCustomAttributes = "";
		$this->b_id->EditValue = $this->b_id->CurrentValue;
		$this->b_id->ViewCustomAttributes = "";

		// siswarutin_id
		$this->siswarutin_id->EditAttrs["class"] = "form-control";
		$this->siswarutin_id->EditCustomAttributes = "";
		$this->siswarutin_id->EditValue = $this->siswarutin_id->CurrentValue;
		$this->siswarutin_id->PlaceHolder = ew_RemoveHtml($this->siswarutin_id->FldCaption());

		// Bulan
		$this->Bulan->EditAttrs["class"] = "form-control";
		$this->Bulan->EditCustomAttributes = "";
		$this->Bulan->EditValue = $this->Bulan->CurrentValue;
		$this->Bulan->PlaceHolder = ew_RemoveHtml($this->Bulan->FldCaption());

		// Tahun
		$this->Tahun->EditAttrs["class"] = "form-control";
		$this->Tahun->EditCustomAttributes = "";
		$this->Tahun->EditValue = $this->Tahun->CurrentValue;
		$this->Tahun->PlaceHolder = ew_RemoveHtml($this->Tahun->FldCaption());

		// b_Nilai
		$this->b_Nilai->EditAttrs["class"] = "form-control";
		$this->b_Nilai->EditCustomAttributes = "";
		$this->b_Nilai->EditValue = $this->b_Nilai->CurrentValue;
		$this->b_Nilai->PlaceHolder = ew_RemoveHtml($this->b_Nilai->FldCaption());
		if (strval($this->b_Nilai->EditValue) <> "" && is_numeric($this->b_Nilai->EditValue)) $this->b_Nilai->EditValue = ew_FormatNumber($this->b_Nilai->EditValue, -2, -1, -2, 0);

		// Tanggal_Bayar
		$this->Tanggal_Bayar->EditAttrs["class"] = "form-control";
		$this->Tanggal_Bayar->EditCustomAttributes = "";
		$this->Tanggal_Bayar->EditValue = ew_FormatDateTime($this->Tanggal_Bayar->CurrentValue, 8);
		$this->Tanggal_Bayar->PlaceHolder = ew_RemoveHtml($this->Tanggal_Bayar->FldCaption());

		// Nilai_Bayar
		$this->Nilai_Bayar->EditAttrs["class"] = "form-control";
		$this->Nilai_Bayar->EditCustomAttributes = "";
		$this->Nilai_Bayar->EditValue = $this->Nilai_Bayar->CurrentValue;
		$this->Nilai_Bayar->PlaceHolder = ew_RemoveHtml($this->Nilai_Bayar->FldCaption());
		if (strval($this->Nilai_Bayar->EditValue) <> "" && is_numeric($this->Nilai_Bayar->EditValue)) $this->Nilai_Bayar->EditValue = ew_FormatNumber($this->Nilai_Bayar->EditValue, -2, -2, -2, -2);

		// Periode_Tahun_Bulan
		$this->Periode_Tahun_Bulan->EditAttrs["class"] = "form-control";
		$this->Periode_Tahun_Bulan->EditCustomAttributes = "";
		$this->Periode_Tahun_Bulan->EditValue = $this->Periode_Tahun_Bulan->CurrentValue;
		$this->Periode_Tahun_Bulan->PlaceHolder = ew_RemoveHtml($this->Periode_Tahun_Bulan->FldCaption());

		// Periode_Text
		$this->Periode_Text->EditAttrs["class"] = "form-control";
		$this->Periode_Text->EditCustomAttributes = "";
		$this->Periode_Text->EditValue = $this->Periode_Text->CurrentValue;
		$this->Periode_Text->PlaceHolder = ew_RemoveHtml($this->Periode_Text->FldCaption());

		// Per_Thn_Bln_Byr
		$this->Per_Thn_Bln_Byr->EditAttrs["class"] = "form-control";
		$this->Per_Thn_Bln_Byr->EditCustomAttributes = "";
		$this->Per_Thn_Bln_Byr->EditValue = $this->Per_Thn_Bln_Byr->CurrentValue;
		$this->Per_Thn_Bln_Byr->PlaceHolder = ew_RemoveHtml($this->Per_Thn_Bln_Byr->FldCaption());

		// Per_Thn_Bln_Byr_Text
		$this->Per_Thn_Bln_Byr_Text->EditAttrs["class"] = "form-control";
		$this->Per_Thn_Bln_Byr_Text->EditCustomAttributes = "";
		$this->Per_Thn_Bln_Byr_Text->EditValue = $this->Per_Thn_Bln_Byr_Text->CurrentValue;
		$this->Per_Thn_Bln_Byr_Text->PlaceHolder = ew_RemoveHtml($this->Per_Thn_Bln_Byr_Text->FldCaption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	function AggregateListRowValues() {
	}

	// Aggregate list row (for rendering)
	function AggregateListRow() {

		// Call Row Rendered event
		$this->Row_Rendered();
	}
	var $ExportDoc;

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	function ExportDocument(&$Doc, &$Recordset, $StartRec, $StopRec, $ExportPageType = "") {
		if (!$Recordset || !$Doc)
			return;
		if (!$Doc->ExportCustom) {

			// Write header
			$Doc->ExportTableHeader();
			if ($Doc->Horizontal) { // Horizontal format, write header
				$Doc->BeginExportRow();
				if ($ExportPageType == "view") {
					if ($this->a_id->Exportable) $Doc->ExportCaption($this->a_id);
					if ($this->siswa_id->Exportable) $Doc->ExportCaption($this->siswa_id);
					if ($this->rutin_id->Exportable) $Doc->ExportCaption($this->rutin_id);
					if ($this->a_Nilai->Exportable) $Doc->ExportCaption($this->a_Nilai);
					if ($this->b_id->Exportable) $Doc->ExportCaption($this->b_id);
					if ($this->siswarutin_id->Exportable) $Doc->ExportCaption($this->siswarutin_id);
					if ($this->Bulan->Exportable) $Doc->ExportCaption($this->Bulan);
					if ($this->Tahun->Exportable) $Doc->ExportCaption($this->Tahun);
					if ($this->b_Nilai->Exportable) $Doc->ExportCaption($this->b_Nilai);
					if ($this->Tanggal_Bayar->Exportable) $Doc->ExportCaption($this->Tanggal_Bayar);
					if ($this->Nilai_Bayar->Exportable) $Doc->ExportCaption($this->Nilai_Bayar);
					if ($this->Periode_Tahun_Bulan->Exportable) $Doc->ExportCaption($this->Periode_Tahun_Bulan);
					if ($this->Periode_Text->Exportable) $Doc->ExportCaption($this->Periode_Text);
					if ($this->Per_Thn_Bln_Byr->Exportable) $Doc->ExportCaption($this->Per_Thn_Bln_Byr);
					if ($this->Per_Thn_Bln_Byr_Text->Exportable) $Doc->ExportCaption($this->Per_Thn_Bln_Byr_Text);
				} else {
					if ($this->a_id->Exportable) $Doc->ExportCaption($this->a_id);
					if ($this->siswa_id->Exportable) $Doc->ExportCaption($this->siswa_id);
					if ($this->rutin_id->Exportable) $Doc->ExportCaption($this->rutin_id);
					if ($this->a_Nilai->Exportable) $Doc->ExportCaption($this->a_Nilai);
					if ($this->b_id->Exportable) $Doc->ExportCaption($this->b_id);
					if ($this->siswarutin_id->Exportable) $Doc->ExportCaption($this->siswarutin_id);
					if ($this->Bulan->Exportable) $Doc->ExportCaption($this->Bulan);
					if ($this->Tahun->Exportable) $Doc->ExportCaption($this->Tahun);
					if ($this->b_Nilai->Exportable) $Doc->ExportCaption($this->b_Nilai);
					if ($this->Tanggal_Bayar->Exportable) $Doc->ExportCaption($this->Tanggal_Bayar);
					if ($this->Nilai_Bayar->Exportable) $Doc->ExportCaption($this->Nilai_Bayar);
					if ($this->Periode_Tahun_Bulan->Exportable) $Doc->ExportCaption($this->Periode_Tahun_Bulan);
					if ($this->Periode_Text->Exportable) $Doc->ExportCaption($this->Periode_Text);
					if ($this->Per_Thn_Bln_Byr->Exportable) $Doc->ExportCaption($this->Per_Thn_Bln_Byr);
					if ($this->Per_Thn_Bln_Byr_Text->Exportable) $Doc->ExportCaption($this->Per_Thn_Bln_Byr_Text);
				}
				$Doc->EndExportRow();
			}
		}

		// Move to first record
		$RecCnt = $StartRec - 1;
		if (!$Recordset->EOF) {
			$Recordset->MoveFirst();
			if ($StartRec > 1)
				$Recordset->Move($StartRec - 1);
		}
		while (!$Recordset->EOF && $RecCnt < $StopRec) {
			$RecCnt++;
			if (intval($RecCnt) >= intval($StartRec)) {
				$RowCnt = intval($RecCnt) - intval($StartRec) + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($RowCnt > 1 && ($RowCnt - 1) % $this->ExportPageBreakCount == 0)
						$Doc->ExportPageBreak();
				}
				$this->LoadListRowValues($Recordset);

				// Render row
				$this->RowType = EW_ROWTYPE_VIEW; // Render view
				$this->ResetAttrs();
				$this->RenderListRow();
				if (!$Doc->ExportCustom) {
					$Doc->BeginExportRow($RowCnt); // Allow CSS styles if enabled
					if ($ExportPageType == "view") {
						if ($this->a_id->Exportable) $Doc->ExportField($this->a_id);
						if ($this->siswa_id->Exportable) $Doc->ExportField($this->siswa_id);
						if ($this->rutin_id->Exportable) $Doc->ExportField($this->rutin_id);
						if ($this->a_Nilai->Exportable) $Doc->ExportField($this->a_Nilai);
						if ($this->b_id->Exportable) $Doc->ExportField($this->b_id);
						if ($this->siswarutin_id->Exportable) $Doc->ExportField($this->siswarutin_id);
						if ($this->Bulan->Exportable) $Doc->ExportField($this->Bulan);
						if ($this->Tahun->Exportable) $Doc->ExportField($this->Tahun);
						if ($this->b_Nilai->Exportable) $Doc->ExportField($this->b_Nilai);
						if ($this->Tanggal_Bayar->Exportable) $Doc->ExportField($this->Tanggal_Bayar);
						if ($this->Nilai_Bayar->Exportable) $Doc->ExportField($this->Nilai_Bayar);
						if ($this->Periode_Tahun_Bulan->Exportable) $Doc->ExportField($this->Periode_Tahun_Bulan);
						if ($this->Periode_Text->Exportable) $Doc->ExportField($this->Periode_Text);
						if ($this->Per_Thn_Bln_Byr->Exportable) $Doc->ExportField($this->Per_Thn_Bln_Byr);
						if ($this->Per_Thn_Bln_Byr_Text->Exportable) $Doc->ExportField($this->Per_Thn_Bln_Byr_Text);
					} else {
						if ($this->a_id->Exportable) $Doc->ExportField($this->a_id);
						if ($this->siswa_id->Exportable) $Doc->ExportField($this->siswa_id);
						if ($this->rutin_id->Exportable) $Doc->ExportField($this->rutin_id);
						if ($this->a_Nilai->Exportable) $Doc->ExportField($this->a_Nilai);
						if ($this->b_id->Exportable) $Doc->ExportField($this->b_id);
						if ($this->siswarutin_id->Exportable) $Doc->ExportField($this->siswarutin_id);
						if ($this->Bulan->Exportable) $Doc->ExportField($this->Bulan);
						if ($this->Tahun->Exportable) $Doc->ExportField($this->Tahun);
						if ($this->b_Nilai->Exportable) $Doc->ExportField($this->b_Nilai);
						if ($this->Tanggal_Bayar->Exportable) $Doc->ExportField($this->Tanggal_Bayar);
						if ($this->Nilai_Bayar->Exportable) $Doc->ExportField($this->Nilai_Bayar);
						if ($this->Periode_Tahun_Bulan->Exportable) $Doc->ExportField($this->Periode_Tahun_Bulan);
						if ($this->Periode_Text->Exportable) $Doc->ExportField($this->Periode_Text);
						if ($this->Per_Thn_Bln_Byr->Exportable) $Doc->ExportField($this->Per_Thn_Bln_Byr);
						if ($this->Per_Thn_Bln_Byr_Text->Exportable) $Doc->ExportField($this->Per_Thn_Bln_Byr_Text);
					}
					$Doc->EndExportRow();
				}
			}

			// Call Row Export server event
			if ($Doc->ExportCustom)
				$this->Row_Export($Recordset->fields);
			$Recordset->MoveNext();
		}
		if (!$Doc->ExportCustom) {
			$Doc->ExportTableFooter();
		}
	}

	// Get auto fill value
	function GetAutoFill($id, $val) {
		$rsarr = array();
		$rowcnt = 0;

		// Output
		if (is_array($rsarr) && $rowcnt > 0) {
			$fldcnt = count($rsarr[0]);
			for ($i = 0; $i < $rowcnt; $i++) {
				for ($j = 0; $j < $fldcnt; $j++) {
					$str = strval($rsarr[$i][$j]);
					$str = ew_ConvertToUtf8($str);
					if (isset($post["keepCRLF"])) {
						$str = str_replace(array("\r", "\n"), array("\\r", "\\n"), $str);
					} else {
						$str = str_replace(array("\r", "\n"), array(" ", " "), $str);
					}
					$rsarr[$i][$j] = $str;
				}
			}
			return ew_ArrayToJson($rsarr);
		} else {
			return FALSE;
		}
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here	
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here	
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here	
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->FldName, $fld->LookupFilters, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here	
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>); 

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>
