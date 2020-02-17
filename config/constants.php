<?php

return [
    'defines' => [
        'USER_GROUP_NAME' => 'ADMIN_USERGROUP',
        'MERCHANT_GROUP_NAME' => 'MERCHANT_USERGROUP',
        'CUSTOMER_USER_TYPE' => 0,
        'ADMIN_USER_TYPE' => 1,
        'MERCHANT_USER_TYPE' => 2,
        'ROLE_TITLE' => 'ADMIN_ROLE',
        'MERCHANT_ROLE_TITLE' => 'MERCHANT_ROLE',
        'ADMIN_ROLE_PAGE' => array(3078,3075,3068,3067,3066,3065,3058,3057,3056,3055,3049,3048,3047,3046,3045,3053),
        'MERCHANT_ROLE_PAGE' => array(3078,3075,3068,3067,3066,3065,3058,3057,3056,3055,3049,3048,3047,3046,3045,3053),
        'MERCHANT_INFORMATION_PAGE' => array(5200,5201,5202,5203,5204,5205,5206,5207,5208,5209,5210,5211,5212,5213,5214,5215,5216,5217,5218,5219,5220,5221,5222,5223,4016,4017,4018),
        'SSADMIN_ID' => 1,
        'ACTIVE_INACTIVE_LIST'=>['3' =>'All','0'=>'Pending','1'=>'Approved','2'=>'Not Approved'],
        'MY_APPLICATION_STATUS_LIST'=>['3'=>'All','0'=>'Pending','1'=>'Approved','2' =>'Rejected'],
        'MALE_FEMALE_LIST'=>['3' =>'All','1'=>'Male','2'=>'Female'],
        'LOGIN_OTP_EXPIRE_TIME' => 5,

        'APP_COMPANIES_INDEX' => 'company.index',
        'APP_COMPANIES_CREATE' => 'company.create',
        'APP_COMPANIES_EDIT' => 'company.edit',
        'APP_COMPANIES_SHOW' => 'company.show',
        'APP_COMPANIES_DELETE' => 'company.destroy',

        'APP_USERS_INDEX' => 'users.index',
        'APP_USERS_CREATE' => 'users.create',
        'APP_USERS_EDIT' => 'users.edit',
        'APP_USERS_SHOW' => 'users.show',
        'APP_USERS_DELETE' => 'users.delete',
        'APP_USERS_SEARCH' => 'users.search',
        'APP_USERS_VERIFY_OTP' => 'users.verifyotp',
        'APP_USERS_RESEND_OTP' => 'users.resendOTP',

        'APP_ROLES_INDEX' => 'roles.index',
        'APP_ROLES_CREATE' => 'roles.create',
        'APP_ROLES_EDIT' => 'roles.edit',
        'APP_ROLES_DELETE' => 'roles.delete',

        'APP_USERGROUPS_INDEX' => 'usergroups.index',
        'APP_USERGROUPS_CREATE' => 'usergroups.create',
        'APP_USERGROUPS_EDIT' => 'usergroups.edit',
        'APP_USERGROUPS_DELETE' => 'usergroups.delete',

        'APP_MODULES_INDEX' => 'module.index',
        'APP_MODULES_CREATE' => 'module.create',
        'APP_MODULES_EDIT' => 'module.edit',
        'APP_MODULES_DELETE' => 'module.destroy',

        'APP_SUBMODULES_INDEX' => 'module.index',
        'APP_SUBMODULES_CREATE' => 'module.create',
        'APP_SUBMODULES_EDIT' => 'module.edit',
        'APP_SUBMODULES_DELETE' => 'module.destroy',

        'APP_PAGES_INDEX' => 'page.index',
        'APP_PAGES_CREATE' => 'page.create',
        'APP_PAGES_EDIT' => 'page.edit',
        'APP_PAGES_DELETE' => 'page.destroy',


        'APP_USERGROUP_ROLE_ASSOCIATION' => 'usergrouproles.index',

        'APP_USERGROUP_ROLE_ASSOCIATION' => 'usergroup&roleassociation.index',

        'APP_ROLE_PAGE_ASSOCIATION' => 'role&pageassociation.index',

        'APP_CUSTOMERS_INDEX' => 'customers.index',
        'APP_CUSTOMERS_CREATE' => 'customers.create',
        'APP_CUSTOMERS_EDIT' => 'customers.edit',
        'APP_CUSTOMERS_DELETE' => 'customers.destroy',
        'APP_CUSTOMERS_VIEW' => 'customers.view',
        'APP_CUSTOMERS_BULK_DELETE' => 'customers.bulkDelete',

        'APP_AMLS_INDEX' => 'amlmanagement.index',
//        'APP_AMLS_CONFIRM' => 'amlmanagement.confirm',
//        'APP_AMLS_REJECT' => 'amlmanagement.reject',
        'APP_AMLS_VIEW' => 'amlmanagement.view',
        'APP_AMLS_EDIT' => 'amlmanagement.edit',

        'APP_MERCHANTS_INDEX' => 'merchants.index',
        'APP_MERCHANTS_CREATE' => 'merchants.create',
        'APP_MERCHANTS_EDIT' => 'merchants.edit',
        'APP_MERCHANTS_DELETE' => 'merchants.destroy',
        'APP_MERCHANTS_VIEW' => 'merchants.informations',
        'APP_MERCHANTS_INFORMATION_EDIT' => 'merchants.update_information',
        'APP_MERCHANTS_BULKDELETE' => 'merchants.bulkdelete',

        'APP_MERCHANTS_PAYMENTSETUP' => 'merchants.paymentsetup',
        'APP_MERCHANTS_PAYMENTSETUP_SAVE' => 'merchants.savePaymentSetup',

        'APP_MERCHANTS_TRANSACTION' => 'merchants.transactions',
        'APP_MERCHANTS_WITHDRAWALS' => 'merchants.withdrawals',
        'APP_MERCHANTS_B2C' => 'merchants.b2c',
        'APP_MERCHANTS_B2B' => 'merchants.b2b',
        'APP_MERCHANTS_EXCHANGE' => 'merchants.exchanges',

        'APP_MERCHANTS_TRANSACTION_REFUND' => 'merchants.transaction_refund',
        'APP_MERCHANTS_TRANSACTION_DOWNLOAD' => 'merchants.transaction_download',

        'APP_SUPPORT' => 'adminsupport.index',
        'APP_SUPPORT_UPDATE' => 'adminsupport.update',
        'APP_SUPPORT_CONVERSATION' => 'adminsupport.conversation',
        'APP_SUPPORT_CLOSE' => 'adminsupport.close',
        'APP_SUPPORT_DOWNLOAD' => 'adminsupport.download',
        'APP_SUPPORT_UPDATE' => 'adminsupport.update',
        'APP_SUPPORT_EXPORT' => 'adminsupport.export',


        'APP_CHARGE_BACK'=>'chargeback.index',
        'APP_CHARGE_EXPORT'=>'chargeback.export',
        'APP_CHARGE_DOWNLOAD'=>'chargeback.download',
        'APP_CHARGE_CREATE'=>'chargeback.create',
        'APP_CHARGE_APPROVE'=>'chargeback.approve',

        'APP_MERCHANTS_WITHDRAWAL_APPROVE' => 'merchants.withdrawal_approve',
        'APP_MERCHANTS_WITHDRAWAL_REJECT' => 'merchants.withdrawal_reject',
        'APP_MERCHANTS_WITHDRAWAL_DOWNLOAD' => 'merchants.withdrawal_download',

        'APP_MERCHANTS_B2B_APPROVE' => 'merchants.b2b_approve',
        'APP_MERCHANTS_B2B_REJECT' => 'merchants.b2b_reject',
        'APP_MERCHANTS_B2B_DOWNLOAD' => 'merchants.b2b_download',
        'APP_MERCHANTS_B2B_REFUND' => 'merchants.b2b_refund',


        'APP_MERCHANTS_B2C_APPROVE' => 'merchants.b2c_approve',
        'APP_MERCHANTS_B2C_REJECT' => 'merchants.b2c_reject',
        'APP_MERCHANTS_B2C_DOWNLOAD' => 'merchants.b2c_download',


        'APP_MERCHANTS_USERS' => 'merchants.users',
        'APP_MERCHANTS_ADDUSER' => 'merchants.adduser',
        'APP_MERCHANTS_EDITUSER' => 'merchants.edituser',
        'APP_MERCHANTS_OTPL' => 'merchants.otpl',
        'APP_MERCHANTS_IPASSAIGNMENT' => 'merchants.ipassaignment',
        'APP_MERCHANTS_BILLINGINFO' => 'merchants.billinginfo',
        'APP_MERCHANTS_BANKACCOUNTS' => 'merchants.bankaccounts',
        'APP_MERCHANTS_ADDBANK' => 'merchants.addbank',
        'APP_MERCHANTS_EDITBANK' => 'merchants.editbank',
        'APP_MERCHANTS_DELETEBANK' => 'merchants.deletebank',
        'APP_MERCHANTS_PRODUCTS' => 'merchants.products',
        'APP_MERCHANTS_FRAUD' => 'merchants.fraud',
        'APP_MERCHANTS_SAVEFRAUD' => 'merchants.savefraud',
        'APP_MERCHANTS_DOCS' => 'merchants.docs',
        'APP_MERCHANTS_SAVEDOC' => 'merchants.savedocs',
        'APP_MERCHANTS_API' => 'merchants.api',
        'APP_MERCHANTS_ROLLING' => 'merchants.rolling',
        'APP_MERCHANTS_DEPOSITS' => 'merchants.desposits',
        'APP_MERCHANTS_PAYMENTSETTING' => 'merchants.paymentsetting',
        'APP_MERCHANTS_POS' => 'merchants.pos',

        'APP_WITHDRAWALS_INDEX' => 'userwithdrawals.index',
        'APP_WITHDRAWALS_DELETE' => 'userwithdrawals.destroy',
        'APP_WITHDRAWALS_APPROVE' => 'userwithdrawals.approve',
        'APP_WITHDRAWALS_REJECT' => 'userwithdrawals.reject',
        'APP_WITHDRAWALS_DOWNLOAD' => 'userwithdrawals.download',
        'APP_WITHDRAWALS_EXPORT' => 'userwithdrawals.export',

        'APP_ALL_TRANSACTION_INDEX' => 'alltransaction.index',
        'APP_ALL_TRANSACTION_EXPORT' => 'alltransaction.export',
        'APP_ALL_TRANSACTION_DOWNLOAD' => 'alltransaction.download',
        'APP_ALL_TRANSACTION_REFUND' => 'alltransaction.refund',

        'APP_TRANSACTIONS_INDEX' => 'transactions.index',
        'APP_TRANSACTIONS_CREATE' => 'transactions.create',
        'APP_TRANSACTIONS_EDIT' => 'transactions.edit',
        'APP_TRANSACTIONS_DELETE' => 'transactions.destroy',
        'APP_TRANSACTIONS_VIEW' => 'transactions.view',
        'APP_TRANSACTIONS_BULK_DELETE' => 'transactions.bulkDelete',
        'APP_TRANSACTIONS_REFUND' => 'transactions.refund',

        'APP_DEPOSITS_INDEX' => 'userdeposits.index',
        'APP_DEPOSITS_APPROVE' => 'userdeposits.approve',
        'APP_DEPOSITS_REJECT' => 'userdeposits.reject',
        'APP_DEPOSITS_REFUND' => 'userdeposits.refund',
        'APP_DEPOSITS_EXPORT' => 'userdeposits.export',

        'APP_MERCHANT_DEPOSITS_INDEX' => 'merchantdeposits.index',
        'APP_MERCHANT_DEPOSITS_APPROVE' => 'merchantdeposits.approve',
        'APP_MERCHANT_DEPOSITS_REJECT' => 'merchantdeposits.reject',
        'APP_MERCHANT_DEPOSITS_REFUND' => 'merchantdeposits.refund',
        'APP_MERCHANT_DEPOSITS_EXPORT' => 'merchantdeposits.export',

        'APP_WITHDRAWAL_METHODS_INDEX' => 'withdrawalmethods.index',
        'APP_WITHDRAWAL_METHODS_CREATE' => 'withdrawalmethods.create',
        'APP_WITHDRAWAL_METHODS_EDIT' => 'withdrawalmethods.edit',
        'APP_WITHDRAWAL_METHODS_DELETE' => 'withdrawalmethods.destroy',
        'APP_WITHDRAWAL_METHODS_VIEW' => 'withdrawalmethods.view',
        'APP_WITHDRAWAL_METHODS_LINKTOMETHODCURRENCY' => 'withdrawalmethods.linkToMethodCurrency',
        'APP_WITHDRAWAL_METHODS_LINKTOMETHODCURRENCY_EDIT' => 'withdrawalmethods.linkToMethodCurrency.edit',

        'APP_DEPOSITS_METHODS_INDEX' => 'depositsmethods.index',
        'APP_DEPOSITS_METHODS_CREATE' => 'depositsmethods.create',
        'APP_DEPOSITS_METHODS_EDIT' => 'depositsmethods.edit',
        'APP_DEPOSITS_METHODS_DELETE' => 'depositsmethods.destroy',
        'APP_DEPOSITS_METHODS_VIEW' => 'depositsmethods.view',
        'APP_DEPOSITS_METHODS_LINKTOMETHODCURRENCY' => 'depositsmethods.linkToMethodCurrency',
        'APP_DEPOSITS_METHODS_LINKTOMETHODCURRENCY_EDIT' =>'depositsmethods.linkToMethodCurrency.edit',
        'APP_DEPOSITS_METHODS_LINKTOMETHODCURRENCY_DELETE'=>'depositsmethods.linkToMethodCurrency.destroy',

        'APP_TRANSACTION_STATES_INDEX' => 'transactionstates.index',
        'APP_TRANSACTION_STATES_CREATE' => 'transactionstates.create',
        'APP_TRANSACTION_STATES_EDIT' => 'transactionstates.edit',
        'APP_TRANSACTION_STATES_DELETE' => 'transactionstates.destroy',
        'APP_TRANSACTION_STATES_VIEW' => 'transactionstates.view',

        'APP_CURRENCIES_INDEX' => 'currencies.index',
        'APP_CURRENCIES_CREATE' => 'currencies.create',
        'APP_CURRENCIES_EDIT' => 'currencies.edit',
        'APP_CURRENCIES_DELETE' => 'currencies.destroy',
        'APP_CURRENCIES_VIEW' => 'currencies.view',
        'APP_CURRENCIES_BULK_DELETE' => 'currencies.bulkdelete',

        'APP_CURRENCY_EXCHANGE_RATES_INDEX' => 'currencyexchangerates.index',
        'APP_CURRENCY_EXCHANGE_RATES_CREATE' => 'currencyexchangerates.create',
        'APP_CURRENCY_EXCHANGE_RATES_EDIT' => 'currencyexchangerates.edit',
        'APP_CURRENCY_EXCHANGE_RATES_DELETE' => 'currencyexchangerates.destroy',
        'APP_CURRENCY_EXCHANGE_RATES_VIEW' => 'currencyexchangerates.view',
        'APP_CURRENCY_EXCHANGE_RATES_BULK_DELETE' => 'currencyexchangerates.bulkdelete',

        'APP_WALLETS_INDEX' => 'wallets.index',
        'APP_WALLETS_CREATE' => 'wallets.create',
        'APP_WALLETS_EDIT' => 'wallets.edit',
        'APP_WALLETS_DELETE' => 'wallets.destroy',
        'APP_WALLETS_VIEW' => 'wallets.view',
        'APP_WALLETS_BULK_DELETE' => 'wallets.bulkDelete',

        'APP_TICKET_CATEGORIES_INDEX' => 'ticketcategories.index',
        'APP_TICKET_CATEGORIES_CREATE' => 'ticketcategories.create',
        'APP_TICKET_CATEGORIES_EDIT' => 'ticketcategories.edit',
        'APP_TICKET_CATEGORIES_DELETE' => 'ticketcategories.destroy',
        'APP_TICKET_CATEGORIES_VIEW' => 'ticketcategories.view',

        'APP_CONTENTS_INDEX' => 'contents.index',
        'APP_CONTENTS_CREATE' => 'contents.create',
        'APP_CONTENTS_EDIT' => 'contents.edit',
        'APP_CONTENTS_DELETE' => 'contents.destroy',
        'APP_CONTENTS_VIEW' => 'contents.view',
        'APP_CONTENTS_BULK_DELETE' => 'contents.bulkdelete',

        'APP_TICKETS_EDIT' => 'tickets.edit',
        'APP_TICKETS_CREATE' => 'tickets.create',
        'APP_TICKETS_INDEX' => 'tickets.index',
        'APP_TICKETS_DELETE' => 'tickets.destroy',
        'APP_TICKETS_VIEW' => 'tickets.view',

        'APP_BANK_ACCOUNT_EDIT' => 'bankaccounts.edit',
        'APP_BANK_ACCOUNT_CREATE' => 'bankaccounts.create',
        'APP_BANK_ACCOUNT_INDEX' => 'bankaccounts.index',
        'APP_BANK_ACCOUNT_DELETE' => 'bankaccounts.destroy',
        'APP_BANK_ACCOUNT_VIEW' => 'bankaccounts.view',

        'MERCHANT_BANK_ACCOUNT_EDIT' => 'merchantbankaccounts.edit',
        'MERCHANT_BANK_ACCOUNT_CREATE' => 'merchantbankaccounts.create',
        'MERCHANT_BANK_ACCOUNT_INDEX' => 'merchantbankaccounts.index',
        'MERCHANT_BANK_ACCOUNT_DELETE' => 'merchantbankaccounts.destroy',
        'MERCHANT_BANK_ACCOUNT_VIEW' => 'merchantbankaccounts.view',

        'APP_REFUNDS_INDEX' => 'refunds.index',
        'APP_REFUNDS_VIEW' => 'refunds.view',
        'APP_REFUNDS_DELETE' => 'refunds.destroy',

        'APP_MY_APPLICATION' => 'merchantapplications.index',
        'APP_MY_APPLICATION_APPROVE' => 'merchantapplications.approve',
        'APP_MY_APPLICATION_REJECT' => 'merchantapplications.reject',
        'APP_MY_APPLICATION_EDIT' => 'merchantapplications.edit',
        'APP_MY_APPLICATION_VIEW' => 'merchantapplications.view',


        //MerchantApplicationController related route name
        //see Admin\App\Controllers\MerchantApplicationController
        'APP_MERCHANT_APPLICATION' => 'application.index',
        'APP_MERCHANT_APPLICATION_APPROVE' => 'application.approve',
        'APP_MERCHANT_APPLICATION_REJECT' => 'application.reject',
        'APP_MERCHANT_APPLICATION_CREATE' => 'application.create',

        'APP_SITE_SETTINGS_EDIT' => 'sitesettings.edit',

        'APP_WITHDRAWAL_BANK_NAME_INDEX' => 'withdrawalbanks.index',
        'APP_WITHDRAWAL_BANK_NAME_CREATE' => 'withdrawalbanks.create',
        'APP_WITHDRAWAL_BANK_NAME_EDIT' => 'withdrawalbanks.edit',
        'APP_WITHDRAWAL_BANK_NAME_DELETE' => 'withdrawalbanks.destroy',


        'APP_B2B_PAYMENT_INDEX' => 'b2b.index',
        'APP_B2B_PAYMENT_APPROVE' => 'b2b.approve',
        'APP_B2B_PAYMENT_REJECT' => 'b2b.reject',
        'APP_B2B_PAYMENT_DOWNLOAD' => 'b2b.download',
        'APP_B2B_PAYMENT_REFUND' => 'b2b.refund',
        'APP_B2B_PAYMENT_EXPORT' => 'b2b.export',

        'APP_CASHOUTS_INDEX' => 'b2c.index',
        'APP_CASHOUTS_VIEW' => 'b2c.view',
        'APP_CASHOUTS_EDIT' => 'b2c.edit',
        'APP_CASHOUTS_APPROVE' => 'b2c.approve',
        'APP_CASHOUTS_REJECT' => 'b2c.reject',
        'APP_CASHOUTS_DOWNLOAD' => 'b2c.download',
        'APP_CASHOUTS_EXPORTS' => 'b2c.exports',
        'APP_CASHOUT_STATUS'=>['1'=>'Pending','2'=>'Rejected','3'=>'Completed'],

        'APP_AWAITING_REFUND_INDEX' => 'awaitingrefund.index',
        'APP_AWAITING_REFUND_VIEW' => 'awaitingrefund.view',
        'APP_AWAITING_REFUND_EDIT' => 'awaitingrefund.edit',

        'APP_INDENTIFICATION_INDEX' => 'identification.index',


        'APP_MERCHANT_WITHDRAWAL_INDEX' => 'merchantwithdrawals.index',
        'APP_MERCHANT_WITHDRAWAL_APPROVE' => 'merchantwithdrawals.approve',
        'APP_MERCHANT_WITHDRAWAL_REJECT' => 'merchantwithdrawals.reject',
        'APP_MERCHANT_WITHDRAWAL_DOWNLOAD' => 'merchantwithdrawals.download',
        'APP_MERCHANT_WITHDRAWAL_EXPORT' => 'merchantwithdrawals.export',

        'MAIL_FROM_ADDRESS' => env("SYSTEM_NO_REPLY_ADDRESS"),
        'NON_USER_SEND_MONEY_TIME_DIFFERENCE'=> 72*60, //72 hours in mins
        'B2B_TIME_DIFFERENCE'=> 72*60, //72 hours in mins

        'APP_MONEY_TRANSFER_INDEX' => 'moneytransfer.index',
        'APP_MONEY_TRANSFER_REFUND' => 'moneytransfer.refund',
        'APP_MONEY_TRANSFER_DOWNLOAD' => 'moneytransfer.download',

        'APP_AWAITING_APPROVALS_INDEX' => 'awaitingapprovals.index',
        'APP_AWAITING_APPROVALS_APPROVE_TRANSACTION' => 'awaitingapprovals.approveTransaction',
        'APP_AWAITING_APPROVALS_REJECT_TRANSACTION' => 'awaitingapprovals.rejectTransaction',
        'APP_AWAITING_APPROVALS_APPROVE_GSM' => 'awaitingapprovals.approveGSM',
        'APP_AWAITING_APPROVALS_REJECT_GSM' => 'awaitingapprovals.rejectGSM',
        'APP_AWAITING_APPROVALS_APPROVE_EXPORT' => 'awaitingapprovals.approveExport',
        'APP_AWAITING_APPROVALS_REJECT_EXPORT' => 'awaitingapprovals.rejectExport',
        'APP_AWAITING_APPROVALS_APPROVE_BAN_USER' => 'awaitingapprovals.approveBanUser',
        'APP_AWAITING_APPROVALS_REJECT_BAN_USER' => 'awaitingapprovals.rejectBanUser',

        'APP_IDENTIFICATION_GENERAL_INDEX' => 'general.index',

        'APP_IDENTIFICATION_GENERAL_REASONS_ADD' => 'general.reasons.add',
        'APP_IDENTIFICATION_GENERAL_REASONS_EDIT' => 'general.reasons.edit',

        'APP_IDENTIFICATION_GENERAL_BANKS_ADD' => 'general.banks.add',
        'APP_IDENTIFICATION_GENERAL_BANKS_EDIT' => 'general.banks.edit',

        'APP_IDENTIFICATION_GENERAL_SETTLEMENTS_ADD' => 'general.settlements.add',
        'APP_IDENTIFICATION_GENERAL_SETTLEMENTS_EDIT' => 'general.settlements.edit',

        'APP_IDENTIFICATION_GENERAL_SECTOR_ADD' => 'general.sector.add',
        'APP_IDENTIFICATION_GENERAL_SECTOR_EDIT' => 'general.sector.edit',

        'APP_IDENTIFICATION_ADD_BANK_COT' => 'general.addBankCot',
        'APP_IDENTIFICATION_EDIT_BANK_COT' => 'general.editBankCot',
        'APP_IDENTIFICATION_DELETE_BANK_COT' => 'general.deleteBankCot',

        'APP_IDENTIFICATION_COMMISSIONS_INDEX' => 'commissions.index',
        'APP_IDENTIFICATION_COMMISSIONS_EDIT' => 'commissions.edit',
        'APP_IDENTIFICATION_COMMISSIONS_ADD' => 'commissions.add',
        'APP_IDENTIFICATION_COMMISSIONS_DELETE' => 'commissions.delete',

        'APP_IDENTIFICATION_POSMANAGEMENT_INDEX' => 'posmanagement.index',
        'APP_IDENTIFICATION_POSMANAGEMENT_POS_ADD' => 'posmanagement.add_pos',
        'APP_IDENTIFICATION_POSMANAGEMENT_POS_EDIT' => 'posmanagement.edit_pos',
        'APP_IDENTIFICATION_POSMANAGEMENT_POS_DELETE' => 'posmanagement.delete_pos',
        'APP_IDENTIFICATION_POSMANAGEMENT_ALLOCATION_ADD' => 'posmanagement.allocation.add',
        'APP_IDENTIFICATION_POSMANAGEMENT_ALLOCATION_EDIT' => 'posmanagement.allocation.edit',
        'APP_IDENTIFICATION_POSMANAGEMENT_ALLOCATION_DELETE' => 'posmanagement.allocation.delete',

        'APP_IDENTIFICATION_POSMANAGEMENT_CAMPAIGN_ADD' => 'posmanagement.campaign.add',
        'APP_IDENTIFICATION_POSMANAGEMENT_CAMPAIGN_EDIT' => 'posmanagement.campaign.edit',
        'APP_IDENTIFICATION_POSMANAGEMENT_CAMPAIGN_DELETE' => 'posmanagement.campaign.delete',

        'APP_REPORTS_INDEX' => 'reports.index',
        'APP_REPORTS_EXPORT' => 'reports.export',

        'APP_USER_ANALYTICS_INDEX' => 'userreports&analytics.index',
        'APP_MERCHANT_ANALYTICS_INDEX' => 'merchantanalytics.index',
        'APP_MERCHANT_ANALYTICS_DOWNLOAD' => 'merchantanalytics.download',

        //OPERATORS
        'APP_OPERATORS_INDEX' => 'users.index',
        'APP_OPERATORS_EDIT' => 'users.edit',
        'APP_OPERATORS_CHANGE_GSM' => 'users.changegsm',
        'APP_OPERATORS_CHANGE_EMAIL' => 'users.changeemail',
        'APP_OPERATORS_TRANSACTION_LIST' => 'users.transactionlist',
        'APP_OPERATORS_WITHDRAWAL_LIST' => 'users.withdrawallist',
        'APP_OPERATORS_DEPOSIT_LIST' => 'users.depositlist',
        'APP_OPERATORS_EXCHANGE_LIST' => 'users.exchangehistory',
        'APP_OPERATORS_HISTORY' => 'users.history',

        //test Global admin id and Finance dept user id
        'GA_USERGROUP_ID' => 7,
        'FDU_USERGROUP_ID' => 33
    ],
    'TRANSACTION_TYPE' => [
        'WITHDRAWAL'=> 'App\Models\Withdrawal',
        'SEND'=> 'App\Models\Send',
        'SALE'=> 'App\Models\Sale',
        'RECEIVE'=> 'App\Models\Receive',
        'PURCHASE'=> 'App\Models\Purchase',
        'DEPOSIT'=> 'App\Models\Deposit',
        'CASHOUT'=> 'App\Models\Cashout',
        'EXCHANGE'=> 'App\Models\Exchange',
        'OTHERS'    =>'APP\Models\Others'
    ],
    'ACTIVITY_TITLES' => [
        'CREDIT_CARD' => 'Credit Card',
        'SIPAY_WALLET' => 'Sipay Wallet',
        'MOBILE_PAYMENT' => 'Mobile Payment',
    ],
    'STATUS_ID' => [
        'COMPLETED' => 1,
        'REJECTED' => 2,
        'PENDING' => 3,
        'STAND_BY' => 4,
        'REFUNDED' => 5,
        'AWAITING' => 6,
        'AWAITING_REFUND' => 7
    ],
    'STATUS_CODE' => [
        'INSUFFICIENT__BALANCE' => 100,
        'REFUND_SUCCESS' => 200,
        'REFUND_FAILED'  => 400,
        'REFUND_REJECT'  => 500,
    ],
    'REASON_CODE' => [
        'DEPOSIT_REFUND' => 'DEPOSIT_REFUND',
        'DEPOSIT_REJECT' => 'DEPOSIT_REJECT',
        'MONEYTRANSFER_REFUND' => 'MONEYTRANSFER_REFUND',
        'WITHDRAWAL_REJECT' => 'WITHDRAWAL_REJECT',
        'B2BPAYMENT_REFUND' => 'B2BPAYMENT_REFUND',
        'SALE_REFUND' => 'SALE_REFUND',
        'APPLICATION_REJECT' => 'APPLICATION_REJECT',
        'CHARGE_BACK' => 'CHARGE_BACK',
        'CASHOUT_REJECT' => 'CASHOUT_REJECT',
        'B2BPAYMENT_REJECT' => 'B2BPAYMENT_REJECT',
    ],

    'SETTLEMENT_CODE' => ["Daily","Weekly","Bi-Weekly","Monthly","Bi-Monthly","Custom"],

    'BANK_NAME' => [
        'FINANS'=>'FİNANS BANK A.Ş.',
        'ISBANK'=>'T. İŞ BANKASI A.Ş.',
    ],
    'USER_STATUS' => [
        'ENABLE' => '1',
        'DISABLED' => '2',
        'AWAITING_DISABLE' => '3',
        'AWAITING_GSM' => '4'
    ],
    "SUCCESS_CODE"=>100,
    "FRAUD_FILTER" => [
        "GENERAL"=>1,
        "HIGHT_RISK"=>2,
        "LOW_RISK"=>3
    ],
    "POS_PROGRAMS" => [
        1 => "Programe 1",
        3 => "Programe 2",
        2 => "Programe 3",
        4 => "Bonus",
        5 => "Advantage",
        6 => "Cardfinans",
        7 => "maximum",
    ],
    'POS_ID_LIST' => [
        'finansbank'=>'1234',
        'isbank'=>'5678',
        'WIRECARD'=>'5555',
    ]
];

?>
