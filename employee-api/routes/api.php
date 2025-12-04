<?php
use App\Http\Controllers\Api\DeviController;
use App\Http\Controllers\Api\AnnouncementController;
use App\Http\Controllers\Api\ArtController;
use App\Http\Controllers\Api\AudioController;
use App\Http\Controllers\Api\CandidateController;
use App\Http\Controllers\Api\CalenderController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\GradesController;
use App\Http\Controllers\Api\HomeworkController;
use App\Http\Controllers\Api\TickerController;

Route::get('/devi', [DeviController::class, 'index']);
Route::post('/devi', [DeviController::class, 'store']);
Route::get('/devi/{devi}', [DeviController::class, 'show']);
Route::put('/devi/{devi}', [DeviController::class, 'update']);
Route::delete('/devi/{devi}', [DeviController::class, 'destroy']);

Route::get('/announcement', [AnnouncementController::class, 'index']);
Route::post('/announcement', [AnnouncementController::class, 'store']);
Route::get('/announcement/{announcement}', [AnnouncementController::class, 'show']);
Route::put('/announcement/{announcement}', [AnnouncementController::class, 'update']);
Route::delete('/announcement/{announcement}', [AnnouncementController::class, 'destroy']);

Route::get('/art', [ArtController::class, 'index']);
Route::post('/art', [ArtController::class, 'store']);
Route::get('/art/{art}', [ArtController::class, 'show']);
Route::put('/art/{art}', [ArtController::class, 'update']);
Route::delete('/art/{art}', [ArtController::class, 'destroy']);

Route::get('/audio', [AudioController::class, 'index']);
Route::post('/audio', [AudioController::class, 'store']);
Route::get('/audio/{audio}', [AudioController::class, 'show']);
Route::put('/audio/{audio}', [AudioController::class, 'update']);
Route::delete('/audio/{audio}', [AudioController::class, 'destroy']);

Route::get('/candidate', [CandidateController::class, 'index']);
Route::post('/candidate', [CandidateController::class, 'store']);
Route::get('/candidate/{candidate}', [CandidateController::class, 'show']);
Route::put('/candidate/{candidate}', [CandidateController::class, 'update']);
Route::delete('/candidate/{candidate}', [CandidateController::class, 'destroy']);

Route::get('/calender', [CalenderController::class, 'index']);
Route::post('/calender', [CalenderController::class, 'store']);
Route::get('/calender/{calender}', [CalenderController::class, 'show']);
Route::put('/calender/{calender}', [CalenderController::class, 'update']);
Route::delete('/calender/{calender}', [CalenderController::class, 'destroy']);

Route::get('/employee', [EmployeeController::class, 'index']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::get('/employee/{employee}', [EmployeeController::class, 'show']);
Route::put('/employee/{employee}', [EmployeeController::class, 'update']);
Route::delete('/employee/{employee}', [EmployeeController::class, 'destroy']);

Route::get('/grades', [GradesController::class, 'index']);
Route::post('/grades', [GradesController::class, 'store']);
Route::get('/grades/{grades}', [GradesController::class, 'show']);
Route::put('/grades/{grades}', [GradesController::class, 'update']);
Route::delete('/grades/{grades}', [GradesController::class, 'destroy']);

Route::get('/homework', [HomeworkController::class, 'index']);
Route::post('/homework', [HomeworkController::class, 'store']);
Route::get('/homework/{homework}', [HomeworkController::class, 'show']);
Route::put('/homework/{homework}', [HomeworkController::class, 'update']);
Route::delete('/homework/{homework}', [HomeworkController::class, 'destroy']);

Route::get('/ticker', [TickerController::class, 'index']);
Route::post('/ticker', [TickerController::class, 'store']);
Route::get('/ticker/{ticker}', [TickerController::class, 'show']);
Route::put('/ticker/{ticker}', [TickerController::class, 'update']);
Route::delete('/ticker/{ticker}', [TickerController::class, 'destroy']);

Route::get('/test', function() {
    return response()->json([
        'success' => true,
        'message' => 'API is working!',
        'lesson' => 'Models and Controllers',
        'database_connection' => 'OK',
        'endpoints' => [
            'GET /iot-devices' => 'Get all devices',
            'GET /iot-devices/{id}' => 'Get device by ID',
            'POST /iot-devices' => 'Create new device',
            'PUT /iot-devices/update/{id}' => 'Update device',
            'PUT /iot-devices/toggle/{id}' => 'Toggle device activity',
            'DELETE /iot-devices/{id}' => 'Delete device'
        ],
        'endpoints-2' => [
            'GET /announcements' => 'Get all announcements',
            'GET /announcements/{id}' => 'Get announcement by ID',
            'POST /announcements' => 'Create new announcement',
            'PUT /announcements/{id}' => 'Update announcement',
            'DELETE /announcements/{id}' => 'Delete announcement'
        ],
        'endpoints-3' => [
            'GET /stock-tickers' => 'Get all tickers',
            'GET /stock-tickers/{symbol}' => 'Get ticker by symbol',
            'POST /stock-tickers' => 'Create new ticker',
            'PUT /stock-tickers/{symbol}' => 'Update ticker',
            'DELETE /stock-tickers/{symbol}' => 'Delete ticker'
        ],
        'endpoints-4' => [
            'GET /audios' => 'Get all audios',
            'GET /audios/{id}' => 'Get audio by ID',
            'POST /audios' => 'Create new audio',
            'PUT /audios/{id}' => 'Update audio',
            'DELETE /audio/{id}' => 'Delete audio'
        ],
        'endpoints-5' => [
            'GET /arts' => 'Get all arts',
            'GET /arts/{id}' => 'Get art by ID',
            'POST /arts' => 'Create new art',
            'PUT /arts/{id}' => 'Update art',
            'DELETE /arts/{id}' => 'Delete art'
        ],
        'endpoints-6' => [
            'GET /candidates' => 'Get all candidates',
            'GET /candidates/{id}' => 'Get candidate by ID',
            'POST /candidates' => 'Create new candidate',
            'PUT /candidates/{id}' => 'Update candidate',
            'DELETE /candidates/{id}' => 'Delete candidate'
        ],
        'endpoints-7' => [
            'GET /dates' => 'Get all dates',
            'GET /dates/{id}' => 'Get date by ID',
            'POST /dates' => 'Create new date',
            'PUT /dates/{id}' => 'Update date',
            'DELETE /dates/{id}' => 'Delete date'
        ],
        'endpoints-8' => [
            'GET /grades' => 'Get all grades',
            'GET /grades/{id}' => 'Get grade by ID',
            'POST /grades' => 'Create new grade',
            'PUT /grades/{id}' => 'Update grade',
            'DELETE /grades/{id}' => 'Delete grade'
        ],
        'bearer-endpoints-1' => [
            'GET /employees' => 'Get all employees',
            'GET /employees/{id}' => 'Get employee by ID',
            'POST /employees' => 'Create new employee',
            'PUT /employees/{id}' => 'Update employee',
            'DELETE /employees/{id}' => 'Delete employee'
        ],
        'bearer-endpoints-2' => [
            'GET /homeworks' => 'Get all homeworks',
            'GET /homeworks/{id}' => 'Get homework by ID',
            'POST /homeworks' => 'Create new homework',
            'PUT /homeworks/{id}' => 'Update homework',
            'DELETE /homeworks/{id}' => 'Delete homework'
        ]
    ]);
});
