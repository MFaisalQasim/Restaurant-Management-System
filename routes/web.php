<?php
Route::get('/', 'PagesController@HomePage');


Route::group(['middleware' => ['auth', 'roles'],'roles' => ['admin','user','developer']], function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard.index');
    // });
    Route::get('dashboard', 'PagesController@Dashboard');
    Route::get('dashboard/{id}', 'PagesController@Dashboard');

    Route::get('account-settings', 'UsersController@getSettings');
    Route::post('account-settings', 'UsersController@saveSettings');
    
});
Route::group(['middleware' => 'guest'],function (){

    Route::get('addmoney/stripe', array('as' => 'addmoney.paystripe','uses' => 'MoneySetupController@PaymentStripe'));
    Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'MoneySetupController@postPaymentStripe'));
    // Route::post('gamepayment','OrderController\\OrdersController@GamePayment');
    Route::post('paypal','OrderController\\OrdersController@PayWithPayPal');
    Route::get('status','OrderController\\OrdersController@getPaymentStatus');
    Route::get('practiceJsonP','OrderController\\OrdersController@practiceJsonP');

});




Route::group(['middleware' => ['auth', 'roles'],'roles' => 'admin','roles'=>'developer'], function () {
    Route::get('index2', function () {
        return view('dashboard.index2');
    });
    Route::get('index3', function () {
        return view('dashboard.index3');
    });
    Route::get('index4', function () {
        return view('ecommerce.index4');
    });
    Route::get('products', function () {
        return view('ecommerce.products');
    });
    Route::get('product-detail', function () {
        return view('ecommerce.product-detail');
    });
    Route::get('product-edit', function () {
        return view('ecommerce.product-edit');
    });
    Route::get('product-orders', function () {
        return view('ecommerce.product-orders');
    });
    Route::get('product-cart', function () {
        return view('ecommerce.product-cart');
    });
    Route::get('product-checkout', function () {
        return view('ecommerce.product-checkout');
    });
    Route::get('panels-wells', function () {
        return view('ui-elements.panels-wells');
    });
    Route::get('panel-ui-block', function () {
        return view('ui-elements.panel-ui-block');
    });
    Route::get('portlet-draggable', function () {
        return view('ui-elements.portlet-draggable');
    });
    Route::get('buttons', function () {
        return view('ui-elements.buttons');
    });
    Route::get('tabs', function () {
        return view('ui-elements.tabs');
    });
    Route::get('modals', function () {
        return view('ui-elements.modals');
    });
    Route::get('progressbars', function () {
        return view('ui-elements.progressbars');
    });
    Route::get('notification', function () {
        return view('ui-elements.notification');
    });
    Route::get('carousel', function () {
        return view('ui-elements.carousel');
    });
    Route::get('user-cards', function () {
        return view('ui-elements.user-cards');
    });
    Route::get('timeline', function () {
        return view('ui-elements.timeline');
    });
    Route::get('timeline-horizontal', function () {
        return view('ui-elements.timeline-horizontal');
    });
    Route::get('range-slider', function () {
        return view('ui-elements.range-slider');
    });
    Route::get('ribbons', function () {
        return view('ui-elements.ribbons');
    });
    Route::get('steps', function () {
        return view('ui-elements.steps');
    });
    Route::get('session-idle-timeout', function () {
        return view('ui-elements.session-idle-timeout');
    });
    Route::get('session-timeout', function () {
        return view('ui-elements.session-timeout');
    });
    Route::get('bootstrap-ui', function () {
        return view('ui-elements.bootstrap');
    });
    Route::get('starter-page', function () {
        return view('pages.starter-page');
    });
    Route::get('blank', function () {
        return view('pages.blank');
    });
    Route::get('blank', function () {
        return view('pages.blank');
    });
    Route::get('search-result', function () {
        return view('pages.search-result');
    });
    Route::get('custom-scroll', function () {
        return view('pages.custom-scroll');
    });
    Route::get('lock-screen', function () {
        return view('pages.lock-screen');
    });
    Route::get('recoverpw', function () {
        return view('pages.recoverpw');
    });
    Route::get('animation', function () {
        return view('pages.animation');
    });
    Route::get('profile', function () {
        return view('pages.profile');
    });
    Route::get('invoice', function () {
        return view('pages.invoice');
    });
    Route::get('gallery', function () {
        return view('pages.gallery');
    });
    Route::get('pricing', function () {
        return view('pages.pricing');
    });
    Route::get('400', function () {
        return view('pages.400');
    });
    Route::get('403', function () {
        return view('pages.403');
    });
    Route::get('404', function () {
        return view('pages.404');
    });
    Route::get('500', function () {
        return view('pages.500');
    });
    Route::get('503', function () {
        return view('pages.503');
    });
    Route::get('form-basic', function () {
        return view('forms.form-basic');
    });
    Route::get('form-layout', function () {
        return view('forms.form-layout');
    });
    Route::get('icheck-control', function () {
        return view('forms.icheck-control');
    });
    Route::get('form-advanced', function () {
        return view('forms.form-advanced');
    });
    Route::get('form-upload', function () {
        return view('forms.form-upload');
    });
    Route::get('form-dropzone', function () {
        return view('forms.form-dropzone');
    });
    Route::get('form-pickers', function () {
        return view('forms.form-pickers');
    });
    Route::get('basic-table', function () {
        return view('tables.basic-table');
    });
    Route::get('table-layouts', function () {
        return view('tables.table-layouts');
    });
    Route::get('data-table', function () {
        return view('tables.data-table');
    });
    Route::get('bootstrap-tables', function () {
        return view('tables.bootstrap-tables');
    });
    Route::get('responsive-tables', function () {
        return view('tables.responsive-tables');
    });
    Route::get('editable-tables', function () {
        return view('tables.editable-tables');
    });
    Route::get('inbox', function () {
        return view('inbox.inbox');
    });
    Route::get('inbox-detail', function () {
        return view('inbox.inbox-detail');
    });
    Route::get('compose', function () {
        return view('inbox.compose');
    });
    Route::get('contact', function () {
        return view('inbox.contact');
    });
    Route::get('contact-detail', function () {
        return view('inbox.contact-detail');
    });
    Route::get('calendar', function () {
        return view('extra.calendar');
    });
    Route::get('widgets', function () {
        return view('extra.widgets');
    });
    Route::get('morris-chart', function () {
        return view('charts.morris-chart');
    });
    Route::get('peity-chart', function () {
        return view('charts.peity-chart');
    });
    Route::get('knob-chart', function () {
        return view('charts.knob-chart');
    });
    Route::get('sparkline-chart', function () {
        return view('charts.sparkline-chart');
    });
    Route::get('simple-line', function () {
        return view('icons.simple-line');
    });
    Route::get('fontawesome', function () {
        return view('icons.fontawesome');
    });
    Route::get('map-google', function () {
        return view('maps.map-google');
    });
    Route::get('map-vector', function () {
        return view('maps.map-vector');
    });

    #Permission management
    Route::get('permission-management', 'PermissionController@getIndex');
    Route::get('permission/create', 'PermissionController@create');
    Route::post('permission/create', 'PermissionController@save');
    Route::get('permission/delete/{id}', 'PermissionController@delete');
    Route::get('permission/edit/{id}', 'PermissionController@edit');
    Route::post('permission/edit/{id}', 'PermissionController@update');
    
    #Role management
    Route::get('role-management', 'RoleController@getIndex');
    Route::get('role/create', 'RoleController@create');
    Route::post('role/create', 'RoleController@save');
    Route::get('role/delete/{id}', 'RoleController@delete');
    Route::get('role/edit/{id}', 'RoleController@edit');
    Route::post('role/edit/{id}', 'RoleController@update');

    #CRUD Generator
    Route::get('/crud-generator', ['uses' => 'ProcessController@getGenerator']);
    Route::post('/crud-generator', ['uses' => 'ProcessController@postGenerator']);

    # Activity log
    Route::get('activity-log', 'LogViewerController@getActivityLog');
    Route::get('activity-log/data', 'LogViewerController@activityLogData')->name('activity-log.data');

    #User Management routes
    // Route::get('users', 'UsersController@getIndex');
    // Route::get('user/create', 'UsersController@create');
    // Route::post('user/create', 'UsersController@save');
    // Route::get('user/edit/{id}', 'UsersController@edit');
    // Route::post('user/edit/{id}', 'UsersController@update');
    // Route::get('user/delete/{id}', 'UsersController@delete');
    // Route::get('user/deleted/', 'UsersController@getDeletedUsers');
    // Route::get('user/restore/{id}', 'UsersController@restoreUser');

});


