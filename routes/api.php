<?php
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\Location\DistrictController;
use App\Http\Controllers\Api\Location\DivisionController;
use App\Http\Controllers\Api\Location\UnionController;
use App\Http\Controllers\Api\Location\UpazilaController;
use App\Http\Controllers\Api\PeoplelistController;
use App\Http\Controllers\Api\PolllistController;
use App\Http\Controllers\Api\Search\PeoplesearchController;
use App\Http\Controllers\Api\User\Follower\FollowerController;
use App\Http\Controllers\Api\User\Poll\PollattendanceController;
use App\Http\Controllers\Api\User\Poll\PolloptionController;
use App\Http\Controllers\Api\User\Post\PostController;
use App\Http\Controllers\Api\User\Post\PostlikeController;
use App\Http\Controllers\Api\User\ProfileController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function(){
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::middleware('auth:sanctum')->group(function(){
        // User Info
        Route::get('/info', function(Request $request){
            $user =User::withCount('followers')->firstWhere('id', $request->user()->id);
            return response()->json($user);
        });
        // Profile
        Route::post('profile/name', [ProfileController::class, 'name']);
        Route::post('profile/avatar', [ProfileController::class, 'avatar']);
        Route::post('profile/address', [ProfileController::class, 'address']);

        Route::post('post/store', [PostController::class, 'store']);
        Route::post('post/like/{id}', [PostlikeController::class, 'postLike']);
        // Poll
        Route::post('poll/option/attendance/{id}', [PollattendanceController::class, 'pollStore']);
        // Follow
        Route::get('followers', [FollowerController::class, 'followerList']);
        Route::get('following', [FollowerController::class, 'followwingList']);
        Route::post('follow/{id}', [FollowerController::class, 'followRequest']);
        Route::get('/follow/suggestion', [PeoplelistController::class, 'suggestionPeople']);

    });
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'singlePost']);
Route::get('/polls', [PolllistController::class, 'index']);
Route::get('/poll/option/{id}', [PolloptionController::class, 'pollOptionById']);
// Follwing People
Route::get('/people', [PeoplelistController::class, 'index']);
Route::get('/people/post/{id}', [PostController::class, 'peoplePost']);
Route::get('/people/{id}', [PeoplelistController::class, 'singlePeople']);
// Location
Route::get('/divisions', [DivisionController::class, 'divisionList']);
Route::get('/districts', [DistrictController::class, 'districtList']);
Route::get('/upazilas', [UpazilaController::class, 'upazilaList']);
Route::get('/unions', [UnionController::class, 'unionList']);
// Searching people
Route::get('/people/search/{name}', [PeoplesearchController::class, 'searchPeople']);
