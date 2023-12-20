<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    $user = request()->user();
    if ($user->role == 'S') return redirect('/student/dashboard');
    else if ($user->role == 'E') return redirect('/evaluator/dashboard');
    else return redirect('/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin_dashboard');
    })->name('admin.dashboard');

    Route::get('/project/{id?}', function ($id=null) {
        return view('admin_project_details', ['id' => $id]);
    })->name('admin.project.details');
});

// Evaluator Routes
Route::prefix('evaluator')->group(function () {
    Route::get('/dashboard', function () {
        return view('eval_dashboard');
    })->name('evaluator.dashboard');

    Route::get('/project/{id?}', function ($id=null) {
        return view('eval_view_project', ['id' => $id]);
    })->name('evaluator.view.details');
});

// Student Routes
Route::prefix('student')->group(function () {
    Route::get('/dashboard', function () {
        $user = request()->user();
        $project = App\Models\Project::where('member1_id', '=', $user->id, 'OR', 'member2_id', '=', $user->id, 'OR', 'member3_id', '=', $user->id)->first();
        return view('student_dashboard', ['project' => $project]);
    })->name('student.dashboard');
    
    Route::get('/project/edit/{id?}', function ($id = null) {
        $project = App\Models\Project::find($id);
        $categories = App\Models\Category::all();
        return view('student_edit_project_detail', ['id' => $id, 'project' => $project, 'categories' => $categories]);
    })->name('student.edit.project.detail');
    
    Route::put('/project/edit/{id?}', function ($id = null) {
        $project = App\Models\Project::find($id);
        $project->name = request()->project_name;
        $project->detail = request()->project_detail;
        $project->category_id = request()->category_id;
        $project->save();
        return redirect('/dashboard');
    })->name('student.edit.project.detail');
});

require __DIR__.'/auth.php';
