<?php

use App\Models\User;
use App\Notifications\TestSuccess;
use Illuminate\Support\Facades\Route;
use App\Notifications\CourseBuyNotify;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BotmanController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiplomaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PendingController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\AdminChatController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\EmailtypeController;
use App\Http\Controllers\OtherPageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Client\TestController;
use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Admin\DashboardController;



Route::post('/mark_as_read/{id}', function($id){
    $notification = auth()->user()->notifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
            return response()->json('1');
        }
})->name('mark_as_read');

Route::post('/mark_as_read_all_types/{types}', function($types){
    $types = explode(',', $types);
    foreach($types as $type) {
        $unreadNotifications = auth()->user()->unreadNotifications()->where('type', 'LIKE', '%'. $type . '%')->get();
            if ($unreadNotifications) {
                $unreadNotifications->markAsRead();
                return response()->json('1');
            }
    
    }
})->name('mark_as_read_all_types');


Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE'; //Return anything
});


    

Route::get('/faq', [FrontController::class, 'faq'])->name('faq');


Route::post('resend_sms', [UserController::class, 'resend_sms'])->name('front.resend_sms');
Route::post('remove_token', [UserController::class, 'remove_token'])->name('front.remove_token');


Route::get('/contract/{token}', [FrontController::class, 'contract'])->name('contract');
Route::post('/complete_contract/{token}', [FrontController::class, 'complete_contract'])->name('complete_contract');


Route::post('/payment/charge/{token}', [PaymentController::class, 'charge'])->name('charge');


Route::post('/storeUser', [UserController::class, 'storeUser'])->name('storeUser');
Route::get('/payment/paymentsuccess/{phone_token}', [PaymentController::class, 'paymentsuccess'])->name('paymentsuccess');
Route::get('/payment/paymenterror/{phone_token}', [PaymentController::class, 'paymenterror'])->name('paymenterror');


// Route::get('/register', [RegisterController::class, 'index'])->name('register');
// Route::post('/register', [RegisterController::class, 'store']);


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/admin_logout', [LoginController::class, 'admin_logout'])->name('admin.logout');
Route::get('/logout/{user}', [LoginController::class, 'logout'])->name('logout');
Route::get('/forget', [LoginController::class, 'forget'])->name('forget');
Route::post('/forget', [LoginController::class, 'resetPassword']);


