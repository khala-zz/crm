<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\MailboxController;
use App\Http\Controllers\CalendarController;




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


Route::middleware(['auth']) -> prefix('/admin') -> group(function(){

	Route::get('/', function () {
		return view('pages.home.index');
	});
  Route::resource('/users', UsersController::class);
  Route::get('/my-profile', [UsersController::class, 'getProfile']);
  Route::get('/my-profile/edit', [UsersController::class, 'getEditProfile']);
  Route::patch('/my-profile/edit', [UsersController::class, 'postEditProfile']);
  //permission
  Route::resource('/permissions', PermissionsController::class);
  //role
  Route::resource('/roles', RolesController::class);

  Route::get('/users/role/{id}', [UsersController::class, 'getRole']);

  Route::put('/users/role/{id}', [UsersController::class, 'updateRole']);

  //documents
  Route::resource('/documents', DocumentsController::class);
  Route::get('/documents/{id}/assign', [DocumentsController::class, 'getAssignDocument']);
  Route::put('/documents/{id}/assign', [DocumentsController::class, 'postAssignDocument']);

  //contact
  Route::resource('/contacts', ContactsController::class);
  Route::get('/contacts/{id}/assign', [ContactsController::class, 'getAssignContact']);
  Route::put('/contacts/{id}/assign', [ContactsController::class, 'postAssignContact']);

  //task
  Route::get('/api/contacts/get-contacts-by-status', [ContactsController::class, 'getContactsByStatus']);
  Route::resource('/tasks', TasksController::class);
  Route::get('/tasks/{id}/assign', [TasksController::class, 'getAssignTask']);
  Route::put('/tasks/{id}/assign', [TasksController::class, 'postAssignTask']);
  Route::get('/tasks/{id}/update-status', [TasksController::class, 'getUpdateStatus']);
  Route::put('/tasks/{id}/update-status', [TasksController::class, 'postUpdateStatus']);

  //mailbox
  Route::get('/mailbox/{folder?}', [MailboxController::class, 'index']);
  Route::get('/mailbox-create', [MailboxController::class, 'create']);
  Route::post('/mailbox-create', [MailboxController::class, 'store']);
  Route::get('/mailbox-show/{id}', [MailboxController::class, 'show']);
  Route::put('/mailbox-toggle-important', [MailboxController::class, 'toggleImportant']);
  Route::delete('/mailbox-trash', [MailboxController::class, 'trash']);
  Route::get('/mailbox-reply/{id}', [MailboxController::class, 'getReply']);
  Route::post('/mailbox-reply/{id}', [MailboxController::class, 'postReply']);
  Route::get('/mailbox-forward/{id}', [MailboxController::class, 'getForward']);
  Route::post('/mailbox-forward/{id}', [MailboxController::class, 'postForward']);
  Route::get('/mailbox-send/{id}', [MailboxController::class, 'send']);

  //calendar
  Route::get('/calendar', [CalendarController::class, 'index']);

  Route::get('/forbidden', function () {
    return view('pages.forbidden.forbidden_area');
  });

});

Route::get('/', function () {
   return redirect()->to('/admin');
});

require __DIR__.'/auth.php';

// danh cho breeze
/*
Route::prefix('admin') -> group(function(){

	Route::get('/', function () {
    	return view('pages.home.index');
	});

	})
	->middleware(['auth'])->name('dashboard');

Route::get('/', function () {
   return redirect()->to('/admin');
});	

require __DIR__.'/auth.php';

*/

/*
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/', function () {
        return view('pages.home.index');
    });
});

Route::get('/', function () {
   return redirect()->to('/admin');
});

Auth::routes();*/
