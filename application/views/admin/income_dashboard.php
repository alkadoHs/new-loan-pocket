<?php
// application/views/admin/income_dashboard_view.php

include_once APPPATH . "views/partials/header.php";

// --- DUMMY DATA - REMOVE AND LOAD FROM YOUR CONTROLLER ---
if (!isset($blanch)) {
    $blanch = [
        (object)['blanch_id' => 1, 'blanch_name' => 'Main Branch HQ'],
        (object)['blanch_id' => 2, 'blanch_name' => 'City Center Branch'],
    ];
}
if (!isset($income)) {
    $income = [
        (object)['inc_id' => 1, 'inc_name' => 'Loan Repayment Interest'],
        (object)['inc_id' => 2, 'inc_name' => 'Service Fee'],
    ];
}
if (!isset($detail_income)) {
    $detail_income = [
        (object)['receved_id' => 1, 'customer_id' => 10, 'f_name' => 'John', 'm_name' => '', 'l_name' => 'Doe', 'blanch_name' => 'Main Branch HQ', 'inc_id' => 1, 'inc_name' => 'Loan Repayment Interest', 'receve_amount' => 5000, 'empl' => 'Admin User', 'receve_day' => '2023-10-29', 'loan_id' => 1001],
        (object)['receved_id' => 2, 'customer_id' => 11, 'f_name' => 'Jane', 'm_name' => 'X', 'l_name' => 'Smith', 'blanch_name' => 'City Center Branch', 'inc_id' => 2, 'inc_name' => 'Service Fee', 'receve_amount' => 1500, 'empl' => 'Admin User', 'receve_day' => '2023-10-29', 'loan_id' => 1002],
    ];
}
if (!isset($total_receved)) {
    $total_receved = (object)['total_receved' => 6500];
}
if(!isset($customer)){ $customer = []; }
// --- END DUMMY DATA ---

// Define the common Preline select attribute strings here for reusability in this view
$prelineSelectToggleClasses = "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600";
$prelineSelectDropdownClasses = "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500";
$prelineSelectOptionClasses = "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700";
$prelineSelectOptionTemplate = "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>";
$prelineSelectExtraMarkup = "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>";
$prelineSelectModalDropdownClasses = "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-[81] w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500"; // Higher z-index for modals


?>

