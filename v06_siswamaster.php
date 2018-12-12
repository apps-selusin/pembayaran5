<?php

// sekolah_id
// kelas_id
// NIS
// Nama

?>
<?php if ($v06_siswa->Visible) { ?>
<!-- <h4 class="ewMasterCaption"><?php echo $v06_siswa->TableCaption() ?></h4> -->
<table id="tbl_v06_siswamaster" class="table table-bordered table-striped ewViewTable">
<?php echo $v06_siswa->TableCustomInnerHtml ?>
	<tbody>
<?php if ($v06_siswa->sekolah_id->Visible) { // sekolah_id ?>
		<tr id="r_sekolah_id">
			<td><?php echo $v06_siswa->sekolah_id->FldCaption() ?></td>
			<td<?php echo $v06_siswa->sekolah_id->CellAttributes() ?>>
<span id="el_v06_siswa_sekolah_id">
<span<?php echo $v06_siswa->sekolah_id->ViewAttributes() ?>>
<?php echo $v06_siswa->sekolah_id->ListViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v06_siswa->kelas_id->Visible) { // kelas_id ?>
		<tr id="r_kelas_id">
			<td><?php echo $v06_siswa->kelas_id->FldCaption() ?></td>
			<td<?php echo $v06_siswa->kelas_id->CellAttributes() ?>>
<span id="el_v06_siswa_kelas_id">
<span<?php echo $v06_siswa->kelas_id->ViewAttributes() ?>>
<?php echo $v06_siswa->kelas_id->ListViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v06_siswa->NIS->Visible) { // NIS ?>
		<tr id="r_NIS">
			<td><?php echo $v06_siswa->NIS->FldCaption() ?></td>
			<td<?php echo $v06_siswa->NIS->CellAttributes() ?>>
<span id="el_v06_siswa_NIS">
<span<?php echo $v06_siswa->NIS->ViewAttributes() ?>>
<?php echo $v06_siswa->NIS->ListViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
<?php if ($v06_siswa->Nama->Visible) { // Nama ?>
		<tr id="r_Nama">
			<td><?php echo $v06_siswa->Nama->FldCaption() ?></td>
			<td<?php echo $v06_siswa->Nama->CellAttributes() ?>>
<span id="el_v06_siswa_Nama">
<span<?php echo $v06_siswa->Nama->ViewAttributes() ?>>
<?php echo $v06_siswa->Nama->ListViewValue() ?></span>
</span>
</td>
		</tr>
<?php } ?>
	</tbody>
</table>
<?php } ?>
