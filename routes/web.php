<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Http\Controllers\SendMailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    // return view('dashboard');
    return redirect()->route('mail-form');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Auth Users Can Send Mail
Route::middleware('auth')->group(function () {

    // Mail form
    Route::get('mail', function (){
        return view('message.mail-form');
    })->name('mail-form');

    // Template Mail
    Route::get('send', function(Request $request){
        echo "Sending mail...<br><br>";

        if($request->has(['email', 'subject', 'message'])){

            // Validate request data
            $data = $request->validate([
                'email' => ['required','email','max:50'],
                'subject' => ['required','string','max:50'],
                'message' => ['required','string','max:555'],
            ]);
        }else{

            $data = [
                'email' => 'africantechnology360@gmail.com',
                'subject' => 'Send Mail In Laravel',
                'message' => 'User validation fails!',
            ];
        }
        \Mail::to($data['email'])->queue(new SendMail($data));
        
        foreach($data as $key => $value){
            echo $key . ": " . $value . "<br>";
        }
        echo "<br>" . now()->diffForHumans() . "<br>";

        return (new Sendmail($data))->render();

    })->name('send');

    // Markdown Mail
    Route::get('send/markdown', [SendMailController::class, 'send'])->name('send-mail');

});





require __DIR__.'/auth.php';
