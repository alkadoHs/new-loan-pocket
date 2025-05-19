<?php
// application/views/admin/recommended_expenses_view.php

include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Your controller should pass:
// $blanch: array of branch objects (blanch_id, blanch_name) for dropdowns
// $data: array of expense requisition objects (blanch_name, ex_name, req_amount, account_name, req_description, req_date, req_id)
// $tota_exp: object with 'total_expences' property

if (!isset($blanch)) {
    $blanch = [
        (object)['blanch_id' => 1, 'blanch_name' => 'Main Branch HQ'],
        (object)['blanch_id' => 2, 'blanch_name' => 'City Center Branch'],
    ];
}
if (!isset($data)) {
    $data = [
        (object)['req_id' => 101, 'blanch_name' => 'Main Branch HQ', 'ex_name' => 'Office Rent', 'req_amount' => 50000, 'account_name' => 'NMB Bank', 'req_description' => 'Monthly office rent payment', 'req_date' => '2023-10-28'],
        (object)['req_id' => 102, 'blanch_name' => 'City Center Branch', 'ex_name' => 'Travel Allowance', 'req_amount' => 15000, 'account_name' => 'Cash In Hand', 'req_description' => 'Transport for site visit', 'req_date' => '2023-10-29'],
    ];
}
if (!isset($tota_exp)) {
    $tota_exp = (object)['total_expences' => 65000];
}
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                Expense Requisitions
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Review and manage recommended expense requests.
            </p>
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages ?>
        <?php if ($flash_massage = $this->session->flashdata('massage')): ?>
        <div class="alert-success-preline" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="alert-icon-success-preline"><svg class="alert-svg-success-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="alert-title-preline">Success</h3><p class="alert-text-preline"><?php echo $flash_massage;?></p></div>
                <div class="alert-close-wrapper-preline"><button type="button" class="alert-close-button-preline" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="alert-close-icon-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($flash_errors = $this->session->flashdata('errors')): ?>
        <div class="alert-danger-preline" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="alert-icon-danger-preline"><svg class="alert-svg-danger-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></span></div>
                <div class="ms-3"><h3 class="alert-title-preline">Error</h3><p class="alert-text-preline"><?php echo $flash_errors;?></p></div>
                <div class="alert-close-wrapper-preline"><button type="button" class="alert-close-button-preline" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="alert-close-icon-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>


        <!-- Card: Expense Requisition List & Filters -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <!-- Header with Filters and Actions -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Today's Recommended Expenses <?php // Title might change based on filters ?>
                    </h2>
                </div>
                <div class="inline-flex gap-x-2">
                    <button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-filter-expenses-modal">
                        <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                        Filter
                    </button>
                    <a href="<?php echo base_url("admin/print_all_request"); ?>" target="_blank" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">
                        <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>
                        Print All Expenses
                    </a>
                </div>
            </div>
            <!-- End Header -->
             <!-- Initial Branch Filter Form (Optional, can be merged into modal) -->
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <?php echo form_open("admin/get_expnces_blanch", ['class' => 'flex flex-wrap items-end gap-4']); ?>
                    <div>
                        <label for="initial_blanch_id" class="label-sm-dt">View by Branch:</label>
                        <select name="blanch_id" id="initial_blanch_id" class="input-select-preline min-w-48">
                            <option value="">All Branches (Default)</option>
                            <?php if(isset($blanch) && !empty($blanch)): foreach ($blanch as $bl_item): ?>
                            <option value="<?php echo htmlspecialchars($bl_item->blanch_id); ?>" <?php echo set_select('blanch_id', $bl_item->blanch_id); ?>><?php echo htmlspecialchars($bl_item->blanch_name); ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="py-2.5 px-4 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Get Data</button>
                    </div>
                <?php echo form_close(); ?>
            </div>

            <!-- Table -->
            <div class="p-4" data-hs-datatable='{
                "pageLength": 10, "paging": true,
                "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 btn-ghost-dt" },
                "language": { "zeroRecords": "<div class=\"dt-empty-message\">No expense requisitions found.</div>" }
            }'>
                <div class="mb-4">
                    <input type="text" class="input-search-dt" placeholder="Search requisitions..." data-hs-datatable-search="#expenses_requisition_table">
                </div>
                <div class="overflow-x-auto"><div class="min-w-full inline-block align-middle"><div class="border rounded-lg overflow-hidden dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="expenses_requisition_table">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="th-dt"><span>Branch</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>Expense Type</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>Amount</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>From Account</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt --exclude-from-ordering"><span>Description</span></th>
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
                                <td class="td-dt"><?php echo htmlspecialchars($req_item->account_name); ?></td>
                                <td class="td-dt max-w-xs truncate" title="<?php echo htmlspecialchars($req_item->req_description); ?>"><?php echo character_limiter(htmlspecialchars($req_item->req_description), 50); ?></td>
                                <td class="td-dt"><?php echo htmlspecialchars(date('d M, Y', strtotime($req_item->req_date))); ?></td>
                                <td class="td-dt text-end">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button id="hs-table-action-req-<?php echo $req_item->req_id; ?>" type="button" class="btn-action-sm">Action <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-20 min-w-40 bg-white shadow-2xl rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-table-action-req-<?php echo $req_item->req_id; ?>">
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span class="dropdown-header-sm">Choose an option</span>
                                                <?php // Example: Accept button - you'll need a controller method for this ?>
                                                <!--
                                                <a class="dropdown-item-sm text-green-600 hover:bg-green-50 dark:text-green-500" href="<?php echo base_url("admin/accept_expense_request/{$req_item->req_id}"); ?>" onclick="return confirm('Are you sure you want to accept this request?');">
                                                    <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 0 1 .143 1.052l-8 10.5a.75.75 0 0 1-1.127.075l-4.5-4.5a.75.75 0 0 1 1.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 0 1 1.05-.143Z" clip-rule="evenodd" /></svg>
                                                    Accept
                                                </a>
                                                -->
                                                <a class="dropdown-item-sm text-red-600 hover:bg-red-50 dark:text-red-500 dark:hover:bg-gray-700" href="<?php echo base_url("admin/delete_expences/{$req_item->req_id}"); ?>" onclick="return confirm('Are you sure you want to reject this request?');">
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
                                <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-gray-200">TOTAL</td>
                                <td class="px-6 py-3"></td>
                                <td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-gray-200"><?php echo number_format($tota_exp->total_expences ?? 0); ?></td>
                                <td class="px-6 py-3" colspan="4"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div></div></div>
                <div class="dt-paging-controls" data-hs-datatable-paging="#expenses_requisition_table"></div>
            </div>
        </div>
        <!-- End Card: Expense Requisition List Table -->


        <!-- Filter Modal -->
        <div id="hs-filter-expenses-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="modal-content-dt">
                    <div class="modal-header-dt">
                        <h3 class="modal-title-dt">Filter Expenses by</h3>
                        <button type="button" class="btn-close-modal-dt" data-hs-overlay="#hs-filter-expenses-modal">
                            <span class="sr-only">Close</span>
                            <svg class="modal-close-icon-dt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                        </button>
                    </div>
                    <div class="p-4 sm:p-6 overflow-y-auto">
                        <?php echo form_open("admin/previous_expences"); ?>
                            <div class="space-y-4">
                                <div>
                                    <label for="filter_modal_blanch_id" class="label-sm-dt">* Select Branch:</label>
                                    <select id="filter_modal_blanch_id" name="blanch_id" class="input-select-preline" required>
                                        <option value="">Select Branch</option>
                                        <?php if(isset($blanch) && !empty($blanch)): foreach ($blanch as $bl_item_modal): ?>
                                        <option value="<?php echo htmlspecialchars($bl_item_modal->blanch_id); ?>" <?php echo set_select('blanch_id', $bl_item_modal->blanch_id); ?>><?php echo htmlspecialchars($bl_item_modal->blanch_name); ?></option>
                                        <?php endforeach; endif; ?>
                                        <option value="all" <?php echo set_select('blanch_id', 'all'); ?>>All Branches</option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <label for="filter_modal_from_date" class="label-sm-dt">* From:</label>
                                        <input type="date" id="filter_modal_from_date" name="from" class="input-text-preline" value="<?php echo set_value('from', date('Y-m-d')); ?>" required>
                                    </div>
                                    <div>
                                        <label for="filter_modal_to_date" class="label-sm-dt">* To:</label>
                                        <input type="date" id="filter_modal_to_date" name="to" class="input-text-preline" value="<?php echo set_value('to', date('Y-m-d')); ?>" required>
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

        <?php // Edit Modals for individual rows (if needed - original code didn't show them for this table) ?>

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<?php // Helper CSS classes (ensure these are in your main.css) ?>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // AJAX for dependent dropdown (if needed for any other page, this page doesn't have one in the form)
    // Kept the cmd+a fix
    setTimeout(() => {
        const inputs = document.querySelectorAll('input[data-hs-datatable-search]');
        inputs.forEach((input) => {
        input.addEventListener('keydown', function (evt) {
            if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
            this.select();
            }
        });
        });
        HSStaticMethods.autoInit(['select', 'dropdown', 'overlay']); // General init
    }, 500);
});
</script>