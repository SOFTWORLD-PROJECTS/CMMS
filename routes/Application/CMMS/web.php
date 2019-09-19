<?php

Route::get('/', 'Application\CMMS\SiteController@index')->name('home');

Route::group(['middleware' => 'auth','namespace'=>'Application\CMMS'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('/machinery/list/{type?}', 'MachineryController@index')->name('machinery');
    Route::get('/machinery/add', 'MachineryController@add')->name('machinery.add');
    Route::post('/machinery/create', 'MachineryController@create')->name('machinery.create');
    Route::get('/machinery/detail/{id}', 'MachineryController@detail')->name('machinery.detail');
    Route::get('/machinery/edit/{id}', 'MachineryController@edit')->name('machinery.edit');
    Route::post('/machinery/update', 'MachineryController@update')->name('machinery.update');
    Route::get('/machinery/delete/{id}', 'MachineryController@delete')->name('machinery.delete');
    Route::post('/machinery/data', 'MachineryController@machinerydata')->name('machinery.machinerydata');

    Route::get('/machinery/type/add', 'MachineryController@addType')->name('machinery.type.add');
    Route::post('/machinery/type/create', 'MachineryController@createType')->name('machinery.type.create');
    Route::get('/machinery/type/edit/{id}', 'MachineryController@editType')->name('machinery.type.edit');
    Route::post('/machinery/type/update', 'MachineryController@updateType')->name('machinery.type.update');
    Route::get('/machinery/type/delete/{id}', 'MachineryController@deleteType')->name('machinery.type.delete');
    Route::post('/machinery/type/data', 'MachineryController@typedata')->name('machinery.type.data');

    Route::get('/machinery/brand/add', 'MachineryController@addBrand')->name('machinery.brand.add');
    Route::post('/machinery/brand/create', 'MachineryController@createBrand')->name('machinery.brand.create');
    Route::get('/machinery/brand/edit/{id}', 'MachineryController@editBrand')->name('machinery.brand.edit');
    Route::post('/machinery/brand/update', 'MachineryController@updateBrand')->name('machinery.brand.update');
    Route::get('/machinery/brand/delete/{id}', 'MachineryController@deleteBrand')->name('machinery.brand.delete');
    Route::post('/machinery/brand/data', 'MachineryController@branddata')->name('machinery.brand.data');

    Route::get('/workorder', 'WorkOrderController@index')->name('workorder');
    Route::post('/workorder/list/{status}', 'WorkOrderController@data')->name('workorder.data');
    Route::get('/workorder/add', 'WorkOrderController@add')->name('workorder.add');
    Route::post('/workorder/create', 'WorkOrderController@create')->name('workorder.create');
    Route::get('/workorder/edit/{id}', 'WorkOrderController@edit')->name('workorder.edit');
    Route::get('/workorder/detail/{id}', 'WorkOrderController@detail')->name('workorder.detail');
    Route::post('/workorder/update', 'WorkOrderController@update')->name('workorder.update');
    Route::get('/workorder/delete/{id}', 'WorkOrderController@delete')->name('workorder.delete');
    Route::get('/workorder/complete/{id}', 'WorkOrderController@complete')->name('workorder.complete');
    Route::get('/workorder/kiv/{id}', 'WorkOrderController@kiv')->name('workorder.kiv');

    Route::post('/workorder/partsuse/create/{id}', 'WorkOrderController@createPartsUse')->name('workorder.partsuse.create');
    Route::post('/workorder/partsuse/update/{id}', 'WorkOrderController@updatePartsUse')->name('workorder.partsuse.update');
    Route::post('/workorder/partsuse/delete/{id}', 'WorkOrderController@deletePartsUse')->name('workorder.partsuse.delete');
    Route::post('/workorder/partsuse/data/{id}', 'WorkOrderController@partsusedata')->name('workorder.partsuse.data');

    Route::post('/workorder/service/create/{id}', 'WorkOrderController@createService')->name('workorder.service.create');
    Route::post('/workorder/service/update/{id}', 'WorkOrderController@updateService')->name('workorder.service.update');
    Route::post('/workorder/service/delete/{id}', 'WorkOrderController@deleteService')->name('workorder.service.delete');
    Route::post('/workorder/service/data/{id}', 'WorkOrderController@servicedata')->name('workorder.service.data');

    Route::post('/workorder/picture/create/{id}', 'WorkOrderController@createPicture')->name('workorder.picture.create');
    Route::post('/workorder/picture/delete/{id}', 'WorkOrderController@deletePicture')->name('workorder.picture.delete');
    Route::post('/workorder/picture/data/{id}', 'WorkOrderController@picturedata')->name('workorder.picture.data');

    Route::post('/workorder/remark/create/{id}', 'WorkOrderController@createRemark')->name('workorder.remark.create');
    Route::post('/workorder/remark/data/{id}', 'WorkOrderController@remarkdata')->name('workorder.remark.data');

    Route::get('/premaintenance', 'PreMaintenanceController@index')->name('premaintenance');
    Route::post('/premaintenance/data/upcoming', 'PreMaintenanceController@upcomingdata')->name('premaintenance.data.upcoming');
    Route::post('/premaintenance/data/post', 'PreMaintenanceController@postdata')->name('premaintenance.data.post');
    Route::post('/premaintenance/data/kiv', 'PreMaintenanceController@kivdata')->name('premaintenance.data.kiv');
    Route::post('/premaintenance/data/preset', 'PreMaintenanceController@presetdata')->name('premaintenance.data.preset');
    Route::get('/premaintenance/add', 'PreMaintenanceController@add')->name('premaintenance.add');
    Route::post('/premaintenance/create', 'PreMaintenanceController@create')->name('premaintenance.create');
    Route::get('/premaintenance/edit/{id}', 'PreMaintenanceController@edit')->name('premaintenance.edit');
    Route::get('/premaintenance/detail/{id}', 'PreMaintenanceController@detail')->name('premaintenance.detail');
    Route::post('/premaintenance/update', 'PreMaintenanceController@update')->name('premaintenance.update');
    Route::get('/premaintenance/post/{id}', 'PreMaintenanceController@post')->name('premaintenance.post');
    Route::post('/premaintenance/kiv/{id}', 'PreMaintenanceController@kiv')->name('premaintenance.kiv');
    Route::get('/premaintenance/delete/{id}', 'PreMaintenanceController@delete')->name('premaintenance.delete');

    Route::get('/record', 'RecordController@index')->name('record');
    Route::post('/record/data/smu', 'RecordController@smudata')->name('record.data.smu');
    Route::post('/record/data/mileage', 'RecordController@mileagedata')->name('record.data.mileage');
    Route::get('/record/add', 'RecordController@add')->name('record.add');
    Route::post('/record/create', 'RecordController@create')->name('record.create');
    Route::get('/record/edit/{id}', 'RecordController@edit')->name('record.edit');
    Route::post('/record/update', 'RecordController@update')->name('record.update');
    Route::get('/record/delete/{id}', 'RecordController@delete')->name('record.delete');

    Route::get('/renewal', 'RenewalController@index')->name('renewal');
    Route::get('/renewal/add', 'RenewalController@add')->name('renewal.add');
    Route::post('/renewal/create', 'RenewalController@create')->name('renewal.create');
    Route::get('/renewal/edit/{id}', 'RenewalController@edit')->name('renewal.edit');
    Route::get('/renewal/detail/{id}', 'RenewalController@detail')->name('renewal.detail');
    Route::post('/renewal/update', 'RenewalController@update')->name('renewal.update');
    Route::get('/renewal/delete/{id}', 'RenewalController@delete')->name('renewal.delete');
    Route::post('/renewal/data/upcoming', 'RenewalController@upcomingdata')->name('renewal.data.upcoming');
    Route::post('/renewal/data/complete', 'RenewalController@completedata')->name('renewal.data.complete');
    Route::post('/renewal/data/preset', 'RenewalController@presetdata')->name('renewal.data.preset');
    Route::post('/renewal/upload', 'RenewalController@uploadFile')->name('renewal.upload');

    Route::get('/diesal', 'DiesalController@index')->name('diesal');
    Route::get('/diesal/add', 'DiesalController@add')->name('diesal.add');
    Route::post('/diesal/create', 'DiesalController@create')->name('diesal.create');
    Route::get('/diesal/edit/{id}', 'DiesalController@edit')->name('diesal.edit');
    Route::get('/diesal/detail/{id}', 'DiesalController@detail')->name('diesal.detail');
    Route::post('/diesal/update', 'DiesalController@update')->name('diesal.update');
    Route::get('/diesal/delete/{id}', 'DiesalController@delete')->name('diesal.delete');
    Route::post('/diesal/data/usage', 'DiesalController@usagedata')->name('diesal.data.usage');

    Route::post('/diesal/data/stock', 'DiesalController@stockdata')->name('diesal.data.stock');
    Route::get('/diesal/stocks/add', 'DiesalController@addStock')->name('diesal.stock.add');
    Route::post('/diesal/stocks/create', 'DiesalController@createStock')->name('diesal.stock.create');
    Route::get('/diesal/stocks/edit/{id}', 'DiesalController@editStock')->name('diesal.stock.edit');
    Route::get('/diesal/stocks/detail/{id}', 'DiesalController@detailStock')->name('diesal.stock.detail');
    Route::post('/diesal/stock/update', 'DiesalController@updateStock')->name('diesal.stock.update');
    Route::get('/diesal/stock/delete/{id}', 'DiesalController@deleteStock')->name('diesal.stock.delete');

    Route::post('/diesal/data/request', 'DiesalController@requestdata')->name('diesal.data.request');
    Route::get('/diesal/request/add', 'DiesalController@addRequest')->name('diesal.request.add');
    Route::post('/diesal/request/create', 'DiesalController@createRequest')->name('diesal.request.create');
    Route::get('/diesal/request/edit/{id}', 'DiesalController@editRequest')->name('diesal.request.edit');
    Route::get('/diesal/request/detail/{id}', 'DiesalController@detailRequest')->name('diesal.request.detail');
    Route::post('/diesal/request/update', 'DiesalController@updateRequest')->name('diesal.request.update');
    Route::get('/diesal/request/complete/{id}', 'DiesalController@completeRequest')->name('diesal.request.complete');
    Route::get('/diesal/request/delete/{id}', 'DiesalController@deleteRequest')->name('diesal.request.delete');

    Route::get('/report', 'ReportController@index')->name('report');
    Route::get('/report/wo-report', 'ReportController@woReport')->name('report.wo-report');
    Route::get('/report/upcoming-wo-report', 'ReportController@upcomingPMReport')->name('report.upcoming-pm-report');
    Route::get('/report/upcoming-renewal-report', 'ReportController@upcomingRenewalReport')->name('report.upcoming-renewal-report');
    Route::get('/report/expense-report', 'ReportController@expenseReport')->name('report.expense-report');
    Route::get('/report/diesel-usage-report', 'ReportController@dieselUsageReport')->name('report.diesel-usage-report');
    Route::get('/report/diesel-stock-report', 'ReportController@dieselStockReport')->name('report.diesel-stock-report');

    Route::get('/setting', 'SettingController@index')->name('setting');
    
    Route::get('/setting/profile', 'SettingController@profile')->name('setting.profile');
    Route::post('/setting/profile/save', 'SettingController@saveProfile')->name('setting.profile.save');

    Route::get('/setting/usermaintain', 'SettingController@usermaintain')->name('setting.usermaintain');

    Route::get('/setting/docrunning', 'SettingController@docrunning')->name('setting.docrunning');
    Route::post('/setting/docrunning/save', 'SettingController@saveDocrunning')->name('setting.docrunning.save');

    Route::get('/setting/jobtitle', 'SettingController@jobtitle')->name('setting.jobtitle');
    Route::post('/setting/jobtitle/data', 'SettingController@jobtitledata')->name('setting.data.jobtitle');
    Route::post('/setting/jobtitle/create', 'SettingController@createJobTitle')->name('setting.jobtitle.create');
    Route::get('/setting/jobtitle/edit/{id}', 'SettingController@editJobTitle')->name('setting.jobtitle.edit');
    Route::post('/setting/jobtitle/update', 'SettingController@updateJobTitle')->name('setting.jobtitle.update');
    Route::get('/setting/jobtitle/delete/{id}', 'SettingController@deleteJobTitle')->name('setting.jobtitle.delete');

    Route::get('/setting/useraccess', 'SettingController@useraccess')->name('setting.useraccess');
    Route::post('/setting/useraccess/create', 'SettingController@useraccessCreate')->name('setting.useraccess.create');

    Route::get('/setting/usermanage', 'SettingController@usermanage')->name('setting.usermanage');
    Route::post('/setting/usermanage/data', 'SettingController@usermanagedata')->name('setting.data.usermanage');
    Route::get('/setting/usermanage/add', 'SettingController@addUserManage')->name('setting.usermanage.add');
    Route::post('/setting/usermanage/create', 'SettingController@createUserManage')->name('setting.usermanage.create');
    Route::get('/setting/usermanage/edit/{id}', 'SettingController@editUserManage')->name('setting.usermanage.edit');
    Route::post('/setting/usermanage/update', 'SettingController@updateUserManage')->name('setting.usermanage.update');
    Route::get('/setting/usermanage/delete/{id}', 'SettingController@deleteUserManage')->name('setting.usermanage.delete');

    Route::get('/setting/preset', 'SettingController@preset')->name('setting.preset');

    Route::get('/setting/pm-renewal', 'SettingController@pmrenewal')->name('setting.pm-renewal');
    Route::post('/setting/pm-renewal/save', 'SettingController@savePmRenewal')->name('setting.pm-renewal.save');

    Route::get('/setting/backuprestore/add', 'SettingController@addBackupRestore')->name('setting.backuprestore.add');
    Route::post('/setting/backuprestore/create', 'SettingController@createBackupRestore')->name('setting.backuprestore.create');
    Route::get('/setting/backuprestore/delete/{id}', 'SettingController@deleteBackupRestore')->name('setting.backuprestore.delete');
    Route::post('/setting/backuprestore/data', 'SettingController@backuprestoredata')->name('setting.data.backuprestore');
    Route::get('/setting/backuprestore', 'SettingController@backuprestore')->name('setting.backuprestore');

    Route::get('/setting/audittrail', 'SettingController@audittrail')->name('setting.audittrail');
    Route::get('/setting/audittrail/delete/{id}', 'SettingController@deleteAuditTrail')->name('setting.audittrail.delete');
    Route::post('/setting/audittrail/data', 'SettingController@audittraildata')->name('setting.data.audittrail');
});
   Auth::routes();
