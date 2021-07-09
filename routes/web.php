<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/access-denied', function () {
    return view('access_denied');
})->name('access-denied');

Route::get('/portal', 'HomeController@empHome')->name('emp-home')->middleware('auth', 'employee');

Route::prefix('applications')->group(function () {
    Route::get("all", "ApplicationsController@index")->name('app-all')->middleware('auth', 'admin_team_lead');
    Route::get("pending", "ApplicationsController@pending")->name('app-pending');
    Route::get("accepted", "ApplicationsController@accepted")->name('app-accepted');
    Route::get("rejected", "ApplicationsController@rejected")->name('app-rejected');
    Route::get("view/{id}", "ApplicationsController@view")->name('app-view');
    Route::get("accept/{id}", "ApplicationsController@accept")->name('app-accept');
    Route::get("reject/{id}", "ApplicationsController@reject")->name('app-reject');
});

Route::prefix('leaves')->group(function () {
    Route::get("all", "LeavesController@allLeaves")->name('leave-all');
    Route::get("pending", "LeavesController@pendingLeaves")->name('leave-pending');
    Route::get("accepted", "LeavesController@acceptedLeaves")->name('leave-accepted');
    Route::get("rejected", "LeavesController@rejectedLeaves")->name('leave-rejected');
    Route::get("view/{id}", "LeavesController@viewLeave")->name('leave-view');
    Route::get('apply', 'LeavesController@apply')->name('leave-apply');
    Route::post('add-leave', 'LeavesController@add')->name('leave-add');
});

Route::prefix('departments')->group(function () {
    Route::get("all", "DepartmentsController@index")->name('dep-all');
    Route::get("add", "DepartmentsController@add")->name('dep-add');
    Route::post("insert", "DepartmentsController@insert")->name('dep-insert');
    Route::get("edit/{id}", "DepartmentsController@edit")->name('dep-edit');
    Route::get("status/{id}/{status}", "DepartmentsController@status")->name('dep-status');
    Route::post("update/{id}", "DepartmentsController@update")->name('dep-update');
    Route::get("delete/{id}", "DepartmentsController@delete")->name('dep-delete');
});

Route::prefix('roles')->group(function () {
    Route::get("all", "RolesController@index")->name('role-all');
    Route::get("add", "RolesController@add")->name('role-add');
    Route::post("insert", "RolesController@insert")->name('role-insert');
    Route::post("assign-permissions", "RolesController@assignPermissions")->name('role-assign-permissions');
    Route::get("permissions/{id}", "RolesController@rolesPermissions")->name('roles-permissions');
    Route::get("edit/{id}", "RolesController@edit")->name('role-edit');
    Route::post("update/{id}", "RolesController@update")->name('role-update');
    Route::get("status/{id}/{status}", "RolesController@status")->name('role-status');
    Route::get("activate/{id}", "RolesController@activate")->name('role-activate');
    Route::get("deactivate/{id}", "RolesController@deactivate")->name('role-deactivate');
});

Route::prefix('permissions')->group(function () {
    Route::get("all", "PermissionsController@index")->name('per-all');
    Route::get("add", "PermissionsController@add")->name('per-add');
    Route::post("insert", "PermissionsController@insert")->name('per-insert');
    Route::get("edit/{id}", "PermissionsController@edit")->name('per-edit');
    Route::post("update/{id}", "PermissionsController@update")->name('per-update');
    Route::get("activate/{id}", "PermissionsController@activate")->name('per-activate');
    Route::get("deactivate/{id}", "PermissionsController@deactivate")->name('per-deactivate');
});

Route::prefix('designations')->group(function () {
    Route::get("all", "DesignationsController@index")->name('des-all');
    Route::get("add", "DesignationsController@add")->name('des-add');
    Route::post("insert", "DesignationsController@insert")->name('des-insert');
    Route::get("edit/{id}", "DesignationsController@edit")->name('des-edit');
    Route::get("status/{id}/{status}", "DesignationsController@status")->name('des-status');
    Route::post("update/{id}", "DesignationsController@update")->name('des-update');
    Route::get("delete/{id}", "DesignationsController@delete")->name('des-delete');
});

Route::prefix('permissions-groups')->group(function () {
    Route::get("all", "PermissionsGroupsController@index")->name('per-group-all');
    Route::get("add", "PermissionsGroupsController@add")->name('per-group-add');
    Route::post("insert", "PermissionsGroupsController@insert")->name('per-group-insert');
    Route::get("edit/{id}", "PermissionsGroupsController@edit")->name('per-group-edit');
    Route::post("update/{id}", "PermissionsGroupsController@update")->name('per-group-update');
    Route::get("delete/{id}", "PermissionsGroupsController@delete")->name('per-group-delete');
});

Route::prefix('leaveType')->group(function () {
    Route::get("all", "LeaveTypesController@index")->name('lt-all');
    Route::get("add", "LeaveTypesController@add")->name('lt-add');
    Route::post("insert", "LeaveTypesController@insert")->name('lt-insert');
    Route::get("edit/{id}", "LeaveTypesController@edit")->name('lt-edit');
    Route::post("update/{id}", "LeaveTypesController@update")->name('lt-update');
    Route::get("delete/{id}", "LeaveTypesController@delete")->name('lt-delete');
    Route::get("status/{id}/{status}", "LeaveTypesController@status")->name('lt-status');
});

Route::prefix('empCategory')->group(function () {
    Route::get("all", "EmpCategoriesController@index")->name('ec-all');
    Route::get("add", "EmpCategoriesController@add")->name('ec-add');
    Route::post("insert", "EmpCategoriesController@insert")->name('ec-insert');
    Route::get("edit/{id}", "EmpCategoriesController@edit")->name('ec-edit');
    Route::post("update/{id}", "EmpCategoriesController@update")->name('ec-update');
    Route::get("delete/{id}", "EmpCategoriesController@delete")->name('ec-delete');
    Route::get("status/{id}/{status}", "EmpCategoriesController@status")->name('ec-status');
});

Route::prefix('employee')->group(function() {
    Route::get("all", "EmployeeController@all")->name('emp-all');
    Route::get("edit/{id}", "EmployeeController@editEmployee")->name('emp-edit');
    Route::post("update/{id}", "EmployeeController@updateEmployee")->name('emp-update');
    Route::post("assign-roles", "EmployeeController@assignRoles")->name('emp-assign-roles');
    Route::get("roles/{id}", "EmployeeController@empRoles")->name('emp-roles');
    Route::get("view/{id}", "EmployeeController@view")->name('emp-view');
    Route::get("profile/{id}", "EmployeeController@viewProfile")->name('emp-view-profile');
    Route::get("type/{id}", "EmployeeController@type")->name('emp-cat');
    Route::get("status/{id}/{status}", "EmployeeController@status")->name('emp-status');
    Route::get('quota', 'EmployeeController@quota')->name('quota');
    Route::get('new', function() {
        return view('employee.all');
    })->name('emp-new');
});

Route::get('profile', function() {
    return view('profile');
});

Auth::routes();