Route::group(['middleware' => ['auth']], function() {
    
    Route::group(['middleware' => ['admin']], function() {
        
        Route::prefix('admin')->group(function () {
            
            Route::get('/home', [DashboardController::class, 'home'])->name('admin.dashboard.home');
            // Route::get('/calendar', [DashboardController::class, 'calendar'])->name('admin.dashboard.calendar'); not use for now
            
            Route::get('/users/logs', [UserController::class, 'logs'])->name('admin.logs');
            Route::get('/users/{user}/logs', [UserController::class, 'user_logs'])->name('admin.user.logs');
            
            
            Route::get('/users', [UserController::class, 'index'])->name('admin.users');
            Route::get('/users/create', [UserController::class, 'create'])->name('admin.users.create');
            
            Route::get('/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
            Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
            Route::patch('/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
            Route::delete('/users/{user}/delete', [UserController::class, 'delete'])->name('admin.users.delete');
            Route::post('/users/{user}/active', [UserController::class, 'active'])->name('admin.users.active');
            
            Route::post('/users/temp', [UserController::class, 'store_temp'])->name('admin.users.store_temp');
            Route::post('/send_sms', [UserController::class, 'send_sms'])->name('admin.send_sms');
            Route::post('/check_sign', [UserController::class, 'check_sign'])->name('admin.check_sign');
            Route::post('/save_user', [UserController::class, 'save_user'])->name('admin.save_user');
            
            
            
            Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses');
            Route::get('/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
            Route::post('/courses', [CourseController::class, 'store'])->name('admin.courses.store');
            Route::get('/courses/{course}', [CourseController::class, 'show'])->name('admin.courses.show');
            Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
            Route::patch('/courses/{course}', [CourseController::class, 'update'])->name('admin.courses.update');
            Route::delete('/courses/{course}/delete', [CourseController::class, 'delete'])->name('admin.courses.delete');
            Route::post('/courses/{course}/active', [CourseController::class, 'active'])->name('admin.courses.active');
            
            
            Route::get('/lessons', [LessonController::class, 'index'])->name('admin.lessons'); // all lessons for all courses
            Route::get('/lessons/courses/{course}', [LessonController::class, 'index_course'])->name('admin.lessons.course'); // all lessons for specified course
            Route::get('/lessons/create', [LessonController::class, 'create'])->name('admin.lessons.create');
            Route::post('/lessons', [LessonController::class, 'store'])->name('admin.lessons.store');
            Route::post('/lessons/ajax/store_with_questions', [LessonController::class, 'store_with_questions'])->name('admin.lessons.store_with_questions');
            Route::get('/lessons/{lesson}', [LessonController::class, 'show'])->name('admin.lessons.show');
            Route::get('/lessons/{lesson}/edit', [LessonController::class, 'edit'])->name('admin.lessons.edit');
            Route::patch('/lessons/{lesson}', [LessonController::class, 'update'])->name('admin.lessons.update');
            Route::patch('/lessons/{lesson}/update_with_questions', [LessonController::class, 'update_with_questions'])->name('admin.lessons.update_with_questions');
            
            Route::delete('/lessons/{lesson}/delete', [LessonController::class, 'delete'])->name('admin.lessons.delete');
            Route::post('/lessons/{lesson}/active', [LessonController::class, 'active'])->name('admin.lessons.active');
            Route::post('/lessons/courses/{course}/order', [LessonController::class, 'order'])->name('admin.lessons.order');
            
            Route::get('/questions', [QuestionController::class, 'index'])->name('admin.questions');
            Route::get('/questions/lesson/{lesson}', [QuestionController::class, 'index_lesson'])->name('admin.questions.lesson');
            Route::post('/questions', [QuestionController::class, 'store'])->name('admin.questions.store');
            Route::get('/questions/{question}/edit', [QuestionController::class, 'edit'])->name('admin.questions.edit');
            Route::patch('/questions/{question}', [QuestionController::class, 'update'])->name('admin.questions.update');
            Route::delete('/questions/{question}/delete', [QuestionController::class, 'delete'])->name('admin.questions.delete');
            Route::post('/questions/{question}/active', [QuestionController::class, 'active'])->name('admin.questions.active');
            Route::post('/questions/lessons/{lesson}/order', [QuestionController::class, 'order'])->name('admin.questions.order');
            Route::post('/questions/create_ajax_questions', [QuestionController::class, 'create_ajax_questions'])->name('admin.create_ajax_questions');
            
            
            Route::get('cu/create', [CouponController::class, 'create'])->name('cu.create');
            Route::get('cu/', [CouponController::class, 'coupons'])->name('cu.coupons');
            Route::post('cu/store', [CouponController::class, 'store'])->name('cu.store');
            Route::delete('cu/{coupon}/delete', [CouponController::class, 'delete'])->name('cu.delete');
            Route::post('cu/pivot/delete', [CouponController::class, 'pivot_delete'])->name('cu.pivot.delete');
            
            
            // // Route::get('cu/coupons/{coupon}', [CouponController::class, 'show'])->name('cu.coupons.show');
            // Route::get('cu/coupons/{coupon}/edit', [CouponController::class, 'edit'])->name('cu.coupons.edit');
            // Route::patch('cu/coupons/{coupon}', [CouponController::class, 'update'])->name('cu.coupons.update');
            // Route::post('cu/coupons/{coupon}/ajax_addusers', [CouponController::class, 'ajax_addusers'])->name('cu.coupons.ajax_addusers');
            // Route::post('cu/coupons/{coupon}/addusers', [CouponController::class, 'addusers'])->name('cu.coupons.addusers');
            
            // Route::get('cu/users', [CouponController::class, 'users'])->name('cu.users');
            // Route::post('/cu/users/{user}/ajax_addcoupons', [CouponController::class, 'ajax_addcoupons'])->name('cu.users.ajax_addcoupons');
            // Route::post('/cu/users/{user}/addcoupons', [CouponController::class, 'addcoupons'])->name('cu.users.addcoupons');
            
            
            Route::get('sales/index', [SaleController::class, 'index'])->name('sales');
            Route::delete('sales/{sale:name}/delete', [SaleController::class, 'delete'])->name('sales.delete');
            Route::post('sales/store', [SaleController::class, 'store'])->name('sales.store');
            Route::post('sales/add_course/{course}', [SaleController::class, 'add_course'])->name('sales.add_course');
            Route::post('sales/course_sale', [SaleController::class, 'course_sale'])->name('sales.course_sale');
            
            
            
            Route::get('emails', [EmailController::class, 'emails'])->name('emails');
            Route::get('emails/welcome', [EmailController::class, 'welcome'])->name('emails.welcome');
            Route::post('emails/send', [EmailController::class, 'send'])->name('emails.send');
            // Route::post('emails/register/{user_id}', [EmailController::class, 'register'])->name('admin.emails.register');
            
            
            Route::get('/emailtypes', [EmailtypeController::class, 'index'])->name('emailtypes');
            Route::post('/emailtypes/', [EmailtypeController::class, 'store'])->name('emailtypes.store');
            Route::patch('/emailtypes/{emailtype}', [EmailtypeController::class, 'update'])->name('emailtypes.update');
            Route::delete('/emailtypes/{emailtype}', [EmailtypeController::class, 'delete'])->name('emailtypes.delete');
            
            
            Route::get('/faqs', [FaqController::class, 'index'])->name('admin.faqs');
            Route::patch('/faqs/{faq}', [FaqController::class, 'update'])->name('admin.faqs.update');
            Route::post('/faqs', [FaqController::class, 'store'])->name('admin.faqs.store');
            Route::delete('/faqs/{faq}', [FaqController::class, 'delete'])->name('admin.faqs.delete');
            
            Route::get('/tests', [TestController::class, 'index'])->name('admin.tests');
            
            Route::get('/chat', [MessageController::class, 'index'])->name('admin.chat');
            Route::post('/chat/{user}', [MessageController::class, 'chat'])->name('admin.chat.chat');
            
            Route::get('/contacts', [ContactController::class, 'index'])->name('admin.contacts');
            
            Route::get('/contacts/history', [ContactController::class, 'history'])->name('admin.contacts.history');
            
            Route::get('/invoices', [InvoiceController::class, 'index'])->name('admin.invoices');
            
            
            Route::get('/homepages/edit', [HomepageController::class, 'edit'])->name('admin.homepages.edit');
            Route::patch('/homepages', [HomepageController::class, 'update'])->name('admin.homepages.update');
            
            
            Route::get('/contactus/show', [ContactusController::class, 'show'])->name('admin.contactus.show');
            Route::get('/contactus/edit', [ContactusController::class, 'edit'])->name('admin.contactus.edit');
            Route::patch('/contactus/update', [ContactusController::class, 'update'])->name('admin.contactus.update');
            
            Route::get('/aboutus/show', [AboutusController::class, 'show'])->name('admin.aboutus.show');
            Route::post('/aboutus', [AboutusController::class, 'create'])->name('admin.aboutus.create');
            Route::get('/aboutus/edit', [AboutusController::class, 'edit'])->name('admin.aboutus.edit');
            Route::patch('/aboutus/update', [AboutusController::class, 'update'])->name('admin.aboutus.update');
            
            Route::get('/otherpages/show', [OtherPageController::class, 'show'])->name('admin.otherpages.show');
            Route::post('/otherpages', [OtherPageController::class, 'create'])->name('admin.otherpages.create');
            Route::get('/otherpages/edit', [OtherPageController::class, 'edit'])->name('admin.otherpages.edit');
            Route::patch('/otherpages/update', [OtherPageController::class, 'update'])->name('admin.otherpages.update');
            
            Route::get('/contract/edit_content', [OtherPageController::class, 'edit_content'])->name('admin.contract.edit_content');
            Route::patch('/contract/update_content/{id}', [OtherPageController::class, 'update_content'])->name('admin.contract.update_content');
            
            
            Route::get('/banners/course', [BannerController::class, 'course'])->name('admin.banners.course');
            Route::patch('/banners/course/update', [BannerController::class, 'course_update'])->name('admin.banners.course.update');
            Route::get('/banners/post', [BannerController::class, 'post'])->name('admin.banners.post');
            Route::patch('/banners/post/update', [BannerController::class, 'post_update'])->name('admin.banners.post.update');
            
            Route::resource('footer', FooterController::class); //resourceful route, restful resource controller
            Route::post('/ajax_footer_published/{footer}', [FooterController::class, 'ajax_footer_published'])->name('ajax_footer_published');
            
            
            Route::resource('diploma', DiplomaController::class);
            Route::post('/ajax_diploma_upload/{diploma}', [DiplomaController::class, 'ajax_diploma_upload'])->name('ajax_diploma_upload');
            
            Route::get('/files', [FileController::class, 'index'])->name('admin.files');
            
            
            Route::get('/contracts', [ContractController::class, 'index'])->name('admin.contracts');
            Route::get('/pendings', [PendingController::class, 'index'])->name('admin.pendings');
            Route::get('/download_contract/{user}/{course}', [PdfController::class, 'admin_download_contract'])->name('admin.download_contract');
            
            
            Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
            Route::get('/posts/index', [PostController::class, 'admin_index'])->name('posts.admin_index');
            
            
            
            Route::post('/setting/coming_soon', [SettingController::class, 'coming_soon'])->name('setting.coming_soon');
            
            
        });
    
    });
    
    
    Route::prefix('client')->group(function () {
        Route::get('/ipcheck/{user}', [ClientController::class, 'ipcheck'])->name('ipcheck');
        Route::get('/{user}/home', [ClientController::class, 'dashboard'])->name('client.home');
        
        Route::get('users/{user}/profile', [ClientController::class, 'profile'])->name('client.profile');
        Route::get('/users/{user}/edit', [ClientController::class, 'edit'])->name('client.users.edit');
        Route::patch('/users/{user}', [ClientController::class, 'update'])->name('client.users.update');
        
        Route::get('/{user}/courses', [ClientController::class, 'courses'])->name('client.courses');
        Route::get('/{user}/chat', [MessageController::class, 'chat_user'])->name('client.chat');
        Route::get('/{user}/contact', [ClientController::class, 'contact'])->name('client.contact');
        Route::post('/{user}/contact_store', [ClientController::class, 'contact_store'])->name('client.contact.store');
        
        Route::get('/{user}/payment', [ClientController::class, 'paymnet'])->name('client.payment');
        
        Route::get('/{user}/diploma', [ClientController::class, 'diploma'])->name('client.diploma');
        
        Route::post('/{user}/check_coupon', [ClientController::class, 'check_coupon'])->name('check_coupon');
        
        Route::get('/{user}/download_invoice', [PdfController::class, 'download_invoice'])->name('client.download_invoice');
        Route::get('/{user}/courses/{course}/download_contract', [PdfController::class, 'download_contract'])->name('client.download_contract');
        
        
        
        Route::post('/{user}/courses/{course}/storeUser2', [UserController::class, 'storeUser2'])->name('storeUser2');
        
        Route::get('/{user}/tests/{lesson}', [TestController::class, 'show'])->name('client.tests.show');
        Route::post('/{user}/tests/{lesson}', [TestController::class, 'store'])->name('client.tests.store');
        Route::get('/lessons/{lesson}', [FrontController::class, 'lessondetail'])->name('lessondetail');
        
        
        
    });
    
    Route::post('messages/store', [MessageController::class, 'store'])->name('message.store');
    
});


Route::get('/', [FrontController::class, 'index'])->name('front');

Route::get('/contactus', [FrontController::class, 'contactus'])->name('contactus');
Route::get('/aboutus', [FrontController::class, 'aboutus'])->name('aboutus');
Route::get('/courses', [FrontController::class, 'courses'])->name('courses');
Route::get('/courses/{course}', [FrontController::class, 'coursedetail'])->name('coursedetail');

Route::post('/courses/{course}/reviews', [FrontController::class, 'store'])->name('course.reviews.store');


Route::get('/posts', [PostController::class, 'index'])->name('posts');

Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('posts/users/{user}', [PostController::class, 'indexOfUser'])->name('posts.ofUser');
Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
Route::post('/posts/{post}/dislike', [PostController::class, 'dislike'])->name('posts.dislike');

Route::get('/posts/{post}/comments', [CommentController::class, 'index'])->name('comments');



Route::post('/contacts', [ContactController::class, 'store'])->name('contacts');


Route::get('/stripe', [StripeController::class, 'stripe']);
Route::post('/stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
Route::get('/{slug}', [FrontController::class, 'static']);

Route::get('/{slug}', [FrontController::class, 'static']);

Route::fallback(function () {
    return view('errors.error404');
});











