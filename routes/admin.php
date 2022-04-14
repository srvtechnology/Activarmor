<?php

Route::group(['namespace' => 'Admin'], function() {

    Route::get('/', 'HomeController@index')->name('admin.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    // Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');



     // forget-password
    Route::get('forget-password','Auth\ForgotPasswordController@index')->name('admin.forget.password');
    Route::post('forget-password/email','Auth\ForgotPasswordController@forgetpassword')->name('admin.forget.password.email');
    Route::get('reset-password/{id}/{vcode}','Auth\ForgotPasswordController@resetPassowrd')->name('admin.forget.password.email.verify');
    Route::post('reset-new-password','Auth\ForgotPasswordController@newPassword')->name('admin.reset.new.password');

    // banner-image 
    Route::post('banner/update','Modules\Banner\BannerController@update')->name('admin.banner.update');

    // what-section
    Route::get('what-section','Modules\What\WhatController@index')->name('admin.manage.what');
    Route::post('what-section/update','Modules\What\WhatController@whatUpdate')->name('admin.manage.what.update');
    Route::get('what-section/content/{id}','Modules\What\WhatController@content')->name('admin.manage.what.content');
    Route::post('what-section/content/update','Modules\What\WhatController@update')->name('admin.manage.what.content.update');

    // why-section 
    Route::get('why-section','Modules\Why\WhyController@index')->name('admin.manage.why');
    Route::post('why-section/update','Modules\Why\WhyController@whyUpdate')->name('admin.manage.why.update');
    Route::get('why-section/content/{id}','Modules\Why\WhyController@content')->name('admin.manage.why.content');
    Route::post('why-section/content/update','Modules\Why\WhyController@update')->name('admin.manage.why.content.update');

    // contact 
    Route::get('manage-contact','Modules\Contact\ContactController@index')->name('admin.manage.contact');
    Route::get('manage-contact/details/{id}','Modules\Contact\ContactController@view')->name('admin.manage.contact.view');
    Route::get('manage-contact/delete/{id}','Modules\Contact\ContactController@delete')->name('admin.manage.contact.delete');
    // change-password
    Route::get('change-password','HomeController@changeView')->name('admin.change.password');
    Route::get('change-password/check-old-password','HomeController@checkOld')->name('admin.change.password.check');
    Route::post('change-password/confirm-password','HomeController@confrim')->name('admin.change.password.confirm');
    // admin-profile 
    Route::get('profile','HomeController@profile')->name('admin.profile');
    Route::get('profile/check-email','HomeController@checkemail')->name('admin.manage.profile.checkemail');
    Route::post('profile/update','HomeController@profileUpdate')->name('admin.manage.profile.update');

    // for-patient
    Route::get('manage-patient-banner','Modules\Patient\PatientController@banner')->name('admin.manage.patient.banner');
    Route::post('manage-patient-banner/banner-update','Modules\Patient\PatientController@bannerUpdate')->name('admin.manage.patient.banner.update');
    // empower&how 
    Route::get('manage-empower-how','Modules\Patient\PatientController@empower')->name('admin.manage.empower');
    Route::get('manage-empower-how/edit/{id}','Modules\Patient\PatientController@empowerEdit')->name('admin.manage.empower.edit');
    Route::post('manage-empower-how/update','Modules\Patient\PatientController@empowerUpdate')->name('admin.manage.empower.update');

    // manage-uses 
    Route::any('manage-uses','Modules\Patient\PatientController@manageUses')->name('admin.manage.uses');
    Route::get('manage-uses/add','Modules\Patient\PatientController@manageUsesAdd')->name('admin.manage.uses.add');
    Route::post('manage-uses/insert','Modules\Patient\PatientController@manageUsesInsert')->name('admin.manage.uses.insert');
    Route::get('manage-uses/delete/{id}','Modules\Patient\PatientController@manageUsesDelete')->name('admin.manage.uses.delete');
    Route::get('manage-uses/edit/{id}','Modules\Patient\PatientController@manageUsesEdit')->name('admin.manage.uses.edit');
    Route::post('manage-uses/update','Modules\Patient\PatientController@manageUsesUpdate')->name('admin.manage.uses.update');



    // doctor-banner
    Route::get('manage-doctor-banner','Modules\Doctor\DoctorController@banner')->name('manage.doctor.banner');
    Route::post('manage-doctor-banner/update','Modules\Doctor\DoctorController@bannerUpdate')->name('manage.doctor.banner.update');
    // manage-about 
    Route::get('manage-about-doctor','Modules\Doctor\DoctorController@about')->name('manage.about.doctor');
    Route::post('manage-about-doctor/update','Modules\Doctor\DoctorController@aboutUpdate')->name('manage.about.doctor.update');
    // manage-provider
    Route::get('manage-provider','Modules\Doctor\DoctorController@provider')->name('manage.doctor.provider');
    Route::post('manage-provider/upload','Modules\Doctor\DoctorController@providerUpload')->name('manage.doctor.provider.upload');
    Route::get('manage-provider/delete/{id}','Modules\Doctor\DoctorController@providerDelete')->name('manage.doctor.provider.delete');

    // manage-common-uses
    Route::get('manage-common-uses','Modules\Doctor\DoctorController@commonUse')->name('admin.manage.common.use');
    Route::post('manage-common-uses/update','Modules\Doctor\DoctorController@commonUseUpdate')->name('admin.manage.common.use.update');

    // manage-contact-us 
    Route::get('manage-contact-us','Modules\Contact\ContactController@contact')->name('admin.contact.page');
    Route::post('manage-contact-us/update','Modules\Contact\ContactController@contactUpdate')->name('admin.contact.page.update');

    // manage-suggestion
    Route::get('manage-suggestion','Modules\Suggestion\SuggestionController@index')->name('admin.manage.suggestion');
    Route::get('manage-suggestion/delete-suggestion/{id}','Modules\Suggestion\SuggestionController@delete')->name('admin.manage.suggestion.delete');

    // manage-prescription
    Route::get('manage-prescription','Modules\Suggestion\SuggestionController@managePrescription')->name('admin.manage.prescription');
    Route::get('manage-prescription/download-prescription/{id}','Modules\Suggestion\SuggestionController@downloadPrescription')->name('admin.manage.prescription.download');
    Route::get('manage-prescription/view-prescription/{id}','Modules\Suggestion\SuggestionController@viewPrescription')->name('admin.manage.prescription.view');
    Route::get('manage-prescription/delete-prescription/{id}','Modules\Suggestion\SuggestionController@deletePrescription')->name('admin.manage.prescription.delete');


    // manage-users 
    Route::any('manage-users','Modules\User\UserController@index')->name('admin.manage.users');
    Route::get('manage-users/status/{id}','Modules\User\UserController@status')->name('admin.manage.users.status');
    Route::get('manage-users/delete/{id}','Modules\User\UserController@delete')->name('admin.manage.users.delete');



    // manage-pdf
    Route::get('manage-pdf','Modules\Pdf\PdfController@index')->name('admin.manage.pdf');
    Route::get('manage-pdf/edit/{id}','Modules\Pdf\PdfController@edit')->name('admin.manage.pdf.edit');
    Route::post('manage-pdf/update','Modules\Pdf\PdfController@update')->name('admin.manage.pdf.update');
     Route::get('manage-pdf/download-pdf/{id}','Modules\Pdf\PdfController@downloadPdf')->name('admin.manage.pdf.download');
    // Verify
    // Route::get('email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
    // Route::get('email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
    // Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('admin.verification.verify');

});