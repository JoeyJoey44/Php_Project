namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DeepSeekService;

class SummarizeController extends Controller
{
    public function summarize(Request $request, DeepSeekService $deepSeek)
    {
        $request->validate([
            'text' => 'required|string'
        ]);

        $summary = $deepSeek->summarize($request->input('text'));

        return response()->json([
            'summary' => $summary
        ]);
    }
}
