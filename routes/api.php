use App\Http\Controllers\SummarizeController;

Route::post('/summarize', [SummarizeController::class, 'summarize']);
