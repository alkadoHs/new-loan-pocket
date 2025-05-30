<?php
// application/views/admin/income_detail_view.php

include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
// Your controller should pass $income, an array of income objects.
// Each object should have 'inc_id' and 'inc_name'.
if (!isset($income)) {
    $income = [
        (object)['inc_id' => 1, 'inc_name' => 'Loan Interest Income'],
        (object)['inc_id' => 2, 'inc_name' => 'Late Fee Income'],
        (object)['inc_id' => 3, 'inc_name' => 'Service Charges'],
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
                Manage Income Types
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Register, edit, and view categories of company income.
            </p>
        </div>
        <!-- End Page Title / Subheader -->

        <?php // Flash Messages - Assuming helper classes for alerts are in main.css ?>
        <?php if ($das = $this->session->flashdata('massage')): ?>
        <div class="alert-success-preline" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="alert-icon-success-preline"><svg class="alert-svg-success-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="alert-title-preline">Success</h3><p class="alert-text-preline"><?php echo $das;?></p></div>
                <div class="alert-close-wrapper-preline"><button type="button" class="alert-close-button-preline" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="alert-close-icon-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Card: Register Income Form -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Register Income Type
                </h3>
                <?php echo form_open("admin/create_income", ['novalidate' => true]); ?>
                    <div class="grid sm:grid-cols-12 gap-4 sm:gap-6">
                        <div class="sm:col-span-3 md:col-span-4"></div> <?php // Spacer ?>
                        <div class="sm:col-span-6 md:col-span-4">
                            <label for="inc_name" class="label-sm-dt">* Income Name:</label>
                            <input type="text" id="inc_name" name="inc_name" placeholder="e.g., Loan Repayment" autocomplete="off" required
                                   class="input-text-preline" value="<?php echo set_value('inc_name'); ?>">
                            <?php echo form_error("inc_name", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div class="sm:col-span-3 md:col-span-4"></div> <?php // Spacer ?>
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
        <!-- End Card: Register Income Form -->


        <!-- Card: Income List Table -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Income List</h2>
            </div>

            <div class="p-4" data-hs-datatable='{
                "pageLength": 10, "paging": true,
                "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 btn-ghost-dt" },
                "language": { "zeroRecords": "<div class=\"dt-empty-message\">No income types found.</div>" }
            }'>
                <div class="flex flex-wrap items-center justify-between gap-2 mb-4">
                    <div class="relative max-w-xs w-full">
                        <label for="income-table-search" class="sr-only">Search</label>
                        <input type="text" name="income-table-search" id="income-table-search" class="input-search-dt" placeholder="Search income types..." data-hs-datatable-search="#income_table">
                        <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3"><svg class="size-4 text-gray-400 dark:text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><path d="m21 21-4.3-4.3"></path></svg></div>
                    </div>
                </div>

                <div class="overflow-x-auto"><div class="min-w-full inline-block align-middle"><div class="border rounded-lg overflow-hidden dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="income_table">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="th-dt"><span>Income Name</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th scope="col" class="th-dt text-end --exclude-from-ordering"><span>Action</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php if (isset($income) && is_array($income) && !empty($income)): ?>
                                <?php foreach ($income as $inc_item): ?>
                                <tr>
                                    <td class="td-dt"><?php echo htmlspecialchars($inc_item->inc_name, ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td class="td-dt text-end">
                                        <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                            <button id="hs-table-action-inc-<?php echo $inc_item->inc_id; ?>" type="button" class="btn-action-sm">Action <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></button>
                                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-20 min-w-40 bg-white shadow-2xl rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-table-action-inc-<?php echo $inc_item->inc_id; ?>">
                                                <div class="py-2 first:pt-0 last:pb-0">
                                                    <span class="dropdown-header-sm">Choose an option</span>
                                                    <a class="dropdown-item-sm" href="#" data-hs-overlay="#hs-edit-income-modal-<?php echo $inc_item->inc_id; ?>"><svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>Edit</a>
                                                </div>
                                                <div class="py-2 first:pt-0 last:pb-0">
                                                    <a class="dropdown-item-sm text-red-600 hover:bg-red-50 dark:text-red-500 dark:hover:bg-gray-700" href="<?php echo base_url("admin/delete_income/{$inc_item->inc_id}"); ?>" onclick="return confirm('Are you sure?')"><svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div></div></div>
                <div class="dt-paging-controls" data-hs-datatable-paging="#income_table"></div>
            </div>
        </div>
        <!-- End Card: Income List Table -->

        <?php // Modals for Edit Income Type ?>
        <?php if (isset($income) && is_array($income)): foreach ($income as $inc_item): ?>
        <div id="hs-edit-income-modal-<?php echo $inc_item->inc_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="modal-content-dt">
                    <div class="modal-header-dt"><h3 class="modal-title-dt">Edit Income Type</h3><button type="button" class="btn-close-modal-dt" data-hs-overlay="#hs-edit-income-modal-<?php echo $inc_item->inc_id; ?>"><span class="sr-only">Close</span><svg class="modal-close-icon-dt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                    <div class="p-4 overflow-y-auto">
                        <?php echo form_open("admin/modify_income/{$inc_item->inc_id}"); ?>
                            <div>
                                <label for="modal_inc_name_<?php echo $inc_item->inc_id; ?>" class="label-sm-dt">* Income Name:</label>
                                <input type="text" id="modal_inc_name_<?php echo $inc_item->inc_id; ?>" name="inc_name" value="<?php echo htmlspecialchars($inc_item->inc_name, ENT_QUOTES, 'UTF-8'); ?>" class="input-text-preline" required>
                            </div>
                            <div class="modal-footer-dt"><button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-edit-income-modal-<?php echo $inc_item->inc_id; ?>">Close</button><button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Update</button></div>
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

<?php // NO NEW <style> block needed here if helper classes are in main.css ?>

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
    // HSStaticMethods.autoInit(); // General Preline init if needed for components not covered by data-attributes
  }, 500);
});
</script>