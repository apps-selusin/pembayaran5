<?php

// Global variable for table object
$r02_siswabayar = NULL;

//
// Table class for r02_siswabayar
//
class crr02_siswabayar extends crTableBase {
	var $ShowGroupHeaderAsRow = FALSE;
	var $ShowCompactSummaryFooter = TRUE;
	var $Jenis;
	var $a_id;
	var $sekolah_id;
	var $kelas_id;
	var $NIS;
	var $Nama;
	var $b_id;
	var $siswa_id;
	var $rutin_id;
	var $b_Nilai;
	var $c_id;
	var $siswarutin_id;
	var $Bulan;
	var $Tahun;
	var $c_Nilai;
	var $Tanggal_Bayar;
	var $Nilai_Bayar;
	var $Sisa;
	var $Periode_Tahun_Bulan;
	var $Periode_Text;
	var $Per_Thn_Bln_Byr;
	var $Per_Thn_Bln_Byr_Text;

	//
	// Table class constructor
	//
	function __construct() {
		global $ReportLanguage, $gsLanguage;
		$this->TableVar = 'r02_siswabayar';
		$this->TableName = 'r02_siswabayar';
		$this->TableType = 'REPORT';
		$this->DBID = 'DB';
		$this->ExportAll = FALSE;
		$this->ExportPageBreakCount = 0;

		// Jenis
		$this->Jenis = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Jenis', 'Jenis', '`Jenis`', 200, EWR_DATATYPE_STRING, -1);
		$this->Jenis->Sortable = TRUE; // Allow sort
		$this->Jenis->GroupingFieldId = 1;
		$this->Jenis->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->Jenis->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->fields['Jenis'] = &$this->Jenis;
		$this->Jenis->DateFilter = "";
		$this->Jenis->SqlSelect = "";
		$this->Jenis->SqlOrderBy = "";
		$this->Jenis->FldGroupByType = "";
		$this->Jenis->FldGroupInt = "0";
		$this->Jenis->FldGroupSql = "";

		// a_id
		$this->a_id = new crField('r02_siswabayar', 'r02_siswabayar', 'x_a_id', 'a_id', '`a_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->a_id->Sortable = TRUE; // Allow sort
		$this->a_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['a_id'] = &$this->a_id;
		$this->a_id->DateFilter = "";
		$this->a_id->SqlSelect = "";
		$this->a_id->SqlOrderBy = "";

		// sekolah_id
		$this->sekolah_id = new crField('r02_siswabayar', 'r02_siswabayar', 'x_sekolah_id', 'sekolah_id', '`sekolah_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->sekolah_id->Sortable = TRUE; // Allow sort
		$this->sekolah_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['sekolah_id'] = &$this->sekolah_id;
		$this->sekolah_id->DateFilter = "";
		$this->sekolah_id->SqlSelect = "";
		$this->sekolah_id->SqlOrderBy = "";

		// kelas_id
		$this->kelas_id = new crField('r02_siswabayar', 'r02_siswabayar', 'x_kelas_id', 'kelas_id', '`kelas_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->kelas_id->Sortable = TRUE; // Allow sort
		$this->kelas_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['kelas_id'] = &$this->kelas_id;
		$this->kelas_id->DateFilter = "";
		$this->kelas_id->SqlSelect = "";
		$this->kelas_id->SqlOrderBy = "";

		// NIS
		$this->NIS = new crField('r02_siswabayar', 'r02_siswabayar', 'x_NIS', 'NIS', '`NIS`', 200, EWR_DATATYPE_STRING, -1);
		$this->NIS->Sortable = TRUE; // Allow sort
		$this->fields['NIS'] = &$this->NIS;
		$this->NIS->DateFilter = "";
		$this->NIS->SqlSelect = "";
		$this->NIS->SqlOrderBy = "";

		// Nama
		$this->Nama = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Nama', 'Nama', '`Nama`', 200, EWR_DATATYPE_STRING, -1);
		$this->Nama->Sortable = TRUE; // Allow sort
		$this->fields['Nama'] = &$this->Nama;
		$this->Nama->DateFilter = "";
		$this->Nama->SqlSelect = "";
		$this->Nama->SqlOrderBy = "";

		// b_id
		$this->b_id = new crField('r02_siswabayar', 'r02_siswabayar', 'x_b_id', 'b_id', '`b_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->b_id->Sortable = TRUE; // Allow sort
		$this->b_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['b_id'] = &$this->b_id;
		$this->b_id->DateFilter = "";
		$this->b_id->SqlSelect = "";
		$this->b_id->SqlOrderBy = "";

		// siswa_id
		$this->siswa_id = new crField('r02_siswabayar', 'r02_siswabayar', 'x_siswa_id', 'siswa_id', '`siswa_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->siswa_id->Sortable = TRUE; // Allow sort
		$this->siswa_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['siswa_id'] = &$this->siswa_id;
		$this->siswa_id->DateFilter = "";
		$this->siswa_id->SqlSelect = "";
		$this->siswa_id->SqlOrderBy = "";

		// rutin_id
		$this->rutin_id = new crField('r02_siswabayar', 'r02_siswabayar', 'x_rutin_id', 'rutin_id', '`rutin_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->rutin_id->Sortable = TRUE; // Allow sort
		$this->rutin_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['rutin_id'] = &$this->rutin_id;
		$this->rutin_id->DateFilter = "";
		$this->rutin_id->SqlSelect = "";
		$this->rutin_id->SqlOrderBy = "";

		// b_Nilai
		$this->b_Nilai = new crField('r02_siswabayar', 'r02_siswabayar', 'x_b_Nilai', 'b_Nilai', '`b_Nilai`', 4, EWR_DATATYPE_NUMBER, -1);
		$this->b_Nilai->Sortable = TRUE; // Allow sort
		$this->b_Nilai->GroupingFieldId = 2;
		$this->b_Nilai->ShowGroupHeaderAsRow = $this->ShowGroupHeaderAsRow;
		$this->b_Nilai->ShowCompactSummaryFooter = $this->ShowCompactSummaryFooter;
		$this->b_Nilai->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectFloat");
		$this->fields['b_Nilai'] = &$this->b_Nilai;
		$this->b_Nilai->DateFilter = "";
		$this->b_Nilai->SqlSelect = "";
		$this->b_Nilai->SqlOrderBy = "";
		$this->b_Nilai->FldGroupByType = "";
		$this->b_Nilai->FldGroupInt = "0";
		$this->b_Nilai->FldGroupSql = "";

		// c_id
		$this->c_id = new crField('r02_siswabayar', 'r02_siswabayar', 'x_c_id', 'c_id', '`c_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->c_id->Sortable = TRUE; // Allow sort
		$this->c_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['c_id'] = &$this->c_id;
		$this->c_id->DateFilter = "";
		$this->c_id->SqlSelect = "";
		$this->c_id->SqlOrderBy = "";

		// siswarutin_id
		$this->siswarutin_id = new crField('r02_siswabayar', 'r02_siswabayar', 'x_siswarutin_id', 'siswarutin_id', '`siswarutin_id`', 3, EWR_DATATYPE_NUMBER, -1);
		$this->siswarutin_id->Sortable = TRUE; // Allow sort
		$this->siswarutin_id->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectInteger");
		$this->fields['siswarutin_id'] = &$this->siswarutin_id;
		$this->siswarutin_id->DateFilter = "";
		$this->siswarutin_id->SqlSelect = "";
		$this->siswarutin_id->SqlOrderBy = "";

		// Bulan
		$this->Bulan = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Bulan', 'Bulan', '`Bulan`', 200, EWR_DATATYPE_STRING, -1);
		$this->Bulan->Sortable = TRUE; // Allow sort
		$this->fields['Bulan'] = &$this->Bulan;
		$this->Bulan->DateFilter = "";
		$this->Bulan->SqlSelect = "";
		$this->Bulan->SqlOrderBy = "";

		// Tahun
		$this->Tahun = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Tahun', 'Tahun', '`Tahun`', 200, EWR_DATATYPE_STRING, -1);
		$this->Tahun->Sortable = TRUE; // Allow sort
		$this->fields['Tahun'] = &$this->Tahun;
		$this->Tahun->DateFilter = "";
		$this->Tahun->SqlSelect = "";
		$this->Tahun->SqlOrderBy = "";

		// c_Nilai
		$this->c_Nilai = new crField('r02_siswabayar', 'r02_siswabayar', 'x_c_Nilai', 'c_Nilai', '`c_Nilai`', 4, EWR_DATATYPE_NUMBER, -1);
		$this->c_Nilai->Sortable = TRUE; // Allow sort
		$this->c_Nilai->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectFloat");
		$this->fields['c_Nilai'] = &$this->c_Nilai;
		$this->c_Nilai->DateFilter = "";
		$this->c_Nilai->SqlSelect = "";
		$this->c_Nilai->SqlOrderBy = "";

		// Tanggal_Bayar
		$this->Tanggal_Bayar = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Tanggal_Bayar', 'Tanggal_Bayar', '`Tanggal_Bayar`', 133, EWR_DATATYPE_DATE, 0);
		$this->Tanggal_Bayar->Sortable = TRUE; // Allow sort
		$this->Tanggal_Bayar->FldDefaultErrMsg = str_replace("%s", $GLOBALS["EWR_DATE_FORMAT"], $ReportLanguage->Phrase("IncorrectDate"));
		$this->fields['Tanggal_Bayar'] = &$this->Tanggal_Bayar;
		$this->Tanggal_Bayar->DateFilter = "";
		$this->Tanggal_Bayar->SqlSelect = "";
		$this->Tanggal_Bayar->SqlOrderBy = "";

		// Nilai_Bayar
		$this->Nilai_Bayar = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Nilai_Bayar', 'Nilai_Bayar', '`Nilai_Bayar`', 4, EWR_DATATYPE_NUMBER, -1);
		$this->Nilai_Bayar->Sortable = TRUE; // Allow sort
		$this->Nilai_Bayar->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectFloat");
		$this->fields['Nilai_Bayar'] = &$this->Nilai_Bayar;
		$this->Nilai_Bayar->DateFilter = "";
		$this->Nilai_Bayar->SqlSelect = "";
		$this->Nilai_Bayar->SqlOrderBy = "";

		// Sisa
		$this->Sisa = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Sisa', 'Sisa', '`Sisa`', 5, EWR_DATATYPE_NUMBER, -1);
		$this->Sisa->Sortable = TRUE; // Allow sort
		$this->Sisa->FldDefaultErrMsg = $ReportLanguage->Phrase("IncorrectFloat");
		$this->fields['Sisa'] = &$this->Sisa;
		$this->Sisa->DateFilter = "";
		$this->Sisa->SqlSelect = "";
		$this->Sisa->SqlOrderBy = "";

		// Periode_Tahun_Bulan
		$this->Periode_Tahun_Bulan = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Periode_Tahun_Bulan', 'Periode_Tahun_Bulan', '`Periode_Tahun_Bulan`', 200, EWR_DATATYPE_STRING, -1);
		$this->Periode_Tahun_Bulan->Sortable = TRUE; // Allow sort
		$this->fields['Periode_Tahun_Bulan'] = &$this->Periode_Tahun_Bulan;
		$this->Periode_Tahun_Bulan->DateFilter = "";
		$this->Periode_Tahun_Bulan->SqlSelect = "";
		$this->Periode_Tahun_Bulan->SqlOrderBy = "";

		// Periode_Text
		$this->Periode_Text = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Periode_Text', 'Periode_Text', '`Periode_Text`', 200, EWR_DATATYPE_STRING, -1);
		$this->Periode_Text->Sortable = TRUE; // Allow sort
		$this->fields['Periode_Text'] = &$this->Periode_Text;
		$this->Periode_Text->DateFilter = "";
		$this->Periode_Text->SqlSelect = "";
		$this->Periode_Text->SqlOrderBy = "";

		// Per_Thn_Bln_Byr
		$this->Per_Thn_Bln_Byr = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Per_Thn_Bln_Byr', 'Per_Thn_Bln_Byr', '`Per_Thn_Bln_Byr`', 200, EWR_DATATYPE_STRING, -1);
		$this->Per_Thn_Bln_Byr->Sortable = TRUE; // Allow sort
		$this->fields['Per_Thn_Bln_Byr'] = &$this->Per_Thn_Bln_Byr;
		$this->Per_Thn_Bln_Byr->DateFilter = "";
		$this->Per_Thn_Bln_Byr->SqlSelect = "";
		$this->Per_Thn_Bln_Byr->SqlOrderBy = "";

		// Per_Thn_Bln_Byr_Text
		$this->Per_Thn_Bln_Byr_Text = new crField('r02_siswabayar', 'r02_siswabayar', 'x_Per_Thn_Bln_Byr_Text', 'Per_Thn_Bln_Byr_Text', '`Per_Thn_Bln_Byr_Text`', 200, EWR_DATATYPE_STRING, -1);
		$this->Per_Thn_Bln_Byr_Text->Sortable = TRUE; // Allow sort
		$this->fields['Per_Thn_Bln_Byr_Text'] = &$this->Per_Thn_Bln_Byr_Text;
		$this->Per_Thn_Bln_Byr_Text->DateFilter = "";
		$this->Per_Thn_Bln_Byr_Text->SqlSelect = "";
		$this->Per_Thn_Bln_Byr_Text->SqlOrderBy = "";
	}

	// Set Field Visibility
	function SetFieldVisibility($fldparm) {
		global $Security;
		return $this->$fldparm->Visible; // Returns original value
	}

	// Single column sort
	function UpdateSort(&$ofld) {
		if ($this->CurrentOrder == $ofld->FldName) {
			$sSortField = $ofld->FldExpression;
			$sLastSort = $ofld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$sThisSort = $this->CurrentOrderType;
			} else {
				$sThisSort = ($sLastSort == "ASC") ? "DESC" : "ASC";
			}
			$ofld->setSort($sThisSort);
			if ($ofld->GroupingFieldId == 0)
				$this->setDetailOrderBy($sSortField . " " . $sThisSort); // Save to Session
		} else {
			if ($ofld->GroupingFieldId == 0) $ofld->setSort("");
		}
	}

	// Get Sort SQL
	function SortSql() {
		$sDtlSortSql = $this->getDetailOrderBy(); // Get ORDER BY for detail fields from session
		$argrps = array();
		foreach ($this->fields as $fld) {
			if ($fld->getSort() <> "") {
				$fldsql = $fld->FldExpression;
				if ($fld->GroupingFieldId > 0) {
					if ($fld->FldGroupSql <> "")
						$argrps[$fld->GroupingFieldId] = str_replace("%s", $fldsql, $fld->FldGroupSql) . " " . $fld->getSort();
					else
						$argrps[$fld->GroupingFieldId] = $fldsql . " " . $fld->getSort();
				}
			}
		}
		$sSortSql = "";
		foreach ($argrps as $grp) {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $grp;
		}
		if ($sDtlSortSql <> "") {
			if ($sSortSql <> "") $sSortSql .= ", ";
			$sSortSql .= $sDtlSortSql;
		}
		return $sSortSql;
	}

	// Table level SQL
	// From

	var $_SqlFrom = "";

	function getSqlFrom() {
		return ($this->_SqlFrom <> "") ? $this->_SqlFrom : "`v09_siswabayar`";
	}

	function SqlFrom() { // For backward compatibility
		return $this->getSqlFrom();
	}

	function setSqlFrom($v) {
		$this->_SqlFrom = $v;
	}

	// Select
	var $_SqlSelect = "";

	function getSqlSelect() {
		return ($this->_SqlSelect <> "") ? $this->_SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}

	function SqlSelect() { // For backward compatibility
		return $this->getSqlSelect();
	}

	function setSqlSelect($v) {
		$this->_SqlSelect = $v;
	}

	// Where
	var $_SqlWhere = "";

	function getSqlWhere() {
		$sWhere = ($this->_SqlWhere <> "") ? $this->_SqlWhere : "";
		return $sWhere;
	}

	function SqlWhere() { // For backward compatibility
		return $this->getSqlWhere();
	}

	function setSqlWhere($v) {
		$this->_SqlWhere = $v;
	}

	// Group By
	var $_SqlGroupBy = "";

	function getSqlGroupBy() {
		return ($this->_SqlGroupBy <> "") ? $this->_SqlGroupBy : "";
	}

	function SqlGroupBy() { // For backward compatibility
		return $this->getSqlGroupBy();
	}

	function setSqlGroupBy($v) {
		$this->_SqlGroupBy = $v;
	}

	// Having
	var $_SqlHaving = "";

	function getSqlHaving() {
		return ($this->_SqlHaving <> "") ? $this->_SqlHaving : "";
	}

	function SqlHaving() { // For backward compatibility
		return $this->getSqlHaving();
	}

	function setSqlHaving($v) {
		$this->_SqlHaving = $v;
	}

	// Order By
	var $_SqlOrderBy = "";

	function getSqlOrderBy() {
		return ($this->_SqlOrderBy <> "") ? $this->_SqlOrderBy : "`Jenis` ASC, `b_Nilai` ASC";
	}

	function SqlOrderBy() { // For backward compatibility
		return $this->getSqlOrderBy();
	}

	function setSqlOrderBy($v) {
		$this->_SqlOrderBy = $v;
	}

	// Table Level Group SQL
	// First Group Field

	var $_SqlFirstGroupField = "";

	function getSqlFirstGroupField() {
		return ($this->_SqlFirstGroupField <> "") ? $this->_SqlFirstGroupField : "`Jenis`";
	}

	function SqlFirstGroupField() { // For backward compatibility
		return $this->getSqlFirstGroupField();
	}

	function setSqlFirstGroupField($v) {
		$this->_SqlFirstGroupField = $v;
	}

	// Select Group
	var $_SqlSelectGroup = "";

	function getSqlSelectGroup() {
		return ($this->_SqlSelectGroup <> "") ? $this->_SqlSelectGroup : "SELECT DISTINCT " . $this->getSqlFirstGroupField() . " FROM " . $this->getSqlFrom();
	}

	function SqlSelectGroup() { // For backward compatibility
		return $this->getSqlSelectGroup();
	}

	function setSqlSelectGroup($v) {
		$this->_SqlSelectGroup = $v;
	}

	// Order By Group
	var $_SqlOrderByGroup = "";

	function getSqlOrderByGroup() {
		return ($this->_SqlOrderByGroup <> "") ? $this->_SqlOrderByGroup : "`Jenis` ASC";
	}

	function SqlOrderByGroup() { // For backward compatibility
		return $this->getSqlOrderByGroup();
	}

	function setSqlOrderByGroup($v) {
		$this->_SqlOrderByGroup = $v;
	}

	// Select Aggregate
	var $_SqlSelectAgg = "";

	function getSqlSelectAgg() {
		return ($this->_SqlSelectAgg <> "") ? $this->_SqlSelectAgg : "SELECT SUM(`Nilai_Bayar`) AS `sum_nilai_bayar` FROM " . $this->getSqlFrom();
	}

	function SqlSelectAgg() { // For backward compatibility
		return $this->getSqlSelectAgg();
	}

	function setSqlSelectAgg($v) {
		$this->_SqlSelectAgg = $v;
	}

	// Aggregate Prefix
	var $_SqlAggPfx = "";

	function getSqlAggPfx() {
		return ($this->_SqlAggPfx <> "") ? $this->_SqlAggPfx : "";
	}

	function SqlAggPfx() { // For backward compatibility
		return $this->getSqlAggPfx();
	}

	function setSqlAggPfx($v) {
		$this->_SqlAggPfx = $v;
	}

	// Aggregate Suffix
	var $_SqlAggSfx = "";

	function getSqlAggSfx() {
		return ($this->_SqlAggSfx <> "") ? $this->_SqlAggSfx : "";
	}

	function SqlAggSfx() { // For backward compatibility
		return $this->getSqlAggSfx();
	}

	function setSqlAggSfx($v) {
		$this->_SqlAggSfx = $v;
	}

	// Select Count
	var $_SqlSelectCount = "";

	function getSqlSelectCount() {
		return ($this->_SqlSelectCount <> "") ? $this->_SqlSelectCount : "SELECT COUNT(*) FROM " . $this->getSqlFrom();
	}

	function SqlSelectCount() { // For backward compatibility
		return $this->getSqlSelectCount();
	}

	function setSqlSelectCount($v) {
		$this->_SqlSelectCount = $v;
	}

	// Sort URL
	function SortUrl(&$fld) {
		return "";
	}

	// Setup lookup filters of a field
	function SetupLookupFilters($fld) {
		global $gsLanguage;
		switch ($fld->FldVar) {
		}
	}

	// Setup AutoSuggest filters of a field
	function SetupAutoSuggestFilters($fld) {
		global $gsLanguage;
		switch ($fld->FldVar) {
		}
	}

	// Table level events
	// Page Selecting event
	function Page_Selecting(&$filter) {

		// Enter your code here
	}

	// Page Breaking event
	function Page_Breaking(&$break, &$content) {

		// Example:
		//$break = FALSE; // Skip page break, or
		//$content = "<div style=\"page-break-after:always;\">&nbsp;</div>"; // Modify page break content

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Cell Rendered event
	function Cell_Rendered(&$Field, $CurrentValue, &$ViewValue, &$ViewAttrs, &$CellAttrs, &$HrefValue, &$LinkAttrs) {

		//$ViewValue = "xxx";
		//$ViewAttrs["style"] = "xxx";

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

	// Load Filters event
	function Page_FilterLoad() {

		// Enter your code here
		// Example: Register/Unregister Custom Extended Filter
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A', 'GetStartsWithAFilter'); // With function, or
		//ewr_RegisterFilter($this-><Field>, 'StartsWithA', 'Starts With A'); // No function, use Page_Filtering event
		//ewr_UnregisterFilter($this-><Field>, 'StartsWithA');

	}

	// Page Filter Validated event
	function Page_FilterValidated() {

		// Example:
		//$this->MyField1->SearchValue = "your search criteria"; // Search value

	}

	// Page Filtering event
	function Page_Filtering(&$fld, &$filter, $typ, $opr = "", $val = "", $cond = "", $opr2 = "", $val2 = "") {

		// Note: ALWAYS CHECK THE FILTER TYPE ($typ)! Example:
		//if ($typ == "dropdown" && $fld->FldName == "MyField") // Dropdown filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "extended" && $fld->FldName == "MyField") // Extended filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "popup" && $fld->FldName == "MyField") // Popup filter
		//	$filter = "..."; // Modify the filter
		//if ($typ == "custom" && $opr == "..." && $fld->FldName == "MyField") // Custom filter, $opr is the custom filter ID
		//	$filter = "..."; // Modify the filter

	}

	// Email Sending event
	function Email_Sending(&$Email, &$Args) {

		//var_dump($Email); var_dump($Args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		// Enter your code here
	}
}
?>
