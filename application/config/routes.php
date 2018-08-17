<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'Login_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//routes de paginas empieza en controller

//routes externo
$route['login'] = "Login_Controller";
$route['logout'] = "Login_Controller/logout_user";
$route['register'] = "Register_Controller";

//routes admin
$route['admin_dashboard'] = "Admin_Dashboard_Controller";
$route['admin_project'] = "Admin_List_Project_Controller";
$route['admin_list_investor'] = "Admin_List_Investor_Controller";
$route['admin_list_company'] = "Admin_List_Company_Controller";
$route['listalldocument'] = "Admin_List_DocumentType_Controller/listDataGrid";
$route['admin_accountdata'] = "Admin_Accountdata_Controller";
$route['admin_changepassword'] = "Admin_Changepassword_Controller";
$route['admin_paypalaccount'] = "Admin_PaypalAccount_Controller";
$route['admin_transactionhistory'] = "Admin_TransactionHistory_Controller";
$route['admin_project_payout'] = 'Admin_Project_PPayout_Controller';

//routes investor
$route['investor_dashboard'] = "Investor_Dashboard_Controller";
$route['investor_project'] = "Investor_List_Project_Controller";
$route['investor_investment'] = "Investor_Investment_Controller";
$route['investor_data'] = "Investor_Data_Controller";
$route['investor_changepassword'] = "Investor_Changepassword_Controller";
$route['investor_paypalaccount'] = "Investor_PaypalAccount_Controller";
$route['investor_withdrawfunds'] = "Investor_WithdrawFunds_Controller";
$route['investor_transactionhistory'] = "Investor_TransactionHistory_Controller";
$route['investor_basicdata'] = "Investor_BasicData_Controller";

$route['investor_depositfunds'] = "Investor_DepositFunds_Controller";
$route['investor_processdepositfunds/(:any)/(:any)'] = "Investor_ProcessDepositFunds_Controller/index/$1/$2";
$route['paypal/ipn_investor_depositpaymenthistory/(:any)/(:any)'] = "paypal/IPN_Investor_DepositPaymentHistory_Controller/index/$1/$2";
$route['paypal/ipn_investor_depositpaymenthistory_success/(:any)/(:any)'] = "paypal/IPN_Investor_DepositPaymentHistory_Controller/success/$1/$2";
$route['paypal/ipn_investor_depositpaymenthistory_cancel/(:any)/(:any)'] = "paypal/IPN_Investor_DepositPaymentHistory_Controller/cancel/$1/$2";

//routes company
$route['company_dashboard'] = "Company_Dashboard_Controller";
$route['company_project'] = "Company_List_Project_Controller";
$route['company_edit_project'] = "Company_Edit_Project_Controller";
$route['company_edit_project/(:any)'] = "Company_Edit_Project_Controller/index/$1";
$route['company_paypalaccount'] = "Company_PaypalAccount_Controller";
$route['company_transactionhistory'] = "Company_TransactionHistory_Controller";
$route['company_basicdata'] = "Company_BasicData_Controller";
$route['company_accountdata'] = "Company_Accountdata_Controller";
$route['company_changepassword'] = "Company_Changepassword_Controller";

//admin project payout
$route['admin_list_project_ppayout'] = "Admin_List_Project_PPayout_Controller";
$route['admin_project_ppayout/(:any)'] = "Admin_Project_PPayout_Controller/index/$1";
$route['paypal/ipn_projectpaymentorder/(:any)'] = "paypal/IPN_ProjectPaymentOrder_Controller/index/$1";
$route['paypal/ipn_projectpaymentorder_success/(:any)'] = "paypal/IPN_ProjectPaymentOrder_Controller/success/$1";
$route['paypal/ipn_projectpaymentorder_cancel/(:any)'] = "paypal/IPN_ProjectPaymentOrder_Controller/cancel/$1";

//admin investor payout
$route['admin_list_investor_ipayout'] = "Admin_List_Investor_IPayout_Controller";
$route['admin_investor_ipayout/(:any)'] = "Admin_Investor_IPayout_Controller/index/$1";
$route['paypal/ipn_investorpaymentorder/(:any)'] = "paypal/IPN_InvestorPaymentOrder_Controller/index/$1";
$route['paypal/ipn_investorpaymentorder_success/(:any)'] = "paypal/IPN_InvestorPaymentOrder_Controller/success/$1";
$route['paypal/ipn_investorpaymentorder_cancel/(:any)'] = "paypal/IPN_InvestorPaymentOrder_Controller/cancel/$1";

//project investment payout
$route['project_list_investment_ipayout'] = "Project_List_Investment_IPayout_Controller";
$route['project_investment_ipayout/(:any)'] = "Project_Investment_IPayout_Controller/index/$1";
$route['paypal/ipn_projectinvestmentpaymentorder/(:any)'] = "paypal/IPN_ProjectInvestmentPaymentOrder_Controller/index/$1";
$route['paypal/ipn_projectinvestmentpaymentorder_success/(:any)'] = "paypal/IPN_ProjectInvestmentPaymentOrder_Controller/success/$1";
$route['paypal/ipn_projectinvestmentpaymentorder_cancel/(:any)'] = "paypal/IPN_ProjectInvestmentPaymentOrder_Controller/cancel/$1";


//Ejemplo Route test a sub funciones
/*$route['default'] = "admin/Administrator";
$route['noparametro'] = "admin/Administrator/noparametro";
$route['parametro/(:num)'] = "admin/Administrator/parametro/$1";
*/