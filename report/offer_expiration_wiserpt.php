<?php
namespace PHPReportMaker12\project2;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($offer_expiration_wise_rpt))
	$offer_expiration_wise_rpt = new offer_expiration_wise_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$offer_expiration_wise_rpt;

// Run the page
$Page->run();

// Setup login status
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $offer_expiration_wise_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_offer_expiration_wise" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->offer_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="offer_id"><div class="offer_expiration_wise_offer_id"><span class="ew-table-header-caption"><?php echo $Page->offer_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="offer_id">
<?php if ($Page->sortUrl($Page->offer_id) == "") { ?>
		<div class="ew-table-header-btn offer_expiration_wise_offer_id">
			<span class="ew-table-header-caption"><?php echo $Page->offer_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer offer_expiration_wise_offer_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->offer_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->offer_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->offer_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->offer_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->offer_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="offer_name"><div class="offer_expiration_wise_offer_name"><span class="ew-table-header-caption"><?php echo $Page->offer_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="offer_name">
<?php if ($Page->sortUrl($Page->offer_name) == "") { ?>
		<div class="ew-table-header-btn offer_expiration_wise_offer_name">
			<span class="ew-table-header-caption"><?php echo $Page->offer_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer offer_expiration_wise_offer_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->offer_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->offer_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->offer_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->offer_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->offer_percent->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="offer_percent"><div class="offer_expiration_wise_offer_percent"><span class="ew-table-header-caption"><?php echo $Page->offer_percent->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="offer_percent">
<?php if ($Page->sortUrl($Page->offer_percent) == "") { ?>
		<div class="ew-table-header-btn offer_expiration_wise_offer_percent">
			<span class="ew-table-header-caption"><?php echo $Page->offer_percent->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer offer_expiration_wise_offer_percent" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->offer_percent) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->offer_percent->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->offer_percent->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->offer_percent->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->offer_start_date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="offer_start_date"><div class="offer_expiration_wise_offer_start_date"><span class="ew-table-header-caption"><?php echo $Page->offer_start_date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="offer_start_date">
<?php if ($Page->sortUrl($Page->offer_start_date) == "") { ?>
		<div class="ew-table-header-btn offer_expiration_wise_offer_start_date">
			<span class="ew-table-header-caption"><?php echo $Page->offer_start_date->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer offer_expiration_wise_offer_start_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->offer_start_date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->offer_start_date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->offer_start_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->offer_start_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->offer_end_date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="offer_end_date"><div class="offer_expiration_wise_offer_end_date"><span class="ew-table-header-caption"><?php echo $Page->offer_end_date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="offer_end_date">
<?php if ($Page->sortUrl($Page->offer_end_date) == "") { ?>
		<div class="ew-table-header-btn offer_expiration_wise_offer_end_date">
			<span class="ew-table-header-caption"><?php echo $Page->offer_end_date->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer offer_expiration_wise_offer_end_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->offer_end_date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->offer_end_date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->offer_end_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->offer_end_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->offer_id->Visible) { ?>
		<td data-field="offer_id"<?php echo $Page->offer_id->cellAttributes() ?>>
<span<?php echo $Page->offer_id->viewAttributes() ?>><?php echo $Page->offer_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->offer_name->Visible) { ?>
		<td data-field="offer_name"<?php echo $Page->offer_name->cellAttributes() ?>>
<span<?php echo $Page->offer_name->viewAttributes() ?>><?php echo $Page->offer_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->offer_percent->Visible) { ?>
		<td data-field="offer_percent"<?php echo $Page->offer_percent->cellAttributes() ?>>
<span<?php echo $Page->offer_percent->viewAttributes() ?>><?php echo $Page->offer_percent->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->offer_start_date->Visible) { ?>
		<td data-field="offer_start_date"<?php echo $Page->offer_start_date->cellAttributes() ?>>
<span<?php echo $Page->offer_start_date->viewAttributes() ?>><?php echo $Page->offer_start_date->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->offer_end_date->Visible) { ?>
		<td data-field="offer_end_date"<?php echo $Page->offer_end_date->cellAttributes() ?>>
<span<?php echo $Page->offer_end_date->viewAttributes() ?>><?php echo $Page->offer_end_date->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && FALSE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_offer_expiration_wise" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || FALSE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "offer_expiration_wise_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>