//Log Viewer
Route::get('log-viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
Route::get('log-viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log-viewers.logs');
Route::delete('log-viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log-viewers.logs.delete');
Route::get('log-viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log-viewers.logs.show');
Route::get('log-viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log-viewers.logs.download');
Route::get('log-viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log-viewers.logs.filter');
Route::get('log-viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log-viewers.logs.search');
Route::get('log-viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');

#blog routes frontend
// Route::get('/', 'BlogController@getBlogList');
Route::get('blogs/{slug}', 'BlogController@getBlog');
Route::get('blogs/category/{slug}', 'BlogController@getCategoryBlog');
Route::get('blogs/tag/{slug}', 'BlogController@getTagBlog');
Route::get('blogs/author/{slug}', 'BlogController@getAuthorBlog');

Route::get('auth/{provider}/', 'Auth\SocialLoginController@redirectToProvider');
Route::get('{provider}/callback', 'Auth\SocialLoginController@handleProviderCallback');
Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();
Route::resource('payment-detail', 'PaymentDetailController\\PaymentDetailController');
Route::resource('payment-detail', 'PaymentDetailController\\PaymentDetailController');



Route::group(['middleware' => 'auth'], function () {

    /*routes for blog*/
    Route::group(['prefix' => 'blog'], function () {
        Route::get('/create', 'BlogController@create');
        Route::post('/create', 'BlogController@store');
        Route::get('delete/{id}', 'BlogController@destroy')->name('blog.delete');
        Route::get('edit/{id}', 'BlogController@edit')->name('blog.edit');
        Route::post('edit/{id}', 'BlogController@update');
        Route::get('view/{id}', 'BlogController@show');
//        Route::get('{blog}/restore', 'BlogController@restore')->name('blog.restore');
        Route::post('{id}/storecomment', 'BlogController@storeComment')->name('storeComment');
       
    });
    Route::resource('blog', 'BlogController');

    /*routes for blog category*/
    Route::group(['prefix' => 'blog-category'], function () {
        Route::get('/', 'BlogCategoryController@getIndex');
        Route::get('/create', 'BlogCategoryController@create');
        Route::post('/create', 'BlogCategoryController@save');
        Route::get('/delete/{id}', 'BlogCategoryController@delete');
        Route::get('/edit/{id}', 'BlogCategoryController@edit');
        Route::post('/edit/{id}', 'BlogCategoryController@update');
    });
    Route::resource('blogcategory', 'BlogCategoryController');

#User Management routes
Route::get('users/{id}', 'UsersController@getIndex');
Route::get('user/create/{id}', 'UsersController@create');
Route::post('user/create/', 'UsersController@save');
// Route::get('user/edit/{id}', 'UsersController@edit');
Route::get('user/edit/{id}', 'UsersController@edit');
Route::post('user/edit/{id}', 'UsersController@update');
Route::get('user/delete/{id}', 'UsersController@delete');
Route::get('user/deleted/', 'UsersController@getDeletedUsers');
Route::get('user/restore/{id}', 'UsersController@restoreUser');

// Route::resource('restaurant', 'RestaurantController\\RestaurantController');
// Route::resource('safe', 'SafeController\\SafeController');
// Route::resource('total-cash', 'TotalCashController\\TotalCashController');
// Route::resource('expenses', 'ExpensesController\\ExpensesController');
// Route::resource('employee-salary', 'EmployeeSalaryController\\EmployeeSalaryController');
// Route::resource('suppliers', 'SuppliersController\\SuppliersController');
// Route::resource('report', 'ReportController\\ReportController');

// Route::get('/dashboard/{id}', 'PagesController@Dashboard');
Route::get('restaurant', 'PagesController@restaurant');
Route::get('restaurant/fetch/{id}', 'PagesController@generate_restaurant_fetch');
// Route::get('restaurant/{id}', 'PagesController@restaurant');
Route::get('restaurant/create', 'RestaurantController\\RestaurantController@create');
Route::post('restaurant', 'RestaurantController\\RestaurantController@store');
Route::get('restaurant/edit/{id}', 'RestaurantController\\RestaurantController@edit_res');
Route::patch('restaurant/update/{id}', 'RestaurantController\\RestaurantController@update_res');
Route::delete('restaurant/{id}', 'RestaurantController\\RestaurantController@destroy');

Route::get('restaurant_setting/{id}', 'PagesController@restaurant_setting');
Route::patch('restaurant_setting/{id}', 'RestaurantController\\RestaurantController@update');
// Route::get('restaurant/setting/create', 'RestaurantController\\RestaurantController@create');
// Route::post('restaurant/setting/create', 'RestaurantController\\RestaurantController@store');

Route::get('safe', 'SafeController\\SafeController@index');
// Route::get('safe', 'SafeController\\SafeController@show');
// Route::get('safe', 'PagesController@safe');

// Route::get('safe/{id}', 'PagesController@safe');
// Route::get('safe/deposit/{id}', 'PagesController@safe');
// Route::get('safe/payouts/{id}', 'PagesController@safe');
Route::get('safe/deposit/{id}', 'PagesController@safe_deposit');
Route::get('safe/payouts/{id}', 'PagesController@safe_payouts');
// Route::get('safe/create', 'SafeController\\SafeController@create');
Route::get('safe/edit/{id}', 'SafeController\\SafeController@edit');
Route::patch('safe/edit/{id}', 'SafeController\\SafeController@update');
Route::get('safe/delete/{id}', 'SafeController\\SafeController@destroy');
Route::delete('safe/delete/{id}', 'SafeController\\SafeController@destroy');
Route::get('safe/deposit_create/{id}', 'SafeController\\SafeController@create_deposit');
Route::get('safe/payouts_create/{id}', 'SafeController\\SafeController@create_payouts');
Route::get('safe/deposit/create/{id}', 'SafeController\\SafeController@create');
Route::post('safe/deposit/create/{id}', 'SafeController\\SafeController@store_deposit');
Route::get('safe/payouts/create/{id}', 'SafeController\\SafeController@create');
Route::post('safe/payouts/create/{id}', 'SafeController\\SafeController@store_payout');

Route::get('total-cash/{id}', 'PagesController@total_cash');
Route::get('total-cash/create/{id}', 'TotalCashController\\TotalCashController@create');
Route::post('total-cash/create/{id}', 'TotalCashController\\TotalCashController@store');

Route::get('expenses/{id}', 'PagesController@expenses');
Route::get('expenses/create/{id}', 'ExpensesController\\ExpensesController@create');
Route::post('expenses/create/{id}', 'ExpensesController\\ExpensesController@store');
Route::get('expenses/update/{id}', 'ExpensesController\\ExpensesController@edit_file');
Route::get('expenses/edit/{id}', 'ExpensesController\\ExpensesController@edit');
Route::PATCH('expenses/update/{id}', 'ExpensesController\\ExpensesController@update');
Route::get('expenses/fetch/{id}', 'PagesController@generate_expenses_fetch');
Route::get('expenses/delete/{id}', 'ExpensesController\\ExpensesController@destroy');
Route::get('expensesFile/fetch/{id}', 'PagesController@generate_expensesFile_fetch');

Route::get('employee-salary/{id}', 'PagesController@employee_salary');
Route::get('employee-salary/create/{id}', 'EmployeeSalaryController\\EmployeeSalaryController@create');
Route::post('employee-salary/create/{id}', 'EmployeeSalaryController\\EmployeeSalaryController@store');
Route::get('employee-salary/edit/{id}', 'EmployeeSalaryController\\EmployeeSalaryController@edit');
Route::patch('employee-salary/update/{id}', 'EmployeeSalaryController\\EmployeeSalaryController@update');
Route::get('employee-salary/delete/{id}', 'EmployeeSalaryController\\EmployeeSalaryController@destroy');
Route::get('employee-salary/fetch/{id}', 'PagesController@generate_employee_salary_fetch');
Route::get('employee-salary-user/fetch/{id}', 'PagesController@generate_employee_user_salary_fetch');


Route::get('suppliers/{id}', 'PagesController@suppliers');
Route::get('suppliers/create/{id}', 'SuppliersController\\SuppliersController@create');
Route::post('suppliers/create/{id}', 'SuppliersController\\SuppliersController@store');
Route::get('suppliers/edit/{id}', 'SuppliersController\\SuppliersController@edit');
Route::patch('suppliers/edit/{id}', 'SuppliersController\\SuppliersController@update');
Route::delete('suppliers/delete/{id}', 'SuppliersController\\SuppliersController@destroy');
// Route::get('permission-management', 'PermissionController@getIndex');
// Route::get('permission/create', 'PermissionController@create');
// Route::post('permission/create', 'PermissionController@save');
// Route::get('permission/delete/{id}', 'PermissionController@delete');
// Route::get('permission/edit/{id}', 'PermissionController@edit');
// Route::post('permission/edit/{id}', 'PermissionController@update');

Route::get('report/{id}', 'PagesController@report');
Route::get('report/create/{id}', 'ReportController\\ReportController@create');
Route::post('report/create/{id}', 'ReportController\\ReportController@store');
Route::get('report/fetch/{id}', 'PagesController@generate_report_fetch');

// Route::get('employee/{id}', 'PagesController@employee');
// Route::get('employee/create', 'EmployeeController\\EmployeeController@create');
// Route::post('employee/create', 'EmployeeController\\EmployeeController@store');

// Route::post('report/generate/{id}', 'PagesController@generate_report')->name("report.generate");
Route::post('report/deposite/generate/{id}', 'PagesController@generate_report')->name("report.deposite.generate");
Route::post('report/payout/generate/{id}', 'PagesController@generate_payout_report')->name("report.payout.generate");
Route::post('report/export/{id}', 'PagesController@export')->name("report.export");

// Route::post('safe/generate/{id}', 'PagesController@generate_safe')->name("safe.generate.id");

Route::get('safe/{id}', 'PagesController@generate_safe');
// Route::post('safe/{id}', 'PagesController@generate_safe');

Route::get('safe/fetch/{id}', 'PagesController@generate_safe_fetch');
// Route::post('safe/fetch/{id}', 'PagesController@generate_safe_fetch');
// Route::post('safe/generate/{id}', 'PagesController@generate_safe');
// Route::post('safe/generate/{id}', 'PagesController@generate_safe')->name("safe.deposite.generate");
// Route::post('safe/generate/{id}', 'PagesController@generate_safe')->name("safe.payout.generate");

// Route::post('safe/generate/{id}', 'PagesController@generate_safe');
// Route::post('safe/deposite/generate/{id}', 'PagesController@generate_safe')->name("safe.deposite.generate");
// Route::post('safe/payout/generate/{id}', 'PagesController@generate_safe')->name("safe.payout.generate");

Route::post('expenses/generate/{id}', 'PagesController@generate_expenses')->name("expenses.generate");
Route::post('employee-salary/generate/{id}', 'PagesController@generate_employee_salary')->name("employeesalary.generate");
Route::post('employee/generate/{id}', 'PagesController@generate_employee')->name("employee.generate");


Route::get('report/generate/{id}', 'PagesController@report')->name("report.generate");
Route::get('report/deposite/generate/{id}', 'PagesController@report')->name("report.deposite.generate");
Route::get('report/payout/generate/{id}', 'PagesController@report')->name("report.payout.generate");
Route::get('report/export/{id}', 'PagesController@report')->name("report.export");

Route::get('safe/generate/{id}', 'PagesController@safe')->name("safe.generate");
Route::get('safe/deposite/generate/{id}', 'PagesController@safe')->name("safe.deposite.generate");
Route::get('safe/payout/generate/{id}', 'PagesController@safe')->name("safe.payout.generate");

Route::get('expenses/generate/{id}', 'PagesController@expenses')->name("expenses.generate");
Route::get('employee-salary/generate/{id}', 'PagesController@employee_salary')->name("employeesalary.generate");
Route::get('employee/generate/{id}', 'PagesController@employee')->name("employee.generate");

// Route::resource('employee', 'EmployeeController\\EmployeeController');
    
});















