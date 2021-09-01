<?php

namespace App\Http\Controllers;

use App\Models\Graduate;
use App\Models\District;
use App\Models\DsDivision;
use App\Models\ElectorateDivision;
use App\Models\GnDivision;
use App\Models\Vacancy;
use App\Models\User;
use App\Models\university;
use App\Models\ServiceCategory;
use App\Models\Sector;
use App\Models\Notification;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function allCount()
    {
        function districtCount()
        {
            $dist_count = District::all();
            $count = $dist_count->count();
            return $count;
        }

        function dsCount()
        {
            $ds_count = DsDivision::all();
            $count = $ds_count->count();
            return $count;
        }

        function electDivCount()
        {
            $elect_count = ElectorateDivision::all();
            $count = $elect_count->count();
            return $count;
        }

        function gnCount()
        {
            $gn_count = GnDivision::all();
            $count = $gn_count->count();
            return $count;
        }

        function gradCount()
        {
            $grad_count = \DB::table('graduates')
                // ->where('deleted_at' == 'null')
                ->get();
            $count = $grad_count->count();
            return $count;
        }

        function PendinGradCount()
        {
            $pending_grad_count = \DB::table('graduates')
                ->where('status', '=', 0)
                // ->where('deleted_at' == null)
                ->get();
            $count = $pending_grad_count->count();
            return $count;
        }

        function approvedGradCount()
        {
            $approved_grad_count = \DB::table('graduates')
                ->where('status', '=', 1)
                // ->where('deleted_at' == null)
                ->get();
            $count = $approved_grad_count->count();
            return $count;
        }

        function sectCount()
        {
            $sect_count = Sector::all();
            $count = $sect_count->count();
            return $count;
        }

        function serveCatCount()
        {
            $serve_cat_count = ServiceCategory::all();
            $count = $serve_cat_count->count();
            return $count;
        }

        function universityCount()
        {
            $uni_count = university::all();
            $count = $uni_count->count();
            return $count;
        }

        function vacancyCount()
        {
            $vacancy_count = Vacancy::all();
            $count = $vacancy_count->count();
            return $count;
        }
        $dist = districtCount();
        $ds = dsCount();
        $elect = electDivCount();
        $gn = gnCount();
        $graduate = gradCount();
        $pending_grad = PendinGradCount();
        $approved_grad = approvedGradCount();
        $sector = sectCount();
        $serv_cat = serveCatCount();
        $university = universityCount();
        $vacancy = vacancyCount();

        $all_count = [
            'district_count' =>  $dist,
            'ds_count' => $ds,
            'elect-count' => $elect,
            'gn_count' => $gn,
            'graduate_count' =>  $graduate,
            'pending_graduate' => $pending_grad,
            'approved_graduate' => $approved_grad,
            'sector' => $sector,
            'serve_cat' => $serv_cat,
            'university' => $university,
            'vacancy_count' => $vacancy,
        ];

        return $all_count;
    }
}
