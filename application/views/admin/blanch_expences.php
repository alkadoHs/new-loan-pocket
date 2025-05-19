<?php
include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA ---
// Controller should pass:
// $blanch: array of branch objects (blanch_id, blanch_name) for the filter dropdown
// $data: array of filtered expense requisition objects
// $total_exp: object with 'total_expences' property
// $selected_blanch_id: (Optional) The ID of the currently filtered branch to pre-select the dropdown

if (!isset($blanch)) {
    $blanch = [
        (object)['blanch_id' => 1, 'blanch_name' => 'Main Branch HQ'],
        (object)['blanch_id' => 2, 'blanch_name' => 'City Center Branch'],
    ];
}
if (!isset($data)) {
    $data = [
        (object)['req_id' => 101, 'blanch_name' => 'Main Branch HQ', 'ex_name' => 'Office Rent', 'req_amount' => 50000, 'account_name' => 'NMB Bank', 'req_comment' => 'Monthly office rent', 'req_date' => '2023-10-28'],
        (object)['req_id' => 103, 'blanch_name' => 'Main Branch HQ', 'ex_name' => 'Stationery', 'req_amount' => 5000, 'account_name' => 'Cash In Hand', 'req_comment' => 'Pens and paper', 'req_date' => '2023-10-28'],
    ];
}
if (!isset($total_exp)) {
    $total_exp = (object)['total_expences' => 55000];
}
$selected_blanch_id = $this->input->post('blanch_id') ?? ($this->uri->segment(3) ?? null); // Example of getting selected branch

// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                    Branch Expenses
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    View expenses filtered by branch.
                </p>
            </div>
            <div>
                <a href="<?php echo base_url("admin/get_recomended_request"); ?>" class="btn-secondary-sm">
                    <svg class="icon-sm -ms-0.5 me-1.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
                    Back to All Requisitions
                </a>
            </div>
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages ?>
        <?php if ($flash_massage = $this->session->flashdata('massage')): ?>
        <div class="alert-success-preline" role="alert"> <!-- Using helper class -->
            <div class="flex">
                <div class="flex-shrink-0"><span class="alert-icon-success-preline"><svg class="alert-svg-success-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="alert-title-preline">Success</h3><p class="alert-text-preline"><?php echo $flash_massage;?></p></div>
                <div class="alert-close-wrapper-preline"><button type="button" class="alert-close-button-preline" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="alert-close-icon-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($flash_errors = $this->session->flashdata('errors')): ?>
        <div class="alert-danger-preline" role="alert"> <!-- Using helper class -->
            <div class="flex">
                <div class="flex-shrink-0"><span class="alert-icon-danger-preline"><svg class="alert-svg-danger-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></span></div>
                <div class="ms-3"><h3 class="alert-title-preline">Error</h3><p class="alert-text-preline"><?php echo $flash_errors;?></p></div>
                <div class="alert-close-wrapper-preline"><button type="button" class="alert-close-button-preline" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="alert-close-icon-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>


        <!-- Card: Branch Expenses List Table -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <!-- Header with Branch Filter -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <?php echo form_open("admin/get_expnces_blanch", ['class' => 'flex flex-wrap items-end gap-4']); ?>
                    <div>
                        <label for="filter_blanch_id" class="label-sm-dt">Filter by Branch:</label>
                        <select name="blanch_id" id="filter_blanch_id" class="input-select-preline min-w-48">
                            <option value="">All Branches (If applicable)</option> <?php // Or make it required to select a branch ?>
                            <?php if(isset($blanch) && !empty($blanch)): foreach ($blanch as $bl_item): ?>
                            <option value="<?php echo htmlspecialchars($bl_item->blanch_id); ?>" <?php echo ($selected_blanch_id == $bl_item->blanch_id) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($bl_item->blanch_name); ?>
                            </option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="py-2.5 px-4 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Get Data</button>
                    </div>
                <?php echo form_close(); ?>
            </div>
            <!-- End Header -->

            <!-- Table -->
            <div class="p-4" data-hs-datatable='{
                "pageLength": 10, "paging": true,
                "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 btn-ghost-dt" },
                "language": { "zeroRecords": "<div class=\"dt-empty-message\">No expenses found for this branch.</div>" }
            }'>
                <div class="mb-4">
                    <input type="text" class="input-search-dt" placeholder="Search in these results..." data-hs-datatable-search="#branch_expenses_table">
                </div>
                <div class="overflow-x-auto"><div class="min-w-full inline-block align-middle"><div class="border rounded-lg overflow-hidden dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="branch_expenses_table">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="th-dt"><span>Branch</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>Expense Type</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>Amount</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt --exclude-from-ordering"><span>Description/Comment</span></th>
                                <th class="th-dt"><span>From Account</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>Date</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt text-end --exclude-from-ordering"><span>Action</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php if (isset($data) && is_array($data) && !empty($data)): foreach ($data as $req_item): ?>
                            <tr>
                                <td class="td-dt"><?php echo htmlspecialchars($req_item->blanch_name); ?></td>
                                <td class="td-dt"><?php echo htmlspecialchars($req_item->ex_name); ?></td>
                                <td class="td-dt"><?php echo number_format($req_item->req_amount); ?></td>
                                <td class="td-dt max-w-xs truncate" title="<?php echo htmlspecialchars($req_item->req_comment ?? ($req_item->req_description ?? '')); ?>"><?php echo character_limiter(htmlspecialchars($req_item->req_comment ?? ($req_item->req_description ?? '')), 50); ?></td>
                                <td class="td-dt"><?php echo htmlspecialchars($req_item->account_name); ?></td>
                                <td class="td-dt"><?php echo htmlspecialchars(date('d M, Y', strtotime($req_item->req_date))); ?></td>
                                <td class="td-dt text-end">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button id="hs-table-action-exp-<?php echo $req_item->req_id; ?>" type="button" class="btn-action-sm">Action <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-20 min-w-40 bg-white shadow-2xl rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-table-action-exp-<?php echo $req_item->req_id; ?>">
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span class="dropdown-header-sm">Choose an option</span>
                                                <?php // If an "Accept" action is needed for this list:
                                                /*
                                                <a class="dropdown-item-sm text-green-600 hover:bg-green-50 dark:text-green-500" href="<?php echo base_url("admin/accept_expense/{$req_item->req_id}"); ?>" onclick="return confirm('Are you sure you want to accept this expense?');">
                                                    <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" /></svg>
                                                    Accept
                                                </a>
                                                */ ?>
                                                <a class="dropdown-item-sm text-red-600 hover:bg-red-50 dark:text-red-500 dark:hover:bg-gray-700" href="<?php echo base_url("admin/delete_expences/{$req_item->req_id}"); ?>" onclick="return confirm('Are you sure you want to reject/delete this expense requisition?');">
                                                    <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" /></svg>
                                                    Reject
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                         <tfoot>
                            <tr>
                                <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-gray-200 uppercase">TOTAL</td>
                                <td class="px-6 py-3"></td>
                                <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-gray-200"><?php echo number_format($total_exp->total_expences ?? 0); ?></td>
                                <td class="px-6 py-3" colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div></div></div>
                <div class="dt-paging-controls" data-hs-datatable-paging="#branch_expenses_table"></div>
            </div>
        </div>
        <!-- End Card: Branch Expenses List Table -->

        <!-- Filter Modal (from /admin/get_recomended_request) -->
        <div id="hs-filter-expenses-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="modal-content-dt">
                    <div class="modal-header-dt">
                        <h3 class="modal-title-dt">Filter Expenses by</h3>
                        <button type="button" class="btn-close-modal-dt" data-hs-overlay="#hs-filter-expenses-modal">
                            <span class="sr-only">Close</span><svg class="modal-close-icon-dt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        </button>
                    </div>
                    <div class="p-4 sm:p-6 overflow-y-auto">
                        <?php echo form_open("admin/previous_expences"); // This was the target of the filter modal in the other file ?>
                            <div class="space-y-4">
                                <div>
                                    <label for="filter_modal_blanch_id_adv" class="label-sm-dt">* Select Branch:</label>
                                    <select id="filter_modal_blanch_id_adv" name="blanch_id" class="input-select-preline" required >
                                        <option value="">Select Branch</option>
                                        <?php if(isset($blanch) && !empty($blanch)): foreach ($blanch as $bl_item_modal): ?>
                                        <option value="<?php echo htmlspecialchars($bl_item_modal->blanch_id); ?>" <?php echo set_select('blanch_id', $bl_item_modal->blanch_id); ?>><?php echo htmlspecialchars($bl_item_modal->blanch_name); ?></option>
                                        <?php endforeach; endif; ?>
                                        <option value="all" <?php echo set_select('blanch_id', 'all'); ?>>All Branches</option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="filter_modal_from_date_adv" class="label-sm-dt">* From:</label>
                                        <input type="date" id="filter_modal_from_date_adv" name="from" class="input-text-preline" value="<?php echo set_value('from', date('Y-m-d')); ?>" required>
                                    </div>
                                    <div>
                                        <label for="filter_modal_to_date_adv" class="label-sm-dt">* To:</label>
                                        <input type="date" id="filter_modal_to_date_adv" name="to" class="input-text-preline" value="<?php echo set_value('to', date('Y-m-d')); ?>" required>
                                    </div>
                                </div>
                                <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="modal-footer-dt">
                                <button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-filter-expenses-modal">Close</button>
                                <button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Filter Data</button>
                            </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Filter Modal -->

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<script>
document.addEventListener('DOMContentLoaded', function () {
    setTimeout(() => {
        const inputs = document.querySelectorAll('input[data-hs-datatable-search]');
        inputs.forEach((input) => {
        input.addEventListener('keydown', function (evt) {
            if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
            this.select();
            }
        });
        });
        // If Preline selects need explicit init for this page (e.g., in the filter modal):
        // HSStaticMethods.autoInit(['select', 'overlay', 'dropdown']);
    }, 500);
});
</script>