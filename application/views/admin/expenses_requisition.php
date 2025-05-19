<?php
include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
if (!isset($blanch)) {
    $blanch = [
        (object)['blanch_id' => 1, 'blanch_name' => 'Main Branch HQ'],
        (object)['blanch_id' => 2, 'blanch_name' => 'City Center Branch'],
    ];
}
if (!isset($expns)) {
    $expns = [
        (object)['ex_id' => 10, 'ex_name' => 'Office Rent'],
        (object)['ex_id' => 11, 'ex_name' => 'Travel Allowance'],
    ];
}
if (!isset($account)) { // For the initial state of "Select Account" or if no branch selected
    $account = [
        // (object)['trans_id' => 100, 'account_name' => 'Branch Account A (HQ)'], // Example
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
                Expense Requisition Form
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Submit a request for company expenses.
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
        <?php if ($das = $this->session->flashdata('errors')): // Changed from 'error' to 'errors' as per your old code ?>
        <div class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="inline-flex justify-center items-center size-8 rounded-full border-4 border-red-100 bg-red-200 text-red-800 dark:border-red-900 dark:bg-red-800 dark:text-red-500"><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></span></div>
                <div class="ms-3"><h3 class="text-gray-800 font-semibold dark:text-white">Error</h3><p class="mt-2 text-sm text-gray-700 dark:text-gray-400"><?php echo $das;?></p></div>
                <div class="ps-3 ms-auto"><div class="-mx-1.5 -my-1.5"><button type="button" class="inline-flex bg-red-50 rounded-lg p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600 dark:bg-transparent dark:hover:bg-red-800/50 dark:text-red-600" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div></div>
            </div>
        </div>
        <?php endif; ?>


        <!-- Card: Requisition Form -->
        <div class="bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                 <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">
                    Requisition Details
                </h3>
                <?php echo form_open_multipart("admin/create_requstion_form", ['novalidate' => true]); ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <div>
                            <label for="req_blanch_id" class="label-sm-dt">Select Branch:*</label>
                            <select id="req_blanch_id" name="blanch_id" class="input-select-preline">
                                <option value="">Select Branch</option>
                                <?php if (isset($blanch) && is_array($blanch)): foreach ($blanch as $bl_item): ?>
                                <option value="<?php echo htmlspecialchars($bl_item->blanch_id); ?>" <?php echo set_select('blanch_id', $bl_item->blanch_id); ?>><?php echo htmlspecialchars($bl_item->blanch_name); ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("blanch_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div>
                            <label for="req_ex_id" class="label-sm-dt">Select Expenses:*</label>
                            <select id="req_ex_id" name="ex_id" class="input-select-preline" required>
                                <option value="">Select Expenses</option>
                                <?php if (isset($expns) && is_array($expns)): foreach ($expns as $ex_item): ?>
                                <option value="<?php echo htmlspecialchars($ex_item->ex_id); ?>" <?php echo set_select('ex_id', $ex_item->ex_id); ?>><?php echo htmlspecialchars($ex_item->ex_name); ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("ex_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div>
                            <label for="req_amount" class="label-sm-dt">Amount:*</label>
                            <input type="number" id="req_amount" name="req_amount" class="input-text-preline" placeholder="Amount" autocomplete="off" required value="<?php echo set_value('req_amount'); ?>">
                            <?php echo form_error("req_amount", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div>
                            <label for="req_trans_id" class="label-sm-dt">Select Account (From Branch):*</label>
                            <select id="req_trans_id" name="trans_id" class="input-select-preline" required>
                                <option value="">Select Branch First</option>
                                <?php // Options will be populated by AJAX. Can pre-populate if $account has initial data. ?>
                                <?php if (isset($account) && is_array($account) && !empty($account)): foreach ($account as $acc_item): ?>
                                <option value="<?php echo htmlspecialchars($acc_item->trans_id); ?>" <?php echo set_select('trans_id', $acc_item->trans_id); ?>><?php echo htmlspecialchars($acc_item->account_name); ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("trans_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="req_description" class="label-sm-dt">Description:*</label>
                        <textarea id="req_description" name="req_description" class="input-text-preline min-h-24" rows="3" placeholder="Description" required><?php echo set_value('req_description'); ?></textarea>
                        <?php echo form_error("req_description", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                    </div>

                    <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="req_date" value="<?php echo date("Y-m-d"); ?>">

                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center">
                            <button type="submit" id="submit_requisition" class="py-2.5 px-6 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Submit Requisition</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Card: Requisition Form -->

    </div>
</div>
<!-- ========== END MAIN CONTENT BODY ========== -->

<?php
include_once APPPATH . "views/partials/footer.php";
?>


<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded. AJAX dependent dropdown will not work.');
        return;
    }

    const branchSelect = document.getElementById('req_blanch_id');
    const accountSelect = document.getElementById('req_trans_id'); // The actual select element
    // const currentAccountVal = "<?php echo set_value('trans_id'); ?>"; // Might not be needed if HTML comes pre-selected

    if (branchSelect) {
        branchSelect.addEventListener('change', function () {
            const blanch_id = this.value;

            if (blanch_id !== '' && accountSelect) {
                $.ajax({
                    url: "<?php echo base_url('admin/fetch_account_blanch'); ?>",
                    method: "POST",
                    data: { blanch_id: blanch_id },
                    dataType: "html", //  <--- CHANGE THIS TO 'html'
                    success: function (data) { // 'data' will now be the HTML string of options
                        accountSelect.innerHTML = data; // Directly set the innerHTML

                        // If using Preline Select, tell it to update its display
                        // This is important because Preline wraps the original select
                        if (HSSelect && HSSelect.getInstance(accountSelect.closest('[data-hs-select]'))) {
                           HSSelect.getInstance(accountSelect.closest('[data-hs-select]')).sync();
                           // OR, more robustly if sync isn't enough for dynamic options:
                           // const selectWrapper = accountSelect.closest('[data-hs-select]');
                           // if (selectWrapper) {
                           //    const instance = HSSelect.getInstance(selectWrapper, true);
                           //    if(instance) instance.destroy(); // Destroy old instance
                           //    new HSSelect(selectWrapper).init(); // Re-initialize
                           // }
                        } else {
                             // If it's a standard select that Preline hasn't enhanced yet,
                             // you might need to trigger Preline's autoInit for it here if it wasn't picked up initially.
                             // HSStaticMethods.autoInit(accountSelect.closest('[data-hs-select]'));
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.error("AJAX Error: ", textStatus, errorThrown);
                        if(accountSelect) accountSelect.innerHTML = '<option value="">Error loading accounts</option>';
                        // Re-sync/re-init Preline select on error too
                        if (HSSelect && HSSelect.getInstance(accountSelect.closest('[data-hs-select]'))) {
                           HSSelect.getInstance(accountSelect.closest('[data-hs-select]')).sync();
                        }
                    }
                });
            } else if (accountSelect) {
                accountSelect.innerHTML = '<option value="">Select Branch First</option>';
                 // Re-sync/re-init Preline select
                if (HSSelect && HSSelect.getInstance(accountSelect.closest('[data-hs-select]'))) {
                   HSSelect.getInstance(accountSelect.closest('[data-hs-select]')).sync();
                }
            }
        });

        // Trigger change if a branch is already selected (e.g., after form validation error)
        if (branchSelect.value !== '') {
            const event = new Event('change');
            branchSelect.dispatchEvent(event);
        }
    }
});
</script>