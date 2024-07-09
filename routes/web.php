<?php


use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyHistoryController;
use App\Http\Controllers\CompanyStructureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\LicenseController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SystemTeamController;
use App\Http\Controllers\TaskMissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|-----------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
|-------------------------------------------------------------
| Login
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');


Route::get('/',[MainController::class, 'frontIndex'])->name('index');
Route::get('/news', [MainController::class,  'frontNews'])->name('front.news');
Route::get('/affiliated_persons',[MainController::class,  'frontAffiliatedPersons'])->name('front.affiliated_persons');
Route::get('/about', [MainController::class, 'front_about'])->name('front.about');
Route::get('/assignments',[MainController::class,  'frontAssignments'])->name('front.assignments');
Route::get('/management', [MainController::class, 'frontManagement'])->name('front.management');
Route::get('/services',[MainController::class, 'frontServices'])->name('front.services');
Route::get('/partners', [MainController::class, 'frontPartners'])->name('front.partners');
Route::get('/report', [MainController::class, 'frontReport'])->name('front.report');
Route::get('/company_history', [MainController::class, 'frontCompanyHistory'])->name('front.company_history');
Route::get('/company_strategy',[MainController::class,  'frontCompanyStrategy'])->name('front.company_strategy');
Route::get('/jismoniy',[MainController::class,  'frontJismoniy'])->name('front.jismoniy');
Route::get('/audit_summary',[MainController::class,  'frontAuditSummary'])->name('front.audit_summary');
Route::get('/financial_indicators',[MainController::class,  'frontFinancialIndicators'])->name('front.financial_indicators');
Route::get('/important_facts',[MainController::class,  'frontImportantFacts'])->name('front.important_facts');
Route::get('/licences',[MainController::class,  'frontLicences'])->name('front.licences');
Route::get('/ustav',[MainController::class,  'frontUstav'])->name('front.ustav');
Route::get('/yuridik',[MainController::class,  'frontYuridik'])->name('front.yuridik');
Route::get('/police_check', [MainController::class, 'frontPoliceCheck'])->name('front.police_check');
Route::get('/polls', [MainController::class, 'frontPolls'])->name('front.polls');
Route::get('/contact', [MainController::class, 'frontContact'])->name('front.contact');
Route::get('/galarea', [MainController::class,  'frontGaleriya'])->name('front.galeriya');
Route::get('/jobs', [MainController::class, 'front_jobs'])->name('front.jobs');
Route::get('/buy_shares', [MainController::class, 'frontBuyShares'])->name('front.buy_shares');
Route::get('/applications', [MainController::class, 'frontApplications'])->name('front.applications');
Route::get('/corporative_management', [MainController::class, 'frontCorporativeManagement'])->name('front.corporative_management');
Route::get('/yuridik_serficate', [MainController::class, 'frontYuridikSerficate'])->name('front.yuridik_serficate');
/*
|----------------------------------------------------------
| Adminlar ko'raoladigan qism
|--------------------------------------------------------------------------
*/

Route::middleware(['checkRole:admin', 'auth'])->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [AdminController::class, 'admin'])->name('admin');
        Route::resource('/home', HomeController::class);
        Route::resource('/about', AboutController::class);
        Route::resource('/partner', PartnerController::class);
        //Route::resource('/license', LicenseController::class);
        Route::resource('/company_history', CompanyHistoryController::class);
        Route::resource('/service', ServiceController::class);
        Route::resource('/system_team', SystemTeamController::class);
        Route::resource('/news', NewsController::class);
        Route::resource('/company_structure', CompanyStructureController::class);
        Route::resource('/mission', TaskMissionController::class);
        Route::resource('/information', InformationController::class);
        Route::resource('/post', PostController::class);
        Route::get('/profile', [UserController::class, 'index'])->name('user-index');
        Route::resource('/profile', UserController::class);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });
});


/*
|--------------------------------------------------------------------------
| Barcha foydalanuvshilar ko'raoladigan qism
|-------------------------------------------------------------
*/

//Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/{lang}', function ($lang){

    session(['lang' => $lang]);

    return back();
});
