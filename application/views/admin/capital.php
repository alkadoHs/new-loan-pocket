<?php
// application/views/admin/capital_view.php

include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
if (!isset($share)) {
    $share = [
        (object)['share_id' => 1, 'share_name' => 'Alice Wonderland'],
        (object)['share_id' => 2, 'share_name' => 'Bob The Builder'],
    ];
}
if (!isset($account)) {
    $account = [
        (object)['trans_id' => 10, 'account_name' => 'NMB Bank'],
        (object)['trans_id' => 11, 'account_name' => 'Cash In Hand'],
    ];
}
if (!isset($capital)) {
    $capital = [
        (object)['capital_id' => 100, 'share_id' => 1, 'share_name' => 'Alice Wonderland', 'amount' => 500000, 'account_name' => 'NMB Bank', 'pay_method' => 10, 'recept' => 'REC001', 'chaque_no' => null, 'comp_id' => ($_SESSION['comp_id'] ?? 1)],
        (object)['capital_id' => 101, 'share_id' => 2, 'share_name' => 'Bob The Builder', 'amount' => 750000, 'account_name' => 'Cash In Hand', 'pay_method' => 11, 'recept' => 'REC002', 'chaque_no' => 'CHK123', 'comp_id' => ($_SESSION['comp_id'] ?? 1)],
    ];
}
if (!isset($total_capital_company)) {
    $total_capital_company = (object)['total_capital' => 1250000];
}
if (!isset($account_capital)) {
    $account_capital = [
        (object)['account_name' => 'NMB Bank', 'comp_balance' => 800000],
        (object)['account_name' => 'Cash In Hand', 'comp_balance' => 450000],
    ];
}
// --- END DUMMY DATA ---
?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <!-- Page Title / Subheader -->
        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">
                Manage Capital
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Add and view capital contributions.
            </p>
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages ?>
        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="bg-teal-100 border border-teal-200 text-sm text-teal-800 rounded-lg p-4 dark:bg-teal-800/10 dark:border-teal-900 dark:text-teal-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-teal-100 bg-teal-200 text-teal-800 dark:border-teal-900 dark:bg-teal-800 dark:text-teal-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white">Success</h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><div class="-mx-1.5 -my-1.5"><button type="button" class="inline-flex bg-teal-50 rounded-lg p-1.5 text-teal-500 hover:bg-teal-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-teal-50 focus:ring-teal-600 dark:bg-transparent dark:hover:bg-teal-800/50 dark:text-teal-600" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div></div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Card: Add Capital Form -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Add Capital
                </h3>
                <?php echo form_open("admin/create_capital", ['novalidate' => true]); ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <div class="sm:col-span-4">
                            <label for="add_share_id" class="label-sm-dt">* Share Holder Name:</label>
                            <select id="add_share_id" name="share_id" required class="input-select-preline">
                                <option value="">Select Share Holder</option>
                                <?php if (isset($share) && is_array($share)): foreach ($share as $sh_item): ?>
                                <option value="<?php echo htmlspecialchars($sh_item->share_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo set_select('share_id', $sh_item->share_id); ?>>
                                    <?php echo htmlspecialchars($sh_item->share_name, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("share_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-4">
                            <label for="add_amount" class="label-sm-dt">* Amount:</label>
                            <input type="number" id="add_amount" name="amount" placeholder="Amount" autocomplete="off" required
                                   class="input-text-preline" value="<?php echo set_value('amount'); ?>">
                            <?php echo form_error("amount", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        
                        <div class="sm:col-span-4">
                            <label for="add_pay_method" class="label-sm-dt">* Pay Method:</label>
                            <select id="add_pay_method" name="pay_method" required class="input-select-preline">
                                <option value="">Select Pay Method</option>
                                <?php if (isset($account) && is_array($account)): foreach ($account as $acc_item): ?>
                                <option value="<?php echo htmlspecialchars($acc_item->trans_id, ENT_QUOTES, 'UTF-8'); ?>" <?php echo set_select('pay_method', $acc_item->trans_id); ?>>
                                    <?php echo htmlspecialchars($acc_item->account_name, ENT_QUOTES, 'UTF-8'); ?>
                                </option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("pay_method", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>

                        <div class="sm:col-span-6">
                            <label for="add_recept" class="label-sm-dt">Receipt No (Optional):</label>
                            <input type="number" id="add_recept" name="recept" placeholder="Receipt number" autocomplete="off"
                                   class="input-text-preline" value="<?php echo set_value('recept'); ?>">
                            <?php echo form_error("recept", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div class="sm:col-span-6">
                            <label for="add_chaque_no" class="label-sm-dt">Cheque Number (Optional):</label>
                            <input type="number" id="add_chaque_no" name="chaque_no" placeholder="Cheque number" autocomplete="off"
                                   class="input-text-preline" value="<?php echo set_value('chaque_no'); ?>">
                            <?php echo form_error("chaque_no", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                    </div>
                    <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Save</button>
                            <button type="reset" class="btn-secondary-sm">Cancel</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Card: Add Capital Form -->

        <!-- Card: Capital List Table -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700"><h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Capital List</h2></div>
            <div class="p-4" data-hs-datatable='{
                "pageLength": 10, "paging": true,
                "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 btn-ghost-dt" },
                "language": { "zeroRecords": "<div class=\"dt-empty-message\">No capital contributions found.</div>" }
            }'>
                <div class="flex justify-between items-center mb-4">
                    <div class="relative max-w-xs w-full">
                        <input type="text" id="capital_table_search" class="input-search-dt" placeholder="Search capital..." data-hs-datatable-search="#capital_table">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3"><svg class="size-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg></div>
                    </div>
                </div>
                <div class="overflow-x-auto"><div class="min-w-full inline-block align-middle"><div class="border rounded-lg overflow-hidden dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="capital_table">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="th-dt"><span>S/No.</span></th>
                                <th scope="col" class="th-dt"><span>Share Holder</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th scope="col" class="th-dt"><span>Amount</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th scope="col" class="th-dt"><span>Pay Method</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th scope="col" class="th-dt --exclude-from-ordering"><span>Receipt No</span></th>
                                <th scope="col" class="th-dt --exclude-from-ordering"><span>Cheque No</span></th>
                                <th scope="col" class="th-dt text-end --exclude-from-ordering"><span>Action</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $no_cap = 1; if (isset($capital) && !empty($capital)): foreach ($capital as $cap_item): ?>
                            <tr>
                                <td class="td-dt"><?php echo $no_cap++; ?>.</td>
                                <td class="td-dt"><?php echo htmlspecialchars($cap_item->share_name); ?></td>
                                <td class="td-dt"><?php echo number_format($cap_item->amount); ?>/=</td>
                                <td class="td-dt"><?php echo htmlspecialchars($cap_item->account_name); ?></td>
                                <td class="td-dt"><?php echo $cap_item->recept ? htmlspecialchars($cap_item->recept) : '-'; ?></td>
                                <td class="td-dt"><?php echo $cap_item->chaque_no ? htmlspecialchars($cap_item->chaque_no) : '-'; ?></td>
                                <td class="td-dt text-end">
                                    <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button id="hs-cap-action-<?php echo $cap_item->capital_id; ?>" type="button" class="btn-action-sm">Action <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-20 min-w-48 bg-white shadow-2xl rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-cap-action-<?php echo $cap_item->capital_id; ?>"> <?php // Removed .dropdown-menu-sm and applied Tailwind directly ?>
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span class="dropdown-header-sm">Choose an option</span>
                                                <a class="dropdown-item-sm" href="#" data-hs-overlay="#hs-edit-capital-modal-<?php echo $cap_item->capital_id; ?>"><svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>Edit</a>
                                                <a class="dropdown-item-sm" href="#" data-hs-overlay="#hs-add-more-capital-modal-<?php echo $cap_item->capital_id; ?>"><svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>Add Capital</a>
                                                <a class="dropdown-item-sm" href="#" data-hs-overlay="#hs-minimize-capital-modal-<?php echo $cap_item->capital_id; ?>"><svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"/></svg>Minimize Capital</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                         <tfoot><tr><td colspan="2" class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-gray-200">TOTAL</td><td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-gray-200"><?php echo number_format($total_capital_company->total_capital ?? 0); ?>/=</td><td colspan="4"></td></tr></tfoot>
                    </table>
                </div></div></div>
                <div class="dt-paging-controls" data-hs-datatable-paging="#capital_table"></div>
            </div>
        </div>
        <!-- End Card: Capital List Table -->

        <!-- Card: Account Summary Table -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700"><h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Account Summary</h2></div>
            <div class="p-4" data-hs-datatable='{ "pageLength": 5, "paging": true, "searching": false, "info": false, "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 btn-ghost-dt" }}'>
                 <div class="overflow-x-auto"><div class="min-w-full inline-block align-middle"><div class="border rounded-lg overflow-hidden dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="account_summary_table">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="th-dt"><span>S/No.</span></th>
                                <th class="th-dt"><span>Account Name</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>Account Balance</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $no_as = 1; if(isset($account_capital) && !empty($account_capital)): foreach($account_capital as $ac_item): ?>
                            <tr>
                                <td class="td-dt"><?php echo $no_as++; ?>.</td>
                                <td class="td-dt"><?php echo htmlspecialchars($ac_item->account_name); ?></td>
                                <td class="td-dt"><?php echo number_format($ac_item->comp_balance); ?></td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                    </table>
                </div></div></div>
                <div class="dt-paging-controls" data-hs-datatable-paging="#account_summary_table"></div>
            </div>
        </div>
        <!-- End Card: Account Summary Table -->

        <?php // Modals (Edit Capital, Add More Capital, Minimize Capital) ?>
        <?php if (isset($capital) && is_array($capital)): foreach ($capital as $cap_item): ?>
            <!-- Edit Capital Modal -->
            <div id="hs-edit-capital-modal-<?php echo $cap_item->capital_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all lg:max-w-3xl lg:w-full m-3 lg:mx-auto">
                    <div class="modal-content-dt">
                        <div class="modal-header-dt"><h3 class="modal-title-dt">Edit Capital</h3><button type="button" class="btn-close-modal-dt" data-hs-overlay="#hs-edit-capital-modal-<?php echo $cap_item->capital_id; ?>"><span class="sr-only">Close</span><svg class="modal-close-icon-dt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                        <div class="p-4 overflow-y-auto">
                            <?php echo form_open("admin/edit_capital/{$cap_item->capital_id}/{$cap_item->pay_method}"); ?>
                                <div class="grid sm:grid-cols-12 gap-4">
                                    <div class="sm:col-span-4"><label class="label-sm-dt">Share Holder:</label>
                                        <select name="share_id" class="input-select-preline" required>
                                            <?php foreach ($share as $sh_item): ?><option value="<?php echo $sh_item->share_id; ?>" <?php echo ($cap_item->share_id == $sh_item->share_id) ? 'selected' : ''; ?>><?php echo htmlspecialchars($sh_item->share_name); ?></option><?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="sm:col-span-4"><label class="label-sm-dt">Amount:</label><input type="number" name="amount_display" value="<?php echo htmlspecialchars($cap_item->amount); ?>" class="input-text-preline" readonly></div> <?php // Renamed to amount_display, actual amount for submit will be hidden or handled server-side if not editable ?>
                                    <div class="sm:col-span-4"><label class="label-sm-dt">Pay Method:</label><input type="text" value="<?php echo htmlspecialchars($cap_item->account_name); ?>" class="input-text-preline" readonly></div>
                                    <div class="sm:col-span-6"><label class="label-sm-dt">Receipt No:</label><input type="number" name="recept" value="<?php echo htmlspecialchars($cap_item->recept); ?>" class="input-text-preline"></div>
                                    <div class="sm:col-span-6"><label class="label-sm-dt">Cheque No:</label><input type="number" name="chaque_no" value="<?php echo htmlspecialchars($cap_item->chaque_no); ?>" class="input-text-preline"></div>
                                </div>
                                <div class="modal-footer-dt"><button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-edit-capital-modal-<?php echo $cap_item->capital_id; ?>">Close</button><button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Update</button></div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add More Capital Modal -->
            <div id="hs-add-more-capital-modal-<?php echo $cap_item->capital_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-sm sm:w-full m-3 sm:mx-auto">
                     <div class="modal-content-dt">
                        <div class="modal-header-dt"><h3 class="modal-title-dt">Add More Capital to <?php echo htmlspecialchars($cap_item->share_name);?></h3><button type="button" class="btn-close-modal-dt" data-hs-overlay="#hs-add-more-capital-modal-<?php echo $cap_item->capital_id; ?>"><span class="sr-only">Close</span><svg class="modal-close-icon-dt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                        <div class="p-4 overflow-y-auto">
                            <?php echo form_open("admin/add_capital/{$cap_item->capital_id}/{$cap_item->comp_id}/{$cap_item->pay_method}"); ?>
                                <div>
                                    <label class="label-sm-dt">*Amount to Add:</label>
                                    <input type="number" name="amount" placeholder="Amount to add" class="input-text-preline" required>
                                </div>
                                <div class="modal-footer-dt"><button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-add-more-capital-modal-<?php echo $cap_item->capital_id; ?>">Close</button><button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Add</button></div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Minimize Capital Modal -->
            <div id="hs-minimize-capital-modal-<?php echo $cap_item->capital_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
                <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-sm sm:w-full m-3 sm:mx-auto">
                     <div class="modal-content-dt">
                        <div class="modal-header-dt"><h3 class="modal-title-dt">Minimize Capital for <?php echo htmlspecialchars($cap_item->share_name);?></h3><button type="button" class="btn-close-modal-dt" data-hs-overlay="#hs-minimize-capital-modal-<?php echo $cap_item->capital_id; ?>"><span class="sr-only">Close</span><svg class="modal-close-icon-dt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                        <div class="p-4 overflow-y-auto">
                            <?php echo form_open("admin/minimize_capital/{$cap_item->capital_id}/{$cap_item->comp_id}/{$cap_item->pay_method}"); ?>
                                <div>
                                    <label class="label-sm-dt">*Amount to Minimize:</label>
                                    <input type="number" name="amount" placeholder="Amount to minimize" class="input-text-preline" required>
                                </div>
                                <div class="modal-footer-dt"><button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-minimize-capital-modal-<?php echo $cap_item->capital_id; ?>">Close</button><button type="submit" class="btn-primary-sm bg-orange-500 hover:bg-orange-600 text-white">Minimize</button></div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; endif; ?>
        <?php // End Modals ?>

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>

<?php // Helper CSS classes (BEST to move these to your main.css that Tailwind processes) ?>
    

<script>
window.addEventListener('load', () => {
  setTimeout(() => {
    const inputs = document.querySelectorAll('input[data-hs-datatable-search]');
    inputs.forEach((input) => {
      input.addEventListener('keydown', function (evt) {
        if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
          this.select();
        }
      });
    });
    // Initialize Preline selects if they are not auto-initialized, especially after modal content is shown
    // This is often needed if you add `data-hs-select` attributes dynamically or content is hidden initially.
    // HSStaticMethods.autoInit(['select']); // Uncomment if Preline selects are not working
  }, 500);
});
</script>