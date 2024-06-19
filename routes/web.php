<?php
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
// use Illuminate\Foundation\Auth\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/email/verify',function(){
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}',function(EmailVerificationRequest $request){
//     $request->fulfill();
//     return redirect('/profile');

// })->middleware(['auth','signed'])->name('verification.verify');

// Route::post('/email/verification-notification',function(Request $request){
//     $request->user()->sendEmailVerificationNotification();
//     return back()->with('message','Verification link sent!');

// })->middleware(['auth','throttle:6,1'])->name('verification.send');


// Route::get('/blogs',);
// Route::get('/blogs/{blogs}',);
// Route::get('/blogs/create',);
// Route::post('/blogs',);

 Route::post('/blogs/{blog}/comment',[CommentController::class,'store'])->name('blogs.comment.store');
 Route::get('blogs/{uuid}/comments', [CommentController::class, 'show'])->name('comments.show');
 Route::post('blogs/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::resource('/blogs',BlogsController::class)->middleware(['auth']);
Route::resource('/comment',CommentController::class)->middleware(['auth']);


require __DIR__.'/auth.php';
