<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function frontIndex()
    {
        return view('front.index');
    }

    public function frontNews(){
        return view('front.news');
    }

    public function frontAffiliatedPersons(){
        return view('front.affiliated_persons');
    }

    public function front_about(){
        return view('front.about');
    }

    public function frontAssignments(){
        return view('front.assignments');
    }

    public function frontManagement(){
        return view('front.management');
    }

    public function frontServices(){
        return view('front.services');
    }

    public function frontPartners(){
        return view('front.partners');
    }

    public function frontReport(){
        return view('front.report');
    }

    public function frontCompanyHistory(){
        return view('front.company_history');
    }

    public function frontCompanyStrategy(){
        return view('front.company_strategy');
    }

    public function frontJismoniy(){
        return view('front.jismoniy');
    }

    public function frontAuditSummary(){
        return view('front.audit_summary');
    }

    public function frontFinancialIndicators(){
        return view('front.financial_indicators');
    }

    public function frontImportantFacts(){
        return view('front.important_facts');
    }

    public function frontLicences(){
        return view('front.licences');
    }

    public function frontUstav(){
        return view('front.usatv');
    }

    public function frontYuridik(){
        return view('front.yuridik');
    }

    public function frontPoliceCheck(){
        return view('front.police_check');
    }

    public function frontPolls(){
        return view('front.polls');
    }

    public function frontContact(){
        return view('front.contact');
    }

    public function frontGaleriya(){
        return view('front.galeriya');
    }
    public function front_jobs(){
        return view('front.jobs');
    }

    public function frontBuyShares(){
        return view('front.buy_shares');
    }

    public function frontApplications(){
        return view('front.applications');
    }

    public function  frontCorporativeManagement(){
        return view('front.corporative_management');
    }

    public function frontYuridikSerficate(){
        return view('front.yuridik_serficate');
    }
}
