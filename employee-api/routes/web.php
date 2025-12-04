<?php

use App\Http\Controllers\DeviController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ArtController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GradesController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\TickerController;

Route::get('/', function () {
    return '<h1>my apis</h1>
            
            <ul>
                <li><a href="/devi">View All devi</a></li>
                <li><a href="/devi/create">Add New devi</a></li>

                <li><a href="/announcement">View All announcement</a></li>
                <li><a href="/announcement/create">Add New announcement</a></li>  
                
                <li><a href="/art">View All art</a></li>
                <li><a href="/art/create">Add New art</a></li>

                <li><a href="/audio">View All audio</a></li>
                <li><a href="/audio/create">Add New audio</a></li>

                <li><a href="/candidate">View All candidate</a></li>
                <li><a href="/candidate/create">Add New candidate</a></li>

                <li><a href="/calender">View All calender</a></li>
                <li><a href="/calender/create">Add New calender</a></li>

                <li><a href="/employee">View All employee</a></li>
                <li><a href="/employee/create">Add New employee</a></li>

                <li><a href="/grades">View All grades</a></li>
                <li><a href="/grades/create">Add New grades</a></li>

                <li><a href="/homework">View All homework</a></li>
                <li><a href="/homework/create">Add New homework</a></li>

                <li><a href="/ticker">View All ticker</a></li>
                <li><a href="/ticker/create">Add New ticker</a></li>
            </ul>';
});


Route::get('/devi', [DeviController::class, 'index'])->name('devi.index');
Route::get('/devi/create', [DeviController::class, 'create'])->name('devi.create');
Route::post('/devi', [DeviController::class, 'store'])->name('devi.store');
Route::get('/devi/{devi}', [DeviController::class, 'show'])->name('devi.show');
Route::put('/devi/{devi}', [DeviController::class, 'update'])->name('devi.update');
Route::delete('/devi/{devi}', [DeviController::class, 'destroy'])->name('devi.destroy');

Route::get('/announcement', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/create', [AnnouncementController::class, 'create'])->name('announcement.create');
Route::post('/announcement', [AnnouncementController::class, 'store'])->name('announcement.store');
Route::get('/announcement/{announcement}', [AnnouncementController::class, 'show'])->name('announcement.show');
Route::get('/announcement/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcement.edit');
Route::put('/announcement/{announcement}', [AnnouncementController::class, 'update'])->name('announcement.update');
Route::delete('/announcement/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcement.destroy');

Route::get('/art', [ArtController::class, 'index'])->name('art.index');
Route::get('/art/create', [ArtController::class, 'create'])->name('art.create');
Route::post('/art', [ArtController::class, 'store'])->name('art.store');
Route::get('/art/{art}', [ArtController::class, 'show'])->name('art.show');
Route::get('/art/{art}/edit', [ArtController::class, 'edit'])->name('art.edit');
Route::put('/art/{art}', [ArtController::class, 'update'])->name('art.update');
Route::delete('/art/{art}', [ArtController::class, 'destroy'])->name('art.destroy');

Route::get('/audio', [AudioController::class, 'index'])->name('audio.index');
Route::get('/audio/create', [AudioController::class, 'create'])->name('audio.create');
Route::post('/audio', [AudioController::class, 'store'])->name('audio.store');
Route::get('/audio/{audio}', [AudioController::class, 'show'])->name('audio.show');
Route::get('/audio/{audio}/edit', [AudioController::class, 'edit'])->name('audio.edit');
Route::put('/audio/{audio}', [AudioController::class, 'update'])->name('audio.update');
Route::delete('/audio/{audio}', [AudioController::class, 'destroy'])->name('audio.destroy');

Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate.index');
Route::get('/candidate/create', [CandidateController::class, 'create'])->name('candidate.create');
Route::post('/candidate', [CandidateController::class, 'store'])->name('candidate.store');
Route::get('/candidate/{candidate}', [CandidateController::class, 'show'])->name('candidate.show');
Route::get('/candidate/{candidate}/edit', [CandidateController::class, 'edit'])->name('candidate.edit');
Route::put('/candidate/{candidate}', [CandidateController::class, 'update'])->name('candidate.update');
Route::delete('/candidate/{candidate}', [CandidateController::class, 'destroy'])->name('candidate.destroy');

Route::get('/calender', [CalenderController::class, 'index'])->name('calender.index');
Route::get('/calender/create', [CalenderController::class, 'create'])->name('calender.create');
Route::post('/calender', [CalenderController::class, 'store'])->name('calender.store');
Route::get('/calender/{calender}', [CalenderController::class, 'show'])->name('calender.show');
Route::get('/calender/{calender}/edit', [CalenderController::class, 'edit'])->name('calender.edit');
Route::put('/calender/{calender}', [CalenderController::class, 'update'])->name('calender.update');
Route::delete('/calender/{calender}', [CalenderController::class, 'destroy'])->name('calender.destroy');

Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/employee/create', [EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employee', [EmployeeController::class, 'store'])->name('employee.store');
Route::get('/employee/{employee}', [EmployeeController::class, 'show'])->name('employee.show');
Route::get('/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('employee.edit');
Route::put('/employee/{employee}', [EmployeeController::class, 'update'])->name('employee.update');
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy'])->name('employee.destroy');

Route::get('/grades', [GradesController::class, 'index'])->name('grades.index');
Route::get('/grades/create', [GradesController::class, 'create'])->name('grades.create');
Route::post('/grades', [GradesController::class, 'store'])->name('grades.store');
Route::get('/grades/{grades}', [GradesController::class, 'show'])->name('grades.show');
Route::get('/grades/{grades}/edit', [GradesController::class, 'edit'])->name('grades.edit');
Route::put('/grades/{grades}', [GradesController::class, 'update'])->name('grades.update');
Route::delete('/grades/{grades}', [GradesController::class, 'destroy'])->name('grades.destroy');

Route::get('/homework', [HomeworkController::class, 'index'])->name('homework.index');
Route::get('/homework/create', [HomeworkController::class, 'create'])->name('homework.create');
Route::post('/homework', [HomeworkController::class, 'store'])->name('homework.store');
Route::get('/homework/{homework}', [HomeworkController::class, 'show'])->name('homework.show');
Route::get('/homework/{homework}/edit', [HomeworkController::class, 'edit'])->name('homework.edit');
Route::put('/homework/{homework}', [HomeworkController::class, 'update'])->name('homework.update');
Route::delete('/homework/{homework}', [HomeworkController::class, 'destroy'])->name('homework.destroy');

Route::get('/ticker', [TickerController::class, 'index'])->name('ticker.index');
Route::get('/ticker/create', [TickerController::class, 'create'])->name('ticker.create');
Route::post('/ticker', [TickerController::class, 'store'])->name('ticker.store');
Route::get('/ticker/{ticker}', [TickerController::class, 'show'])->name('ticker.show');
Route::get('/ticker/{ticker}/edit', [TickerController::class, 'edit'])->name('ticker.edit');
Route::put('/ticker/{ticker}', [TickerController::class, 'update'])->name('ticker.update');
Route::delete('/ticker/{ticker}', [TickerController::class, 'destroy'])->name('ticker.destroy');