<!-- ========== MAIN CONTENT BODY ========== -->
<div class="w-full lg:ps-64">
    <div class="p-4 sm:p-6 space-y-6">

        <div class="mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 dark:text-gray-200">Income Dashboard & Entry</h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Record and view income transactions.</p>
        </div>

        <?php if ($flash_massage = $this->session->flashdata('massage')): ?>
        <div class="alert-success-preline" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="alert-icon-success-preline"><svg class="alert-svg-success-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path><path d="m9 12 2 2 4-4"></path></svg></span></div>
                <div class="ms-3"><h3 class="alert-title-preline">Success</h3><p class="alert-text-preline"><?php echo $flash_massage;?></p></div>
                <div class="alert-close-wrapper-preline"><button type="button" class="alert-close-button-preline" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="alert-close-icon-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($flash_errors = $this->session->flashdata('error')): ?>
        <div class="alert-danger-preline" role="alert">
            <div class="flex">
                <div class="flex-shrink-0"><span class="alert-icon-danger-preline"><svg class="alert-svg-danger-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></span></div>
                <div class="ms-3"><h3 class="alert-title-preline">Error</h3><p class="alert-text-preline"><?php echo $flash_errors;?></p></div>
                <div class="alert-close-wrapper-preline"><button type="button" class="alert-close-button-preline" data-hs-remove-element="[role=alert]"><span class="sr-only">Dismiss</span><svg class="alert-close-icon-preline" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"></path><path d="m6 6 12 12"></path></svg></button></div>
            </div>
        </div>
        <?php endif; ?>

        <!-- Card: Record Income Form -->
        <div class="bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="p-4 md:p-6">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Record New Income</h3>
                <?php echo form_open("admin/create_income_detail", ['novalidate' => true]); ?>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">
                        <div>
                            <label for="form_blanch_id" class="label-sm-dt">* Branch:</label>
                            <select id="form_blanch_id" name="blanch_id" class="w-full" required
							data-hs-select='{
            "placeholder": "Select Branch",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }'>
                                <option value="">Select Branch</option>
                                <?php if(isset($blanch)): foreach ($blanch as $bl_item): ?>
                                <option value="<?php echo htmlspecialchars($bl_item->blanch_id); ?>" <?php echo set_select('blanch_id', $bl_item->blanch_id); ?>><?php echo htmlspecialchars($bl_item->blanch_name); ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("blanch_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div>
                            <label for="form_customer_id" class="label-sm-dt">* Customer:</label>
                            <select id="form_customer_id" name="customer_id" class="w-full" required
							data-hs-select='{
            "placeholder": "Select Customer",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }'>
                                <option value="">Select Branch First</option>
                            </select>
                             <?php echo form_error("customer_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div>
                            <label for="form_loan_id" class="label-sm-dt">* Active Loan:</label>
                            <select id="form_loan_id" name="loan_id" class="w-full" required
							data-hs-select='{
            "placeholder": "Select Active loan",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }'>
                                <option value="">Select Customer First</option>
                            </select>
                            <?php echo form_error("loan_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div>
                            <label for="form_inc_id" class="label-sm-dt">* Income Type:</label>
                            <select id="form_inc_id" name="inc_id" class="w-full" required
							data-hs-select='{
            "placeholder": "Select ",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }'>
                                <option value="">Select Income Type</option>
                                <?php if(isset($income)): foreach ($income as $inc_item): ?>
                                <option value="<?php echo htmlspecialchars($inc_item->inc_id); ?>" <?php echo set_select('inc_id', $inc_item->inc_id); ?>><?php echo htmlspecialchars($inc_item->inc_name); ?></option>
                                <?php endforeach; endif; ?>
                            </select>
                            <?php echo form_error("inc_id", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                        <div class="lg:col-span-2">
                            <label for="form_receve_amount" class="label-sm-dt">* Income Amount:</label>
                            <input type="number" id="form_receve_amount" name="receve_amount" class="input-text-preline" placeholder="Amount" autocomplete="off" required value="<?php echo set_value('receve_amount'); ?>">
                            <?php echo form_error("receve_amount", '<p class="text-xs text-red-600 mt-2">', '</p>'); ?>
                        </div>
                    </div>
                    <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="receve_day" value="<?php echo date("Y-m-d"); ?>">
                    <div class="mt-6 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <div class="flex justify-center gap-x-2">
                            <button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white px-6">Save Income</button>
                            <button type="reset" class="btn-secondary-sm px-6">Cancel</button>
                        </div>
                    </div>
                <?php echo form_close(); ?>
            </div>
        </div>
        <!-- End Card: Record Income Form -->

        <!-- Card: Today Income List Table -->
        <div class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700">
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <div><h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">Today Income List</h2></div>
                <div class="inline-flex gap-x-2">
                    <button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-filter-previous-income-modal">
                        <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 0 1 .628.74v2.288a2.25 2.25 0 0 1-.659 1.59l-4.682 4.683a2.25 2.25 0 0 0-.659 1.59v3.032a.75.75 0 0 1-1.28.53l-1.875-1.875a.75.75 0 0 1-.22-.53V12.5a2.25 2.25 0 0 0-.659-1.59L4.682 6.22A2.25 2.25 0 0 1 4.023 4.63V2.34a.75.75 0 0 1 .605-.738Z" clip-rule="evenodd" /></svg>Filter Previous
                    </button>
                    <a href="<?php echo base_url("admin/print_todayIncome"); ?>" target="_blank" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">
                         <svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect width="12" height="8" x="6" y="14"/></svg>Print
                    </a>
                </div>
            </div>
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <?php echo form_open("admin/search_income_inBlanch", ['class' => 'flex flex-wrap items-end gap-4']); ?>
                    <div>
                        <label for="table_filter_blanch_id" class="label-sm-dt">Filter List by Branch:</label>
                        <select name="blanch_id" id="table_filter_blanch_id" class="min-w-48 w-full" required data-hs-select='{
            "placeholder": "Select Branch",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }'>
                            <option value="">Select Branch</option>
                            <?php if(isset($blanch)): foreach ($blanch as $bl_item): ?>
                            <option value="<?php echo htmlspecialchars($bl_item->blanch_id); ?>" <?php echo ($this->input->post('blanch_id') == $bl_item->blanch_id || ($this->uri->segment(3) == 'search_income_inBlanch' && $this->uri->segment(4) == $bl_item->blanch_id)) ? 'selected' : ''; ?>><?php echo htmlspecialchars($bl_item->blanch_name); ?></option>
                            <?php endforeach; endif; ?>
                        </select>
                         <input type="hidden" name="receve_day" value="<?php echo date("Y-m-d"); ?>">
                    </div>
                    <div><button type="submit" class="py-2.5 px-4 btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Get Data</button></div>
                <?php echo form_close(); ?>
            </div>

            <div class="p-4" data-hs-datatable='{
                "pageLength": 10, "paging": true,
                "pagingOptions": { "pageBtnClasses": "min-w-10 h-10 btn-ghost-dt" },
                "language": { "zeroRecords": "<div class=\"dt-empty-message\">No income records found.</div>" }
            }'>
                <div class="mb-4"><input type="text" class="input-search-dt" placeholder="Search in results..." data-hs-datatable-search="#income_list_table"></div>
                <div class="overflow-x-auto"><div class="min-w-full inline-block align-middle"><div class="border rounded-lg overflow-hidden dark:border-gray-700">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700" id="income_list_table">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="th-dt"><span>Customer</span><svg class="sort-icon-dt"><use xlink:href="#table-sort-asc"/><use xlink:href="#table-sort-desc"/></svg></th>
                                <th class="th-dt"><span>Branch</span><svg class="sort-icon-dt"><use xlink:href="#table-sort-asc"/><use xlink:href="#table-sort-desc"/></svg></th>
                                <th class="th-dt"><span>Income Type</span><svg class="sort-icon-dt"><use xlink:href="#table-sort-asc"/><use xlink:href="#table-sort-desc"/></svg></th>
                                <th class="th-dt"><span>Amount</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>User/Employee</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt"><span>Date</span><svg class="sort-icon-dt"><path class="hs-datatable-ordering-desc:text-cyan-600" d="m7 15 5 5 5-5"/><path class="hs-datatable-ordering-asc:text-cyan-600" d="m7 9 5-5 5 5"/></svg></th>
                                <th class="th-dt text-end --exclude-from-ordering"><span>Action</span></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php if (isset($detail_income) && !empty($detail_income)): foreach ($detail_income as $di_item): ?>
                            <tr>
                                <td class="td-dt"><?php echo htmlspecialchars($di_item->f_name . ' ' . $di_item->m_name . ' ' . $di_item->l_name); ?></td>
                                <td class="td-dt"><?php echo htmlspecialchars($di_item->blanch_name); ?></td>
                                <td class="td-dt"><?php echo htmlspecialchars($di_item->inc_name); ?></td>
                                <td class="td-dt"><?php echo number_format($di_item->receve_amount); ?></td>
                                <td class="td-dt"><?php echo htmlspecialchars($di_item->empl); ?></td>
                                <td class="td-dt"><?php echo htmlspecialchars(date('d M, Y', strtotime($di_item->receve_day))); ?></td>
                                <td class="td-dt text-end">
                                     <div class="hs-dropdown relative inline-flex [--placement:bottom-right]">
                                        <button id="hs-table-action-di-<?php echo $di_item->receved_id; ?>" type="button" class="btn-action-sm">Action <svg class="hs-dropdown-open:rotate-180 size-2.5" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg></button>
                                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden z-20 min-w-40 bg-white shadow-2xl rounded-lg p-2 mt-2 divide-y divide-gray-200 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-table-action-di-<?php echo $di_item->receved_id; ?>">
                                            <div class="py-2 first:pt-0 last:pb-0">
                                                <span class="dropdown-header-sm">Choose an option</span>
                                                <a class="dropdown-item-sm" href="#" data-hs-overlay="#hs-edit-incomedetail-modal-<?php echo $di_item->receved_id; ?>"><svg class="icon-sm" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4Z"/></svg>Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; endif; ?>
                        </tbody>
                        <tfoot><tr><td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-gray-200 uppercase" colspan="3">TOTAL</td><td class="px-6 py-3 text-sm font-semibold text-gray-800 dark:text-gray-200"><?php echo number_format($total_receved->total_receved ?? 0); ?></td><td colspan="3"></td></tr></tfoot>
                    </table>
                </div></div></div>
                <div class="dt-paging-controls" data-hs-datatable-paging="#income_list_table"></div>
            </div>
        </div>
        <!-- End Card: Income List Table -->

        <!-- Filter Previous Modal -->
        <div id="hs-filter-previous-income-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="modal-content-dt">
                    <div class="modal-header-dt"><h3 class="modal-title-dt">Filter Previous Income</h3><button type="button" class="btn-close-modal-dt" data-hs-overlay="#hs-filter-previous-income-modal"><span class="sr-only">Close</span><svg class="modal-close-icon-dt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                    <div class="p-4 overflow-y-auto">
                        <?php echo form_open("admin/previous_income"); ?>
                            <div class="space-y-4">
                                <div>
                                    <label for="filter_modal_blanch_id_adv" class="label-sm-dt">* Select Branch:</label>
                                    <select id="filter_modal_blanch_id_adv" name="blanch_id" class="w-full" required data-hs-select='{
            "placeholder": "Select Branch",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }'>
                                        <option value="">Select Branch</option>
                                        <?php if(isset($blanch)): foreach ($blanch as $bl_item_modal): ?>
                                        <option value="<?php echo htmlspecialchars($bl_item_modal->blanch_id); ?>" <?php echo set_select('blanch_id', $bl_item_modal->blanch_id); ?>><?php echo htmlspecialchars($bl_item_modal->blanch_name); ?></option>
                                        <?php endforeach; endif; ?>
                                        <option value="all" <?php echo set_select('blanch_id', 'all'); ?>>All Branches</option>
                                    </select>
                                </div>
                                <div class="grid grid-cols-2 gap-4">
                                    <div><label for="filter_modal_from_date_adv" class="label-sm-dt">* From:</label><input type="date" id="filter_modal_from_date_adv" name="from" class="input-text-preline" value="<?php echo set_value('from', date('Y-m-d')); ?>" required></div>
                                    <div><label for="filter_modal_to_date_adv" class="label-sm-dt">* To:</label><input type="date" id="filter_modal_to_date_adv" name="to" class="input-text-preline" value="<?php echo set_value('to', date('Y-m-d')); ?>" required></div>
                                </div>
                                <input type="hidden" name="comp_id" value="<?php echo htmlspecialchars($_SESSION['comp_id'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                            </div>
                            <div class="modal-footer-dt"><button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-filter-previous-income-modal">Close</button><button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Filter Data</button></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Filter Previous Modal -->

        <?php // Edit Income Detail Modals ?>
        <?php if (isset($detail_income) && is_array($detail_income)): foreach ($detail_income as $di_item): ?>
        <div id="hs-edit-incomedetail-modal-<?php echo $di_item->receved_id; ?>" class="hs-overlay hidden size-full fixed top-0 start-0 z-[80] overflow-x-hidden overflow-y-auto">
            <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                <div class="modal-content-dt">
                    <div class="modal-header-dt"><h3 class="modal-title-dt">Edit Income Record</h3><button type="button" class="btn-close-modal-dt" data-hs-overlay="#hs-edit-incomedetail-modal-<?php echo $di_item->receved_id; ?>"><span class="sr-only">Close</span><svg class="modal-close-icon-dt" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg></button></div>
                    <div class="p-4 overflow-y-auto">
                        <?php echo form_open("admin/modify_income_detail/{$di_item->receved_id}"); ?>
                            <div class="space-y-4">
                                <div>
                                    <label class="label-sm-dt">Customer Name:</label>
                                    <input type="text" class="input-text-preline bg-gray-100 dark:bg-gray-700" value="<?php echo htmlspecialchars($di_item->f_name . ' ' . $di_item->m_name . ' ' . $di_item->l_name); ?>" readonly>
                                    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($di_item->customer_id); ?>">
                                </div>
                                <div>
                                    <label class="label-sm-dt">Income Type:</label>
                                    <select name="inc_id" class="w-full" required data-hs-select='{
            "placeholder": "Select ",
            "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-gray-200\" data-title></span></button>",
            "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 px-4 pe-9 flex text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:ring-gray-600",
            "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-50 w-full bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:[&::-webkit-scrollbar-track]:bg-gray-700 dark:[&::-webkit-scrollbar-thumb]:bg-gray-500",
            "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:hover:bg-gray-700 dark:text-gray-200 dark:focus:bg-gray-700",
            "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-gray-200\" data-title></div></div></div>",
            "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-gray-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
          }'>
                                        <?php if(isset($income)): foreach ($income as $inc_opt): ?>
                                        <option value="<?php echo htmlspecialchars($inc_opt->inc_id); ?>" <?php echo ($di_item->inc_id == $inc_opt->inc_id) ? 'selected' : ''; ?>><?php echo htmlspecialchars($inc_opt->inc_name); ?></option>
                                        <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <input type="hidden" name="loan_id" value="<?php echo htmlspecialchars($di_item->loan_id); ?>">
                                <div>
                                    <label class="label-sm-dt">Income Amount:</label>
                                    <input type="number" name="receve_amount" value="<?php echo htmlspecialchars($di_item->receve_amount); ?>" class="input-text-preline" required>
                                </div>
                            </div>
                            <div class="modal-footer-dt"><button type="button" class="btn-secondary-sm" data-hs-overlay="#hs-edit-incomedetail-modal-<?php echo $di_item->receved_id; ?>">Close</button><button type="submit" class="btn-primary-sm bg-cyan-600 hover:bg-cyan-700 text-white">Update</button></div>
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

