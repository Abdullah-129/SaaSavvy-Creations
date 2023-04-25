<?php
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\EmailConfigurationController;
use App\Http\Controllers\Admin\EmailTemplateController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogCommentController;
use App\Http\Controllers\Admin\PopularBlogController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\CustomPageController;
use App\Http\Controllers\Admin\TermsAndConditionController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\FooterSocialLinkController;
use App\Http\Controllers\Admin\FooterLinkController;
use App\Http\Controllers\Admin\ContentController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ErrorPageController;

use App\Http\Controllers\Admin\PaymentMethodController;
use App\Http\Controllers\Admin\PartnerController;

use App\Http\Controllers\Admin\ProviderController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\BreadcrumbController;

use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\PricingPlanController;
use App\Http\Controllers\Admin\UseCaseController;
use App\Http\Controllers\Admin\DashboardController;

// frontend start

use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\AIWriteController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\PaypalController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::group(['middleware' => ['demo','XSS']], function () {

Route::group(['middleware' => ['maintainance']], function () {

    Route::group(['middleware' => ['HtmlSpecialchars']], function () {

    Route::get('/download-file/{file}', [HomeController::class, 'downloadListingFile'])->name('download-file');


    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs');
    Route::get('/blog/{slug}', [HomeController::class, 'single_blog'])->name('blog');
    Route::post('/blog-comment', [HomeController::class, 'blogComment'])->name('blog-comment');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');
    Route::get('/contact-us', [HomeController::class, 'contactUs'])->name('contact-us');
    Route::post('/send-contact-message', [HomeController::class, 'sendContactMessage'])->name('send-contact-message');
    Route::get('/faq', [HomeController::class, 'faq'])->name('faq');
    Route::get('/testimonial', [HomeController::class, 'testimonial'])->name('testimonial');
    Route::get('/pricing-plan', [HomeController::class, 'pricing_plan'])->name('pricing-plan');

    Route::post('/subscribe-request', [HomeController::class, 'subscribeRequest'])->name('subscribe-request');
    Route::get('/subscriber-verification/{token}', [HomeController::class, 'subscriberVerifcation'])->name('subscriber-verification');



    Route::get('/terms-and-conditions', [HomeController::class, 'termsAndCondition'])->name('terms-and-conditions');
    Route::get('/privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy-policy');
    Route::get('/page/{slug}', [HomeController::class, 'customPage'])->name('page');


    Route::get('/payment/{id}', [PaymentController::class, 'payment_page'])->name('payment');

    Route::post('/pay-with-stripe/{id}', [PaymentController::class, 'pay_with_stripe'])->name('pay-with-stripe');
    Route::post('/pay-with-razorpay/{id}', [PaymentController::class, 'pay_with_razorpay'])->name('pay-with-razorpay');
    Route::post('/pay-with-flutterwave/{id}', [PaymentController::class, 'pay_with_flutterwave'])->name('pay-with-flutterwave');
    Route::get('/pay-with-mollie/{id}', [PaymentController::class, 'pay_with_mollie'])->name('pay-with-mollie');
    Route::get('/mollie-payment-success', [PaymentController::class, 'mollie_payment_success'])->name('mollie-payment-success');
    Route::get('/pay-with-paystack/{id}', [PaymentController::class, 'pay_with_paystack'])->name('pay-with-paystack');

    Route::get('/pay-with-instamojo/{id}', [PaymentController::class, 'pay_with_instamojo'])->name('pay-with-instamojo');
    Route::get('/response-instamojo', [PaymentController::class, 'instamojo_response'])->name('response-instamojo');

    Route::post('/bank-payment/{id}', [PaymentController::class, 'bank_payment'])->name('bank-payment');

    Route::get('/pay-with-paypal/{id}', [PaypalController::class, 'payWithPaypal'])->name('pay-with-paypal');
    Route::get('/paypal-payment-success', [PaypalController::class, 'paypalPaymentSuccess'])->name('paypal-payment-success');
    Route::get('/paypal-payment-cancled', [PaypalController::class, 'paypalPaymentCancled'])->name('paypal-payment-cancled');

    Route::get('/free-enroll/{id}', [PaymentController::class, 'free_enroll'])->name('free-enroll');

    Route::get('/booking-information/{slug}', [PaymentController::class, 'booking_information'])->name('booking-information');

    Route::get('/login', [LoginController::class, 'loginPage'])->name('login');
    Route::post('/store-login', [LoginController::class, 'storeLogin'])->name('store-login');
    Route::get('/register', [RegisterController::class, 'loginPage'])->name('register');
    Route::post('/store-register', [RegisterController::class, 'storeRegister'])->name('store-register');
    Route::get('/user-verification/{token}', [RegisterController::class, 'userVerification'])->name('user-verification');
    Route::get('/forget-password', [LoginController::class, 'forgetPage'])->name('forget-password');
    Route::post('/send-forget-password', [LoginController::class, 'sendForgetPassword'])->name('send-forget-password');
    Route::get('/reset-password/{token}', [LoginController::class, 'resetPasswordPage'])->name('reset-password');
    Route::post('/store-reset-password/{token}', [LoginController::class, 'storeResetPasswordPage'])->name('store-reset-password');

    Route::get('login/google',[LoginController::class, 'redirectToGoogle'])->name('login-google');
    Route::get('/callback/google',[LoginController::class,'googleCallBack'])->name('callback-google');

    Route::get('login/facebook',[LoginController::class, 'redirectToFacebook'])->name('login-facebook');
    Route::get('/callback/facebook',[LoginController::class,'facebookCallBack'])->name('callback-facebook');

    Route::get('dashboard', [UserProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('change-password', [UserProfileController::class, 'change_password'])->name('change-password');
    Route::post('update-password', [UserProfileController::class, 'updatePassword'])->name('update-password');
    Route::get('my-profile', [UserProfileController::class, 'my_profile'])->name('my-profile');
    Route::post('update-profile', [UserProfileController::class, 'updateProfile'])->name('update-profile');
    Route::get('/dashboard/pricing-plan', [UserProfileController::class, 'pricing_plan'])->name('dashboard-pricing-plan');
    Route::get('/payment-history', [UserProfileController::class, 'payment_history'])->name('payment-history');

    Route::get('/ai-history', [UserProfileController::class, 'ai_history'])->name('ai-history');
    Route::post('/update-ai-history/{id}', [UserProfileController::class, 'update_ai_history'])->name('update-ai-history');
    Route::delete('/delete-ai-document/{id}', [UserProfileController::class, 'delete_ai_document'])->name('delete-ai-document');
    Route::get('/single-ai-document/{id}', [UserProfileController::class, 'single_ai_document'])->name('single-ai-document');

    Route::post('/ai-writer', [AIWriteController::class, 'ai_write'])->name('ai-writer');

    Route::get('/user/logout', [LoginController::class, 'userLogout'])->name('user.logout');

    });



});

// start admin routes
Route::group(['as'=> 'admin.', 'prefix' => 'admin'],function (){

    // start auth route
    Route::get('login', [AdminLoginController::class,'adminLoginPage'])->name('login');
    Route::post('login', [AdminLoginController::class,'storeLogin'])->name('store-login');
    Route::post('logout', [AdminLoginController::class,'adminLogout'])->name('logout');
    Route::get('forget-password', [AdminForgotPasswordController::class,'forgetPassword'])->name('forget-password');
    Route::post('send-forget-password', [AdminForgotPasswordController::class,'sendForgetEmail'])->name('send.forget.password');
    Route::get('reset-password/{token}', [AdminForgotPasswordController::class,'resetPassword'])->name('reset.password');
    Route::post('password-store/{token}', [AdminForgotPasswordController::class,'storeResetData'])->name('store.reset.password');
    // end auth route

    Route::resource('admin', AdminController::class);
    Route::put('admin-status/{id}', [AdminController::class,'changeStatus'])->name('admin-status');
    Route::get('profile', [AdminProfileController::class,'index'])->name('profile');
    Route::put('profile-update', [AdminProfileController::class,'update'])->name('profile.update');

    Route::get('subscriber',[SubscriberController::class,'index'])->name('subscriber');
    Route::delete('delete-subscriber/{id}',[SubscriberController::class,'destroy'])->name('delete-subscriber');
    Route::post('specification-subscriber-email/{id}',[SubscriberController::class,'specificationSubscriberEmail'])->name('specification-subscriber-email');
    Route::post('each-subscriber-email',[SubscriberController::class,'eachSubscriberEmail'])->name('each-subscriber-email');

    Route::get('contact-message',[ContactMessageController::class,'index'])->name('contact-message');
    Route::delete('delete-contact-message/{id}',[ContactMessageController::class,'destroy'])->name('delete-contact-message');
    Route::put('enable-save-contact-message',[ContactMessageController::class,'handleSaveContactMessage'])->name('enable-save-contact-message');

    Route::get('general-setting',[SettingController::class,'index'])->name('general-setting');
    Route::put('update-general-setting',[SettingController::class,'updateGeneralSetting'])->name('update-general-setting');

    Route::put('update-theme-color',[SettingController::class,'updateThemeColor'])->name('update-theme-color');

    Route::put('update-logo-favicon',[SettingController::class,'updateLogoFavicon'])->name('update-logo-favicon');
    Route::put('update-cookie-consent',[SettingController::class,'updateCookieConset'])->name('update-cookie-consent');
    Route::put('update-open-ai',[SettingController::class,'updateOpenAi'])->name('update-open-ai');
    Route::put('update-google-recaptcha',[SettingController::class,'updateGoogleRecaptcha'])->name('update-google-recaptcha');
    Route::put('update-facebook-comment',[SettingController::class,'updateFacebookComment'])->name('update-facebook-comment');
    Route::put('update-tawk-chat',[SettingController::class,'updateTawkChat'])->name('update-tawk-chat');
    Route::put('update-google-analytic',[SettingController::class,'updateGoogleAnalytic'])->name('update-google-analytic');
    Route::put('update-custom-pagination',[SettingController::class,'updateCustomPagination'])->name('update-custom-pagination');
    Route::put('update-social-login',[SettingController::class,'updateSocialLogin'])->name('update-social-login');
    Route::put('update-facebook-pixel',[SettingController::class,'updateFacebookPixel'])->name('update-facebook-pixel');
    Route::put('update-pusher',[SettingController::class,'updatePusher'])->name('update-pusher');

    Route::get('admin-language', [LanguageController::class, 'adminLnagugae'])->name('admin-language');
    Route::post('update-admin-language', [LanguageController::class, 'updateAdminLanguage'])->name('update-admin-language');

    Route::get('admin-validation-language', [LanguageController::class, 'adminValidationLnagugae'])->name('admin-validation-language');
    Route::post('update-admin-validation-language', [LanguageController::class, 'updateAdminValidationLnagugae'])->name('update-admin-validation-language');

    Route::get('website-language', [LanguageController::class, 'websiteLanguage'])->name('website-language');
    Route::post('update-language', [LanguageController::class, 'updateLanguage'])->name('update-language');

    Route::get('website-validation-language', [LanguageController::class, 'websiteValidationLanguage'])->name('website-validation-language');
    Route::post('update-validation-language', [LanguageController::class, 'updateValidationLanguage'])->name('update-validation-language');

    Route::get('email-configuration',[EmailConfigurationController::class,'index'])->name('email-configuration');
    Route::put('update-email-configuraion',[EmailConfigurationController::class,'update'])->name('update-email-configuraion');

    Route::get('email-template',[EmailTemplateController::class,'index'])->name('email-template');
    Route::get('edit-email-template/{id}',[EmailTemplateController::class,'edit'])->name('edit-email-template');
    Route::put('update-email-template/{id}',[EmailTemplateController::class,'update'])->name('update-email-template');

    Route::resource('blog-category', BlogCategoryController::class);
    Route::put('blog-category-status/{id}', [BlogCategoryController::class,'changeStatus'])->name('blog.category.status');

    Route::resource('blog', BlogController::class);
    Route::put('blog-status/{id}', [BlogController::class,'changeStatus'])->name('blog.status');

    Route::resource('popular-blog', PopularBlogController::class);
    Route::put('popular-blog-status/{id}', [PopularBlogController::class,'changeStatus'])->name('popular-blog.status');

    Route::resource('blog-comment', BlogCommentController::class);
    Route::put('blog-comment-status/{id}', [BlogCommentController::class,'changeStatus'])->name('blog-comment.status');

    Route::resource('about-us', AboutUsController::class);
    Route::put('update-about-us', [AboutUsController::class, 'update_aboutUs'])->name('update-about-us');

    Route::resource('contact-us', ContactPageController::class);

    Route::resource('custom-page', CustomPageController::class);
    Route::put('custom-page-status/{id}', [CustomPageController::class,'changeStatus'])->name('custom-page.status');

    Route::resource('terms-and-condition', TermsAndConditionController::class);
    Route::resource('privacy-policy', PrivacyPolicyController::class);

    Route::resource('faq', FaqController::class);
    Route::put('faq-status/{id}', [FaqController::class,'changeStatus'])->name('faq-status');

    Route::resource('error-page', ErrorPageController::class);

    Route::resource('footer', FooterController::class);
    Route::resource('social-link', FooterSocialLinkController::class);
    Route::resource('footer-link', FooterLinkController::class);
    Route::get('second-col-footer-link', [FooterLinkController::class, 'secondColFooterLink'])->name('second-col-footer-link');
    Route::get('third-col-footer-link', [FooterLinkController::class, 'thirdColFooterLink'])->name('third-col-footer-link');
    Route::put('update-col-title/{id}', [FooterLinkController::class, 'updateColTitle'])->name('update-col-title');


    Route::resource('slider', SliderController::class);
    Route::put('slider-status/{id}',[SliderController::class,'changeStatus'])->name('slider-status');

    Route::resource('testimonial', TestimonialController::class);
    Route::put('testimonial-status/{id}', [TestimonialController::class,'changeStatus'])->name('testimonial.status');

    Route::get('customer-list',[CustomerController::class,'index'])->name('customer-list');
    Route::get('customer-show/{id}',[CustomerController::class,'show'])->name('customer-show');
    Route::put('customer-status/{id}',[CustomerController::class,'changeStatus'])->name('customer-status');
    Route::delete('customer-delete/{id}',[CustomerController::class,'destroy'])->name('customer-delete');
    Route::get('pending-customer-list',[CustomerController::class,'pendingCustomerList'])->name('pending-customer-list');
    Route::get('send-email-to-all-customer',[CustomerController::class,'sendEmailToAllUser'])->name('send-email-to-all-customer');
    Route::post('send-mail-to-all-user',[CustomerController::class,'sendMailToAllUser'])->name('send-mail-to-all-user');
    Route::post('send-mail-to-single-user/{id}',[CustomerController::class,'sendMailToSingleUser'])->name('send-mail-to-single-user');

    Route::get('payment-method',[PaymentMethodController::class,'index'])->name('payment-method');
    Route::put('update-paypal',[PaymentMethodController::class,'updatePaypal'])->name('update-paypal');
    Route::put('update-stripe',[PaymentMethodController::class,'updateStripe'])->name('update-stripe');
    Route::put('update-razorpay',[PaymentMethodController::class,'updateRazorpay'])->name('update-razorpay');
    Route::put('update-bank',[PaymentMethodController::class,'updateBank'])->name('update-bank');
    Route::put('update-mollie',[PaymentMethodController::class,'updateMollie'])->name('update-mollie');
    Route::put('update-paystack',[PaymentMethodController::class,'updatePayStack'])->name('update-paystack');
    Route::put('update-flutterwave',[PaymentMethodController::class,'updateflutterwave'])->name('update-flutterwave');
    Route::put('update-instamojo',[PaymentMethodController::class,'updateInstamojo'])->name('update-instamojo');
    Route::put('update-paymongo',[PaymentMethodController::class,'updatePaymongo'])->name('update-paymongo');
    Route::put('update-cash-on-delivery',[PaymentMethodController::class,'updateCashOnDelivery'])->name('update-cash-on-delivery');

    Route::get('default-avatar', [ContentController::class, 'defaultAvatar'])->name('default-avatar');
    Route::put('update-default-avatar', [ContentController::class, 'updateDefaultAvatar'])->name('update-default-avatar');

    Route::get('login-page', [ContentController::class, 'login_page'])->name('login-page');
    Route::put('update-login-page', [ContentController::class, 'update_login_page'])->name('update-login-page');



    Route::get('maintainance-mode',[ContentController::class,'maintainanceMode'])->name('maintainance-mode');
    Route::put('maintainance-mode-update',[ContentController::class,'maintainanceModeUpdate'])->name('maintainance-mode-update');

    Route::get('seo-setup',[ContentController::Class, 'seoSetup'])->name('seo-setup');
    Route::put('update-seo-setup/{id}',[ContentController::Class, 'updateSeoSetup'])->name('update-seo-setup');


    Route::resource('banner-image', BreadcrumbController::class);

    Route::get('/', [DashboardController::class,'dashobard']);
    Route::get('dashboard', [DashboardController::class,'dashobard'])->name('dashboard');

    Route::get('clear-database',[SettingController::class,'showClearDatabasePage'])->name('clear-database');
    Route::delete('delete-clear-database',[SettingController::class,'clearDatabase'])->name('delete-clear-database');


    Route::get('why-choose-us', [HomepageController::class, 'why_choose_us'])->name('why-choose-us');
    Route::put('why-choose-us-update', [HomepageController::class, 'why_choose_us_update'])->name('why-choose-us-update');

    Route::get('how-it-work', [HomepageController::class, 'how_it_work'])->name('how-it-work');
    Route::put('how-it-work-update', [HomepageController::class, 'how_it_work_update'])->name('how-it-work-update');

    Route::resource('pricing-plan', PricingPlanController::class);

    Route::get('purchase-histories', [OrderController::class, 'purchase_history'])->name('purchase-histories');
    Route::get('purchase-history/{id}', [OrderController::class, 'single_purchase'])->name('purchase-history');
    Route::delete('purchase-delete/{id}', [OrderController::class, 'purchase_delete'])->name('purchase-delete');

    Route::get('use-cases', [UseCaseController::class, 'index'])->name('use-cases');
    Route::get('use-case/{id}', [UseCaseController::class, 'edit'])->name('use-case');
    Route::put('update-use-case/{id}', [UseCaseController::class, 'update'])->name('update-use-case');
    Route::put('update-sub-use-case', [UseCaseController::class, 'update_sub_usecase'])->name('update-sub-use-case');



});

});
// end admin routes