<?php // SVG definitions for table sort icons (can be in an SVG sprite sheet or directly here) ?>
<svg class="hidden">
  <symbol id="table-sort-asc" viewBox="0 0 24 24"><path d="m7 15 5 5 5-5"/></symbol>
  <symbol id="table-sort-desc" viewBox="0 0 24 24"><path d="m7 9 5-5 5 5"/></symbol>
</svg>


<script>
document.addEventListener('DOMContentLoaded', function () {
    if (typeof jQuery === 'undefined') {
        console.error('jQuery is not loaded. AJAX dependent dropdown will not work.');
        return;
    }

    const formBlanchSelect = document.getElementById('form_blanch_id');
    const formCustomerSelect = document.getElementById('form_customer_id');
    const formLoanSelect = document.getElementById('form_loan_id');

    function reinitializePrelineSelect(selectElement) {
        const wrapper = selectElement.closest('[data-hs-select]');
        if (wrapper && HSSelect) {
            // Check if an instance already exists. If so, destroy it.
            const existingInstance = HSSelect.getInstance(wrapper, true);
            if (existingInstance) {
                existingInstance.destroy();
            }
            // Create a new instance
            new HSSelect(wrapper).init();
        }
    }
    
    function updateSelectOptions(selectElement, data, placeholder, valueField, textField, selectedValue = null) {
        let optionsHtml = '<option value="">' + placeholder + '</option>';
        if (Array.isArray(data) && data.length > 0) {
            data.forEach(function(item) {
                const selected = (item[valueField] == selectedValue) ? ' selected' : '';
                optionsHtml += '<option value="' + item[valueField] + '"' + selected + '>' + item[textField] + '</option>';
            });
        }
        selectElement.innerHTML = optionsHtml;
        reinitializePrelineSelect(selectElement); // Re-initialize Preline select after updating options
    }

    if (formBlanchSelect) {
        formBlanchSelect.addEventListener('change', function () {
            const blanch_id = this.value;
            const currentCustomerId = "<?php echo set_value('customer_id'); ?>";

            updateSelectOptions(formCustomerSelect, [], "Select Customer", 'customer_id', 'full_name');
            updateSelectOptions(formLoanSelect, [], "Select Active Loan", 'loan_id', 'loan_details');

            if (blanch_id !== '') {
                $.ajax({
                    url: "<?php echo base_url('admin/fetch_ward_data'); ?>",
                    method: "POST",
                    data: { blanch_id: blanch_id },
                    dataType: "json",
                    success: function (customers) {
                        // Construct full_name if not present
                        if(Array.isArray(customers)) {
                            customers.forEach(cust => {
                                cust.full_name = `${cust.f_name || ''} ${cust.m_name || ''} ${cust.l_name || ''}`.trim();
                            });
                        }
                        updateSelectOptions(formCustomerSelect, customers, "Select Customer", 'customer_id', 'full_name', currentCustomerId);
                        if (formCustomerSelect.value && formCustomerSelect.value !== "") {
                            $(formCustomerSelect).trigger('change');
                        }
                    },
                    error: function() { updateSelectOptions(formCustomerSelect, [], "Error loading customers", 'customer_id', 'full_name'); }
                });
            }
        });
        if (formBlanchSelect.value !== '') { $(formBlanchSelect).trigger('change'); }
    }

    if (formCustomerSelect) {
        formCustomerSelect.addEventListener('change', function () {
            const customer_id = this.value;
            const currentLoanId = "<?php echo set_value('loan_id'); ?>";

            updateSelectOptions(formLoanSelect, [], "Select Active Loan", 'loan_id', 'loan_details'); 

            if (customer_id !== '') {
                $.ajax({
                    url: "<?php echo base_url('admin/fetch_data_vipimioData'); ?>",
                    method: "POST",
                    data: { customer_id: customer_id },
                    dataType: "json",
                    success: function (loans) {
                         // Assuming loans array items have 'loan_id' and 'loan_details' (or similar)
                        updateSelectOptions(formLoanSelect, loans, "Select Active Loan", 'loan_id', 'loan_display_name', currentLoanId); // Adjust 'loan_display_name'
                    },
                    error: function() { updateSelectOptions(formLoanSelect, [], "Error loading loans", 'loan_id', 'loan_details'); }
                });
            }
        });
    }

    setTimeout(() => {
        const inputs = document.querySelectorAll('input[data-hs-datatable-search]');
        inputs.forEach((input) => {
        input.addEventListener('keydown', function (evt) {
            if ((evt.metaKey || evt.ctrlKey) && (evt.key === 'a' || evt.key === 'A')) {
            this.select();
            }
        });
        });
        HSStaticMethods.autoInit(); // General Preline init for all components
    }, 500);
});

</script>