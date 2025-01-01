<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Listing;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {

        $todaySalesSum = Booking::where('is_deleted', '0')
        ->whereDate('created_at', Carbon::today())
        ->sum('payment_value');

        $todayOrderCount = Booking::where('is_deleted', '0')
        ->whereDate('created_at', Carbon::today())
        ->count();

        $todayCustomerCount = User::where('role', 'user')
        ->where('is_deleted', '0')
        ->whereDate('created_at', Carbon::today())
        ->count();
    
        $todayPropertyCount = Listing::where('is_deleted', '0')
        ->whereDate('created_at', Carbon::today())
        ->count();
    
       
    
        
        
        // yesterday results
        $yesterdaySalesSum = Booking::where('is_deleted', '0')
        ->whereDate('created_at', Carbon::yesterday())
        ->sum('payment_value');


        $yesterdayOrderCount = Booking::where('is_deleted', '0')
        ->whereDate('created_at', Carbon::yesterday())
        ->count();


        $yesterdayCustomerCount = User::where('role', 'user')
        ->where('is_deleted', '0')
        ->whereDate('created_at', Carbon::yesterday())
        ->count();
    
        $yesterdayPropertyCount = Listing::where('is_deleted', '0')
        ->whereDate('created_at', Carbon::yesterday())
        ->count();
    

    
        $salesChange = $this->calculatePercentageChange($todaySalesSum, $yesterdaySalesSum);
        $orderChange = $this->calculatePercentageChange($todayOrderCount, $yesterdayOrderCount);
        $customerChange = $this->calculatePercentageChange($todayCustomerCount, $yesterdayCustomerCount);
        $propertyChange = $this->calculatePercentageChange($todayPropertyCount, $yesterdayPropertyCount);
    


         //canvas-1: Order Fulfillment Time Data
        $monthlyFulfillmentTimes = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(TIMESTAMPDIFF(SECOND, checkin, checkout)) / (60 * 60 * 24) as total_fulfillment_time_in_days') 
        )
        ->whereNotNull('checkout')
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy('month')
        ->get();
        
        $totalFulfillmentTimes = [];
        for ($i = 1; $i <= 12; $i++) {
            // Store the total fulfillment time for each month, or 0 if no data is available
            $totalFulfillmentTimes[] = $monthlyFulfillmentTimes->firstWhere('month', $i)
                                                          ? $monthlyFulfillmentTimes->firstWhere('month', $i)->total_fulfillment_time_in_days
                                                          : 0;
        }

         //canvas-2:Bookings by Governorate
        $allGovernorates = ['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Mafraq', 'Karak', 'Maan', 'Ajloun', 'Balqa', 'Jerash', 'Tafilah', 'Madaba'];
        $governorateCounts = [];
        $userGovernorateCounts = [];

        // Fetch the order counts by governorate
        $governorateData = Booking::join('listings', 'Bookings.listing_id', '=', 'listings.id')
        ->select('listings.governorate', DB::raw('COUNT(*) as count'))
        ->where('listings.is_deleted', '0')
        ->where('Bookings.is_deleted', '0')
        ->groupBy('listings.governorate')
        ->orderBy('listings.governorate')
        ->get();

         // Fetch the user counts by governorate
         $userGovernorateData = User::select('governorate', DB::raw('COUNT(*) as count'))
         ->where('is_deleted', '0')
         ->where('role', 'user')
         ->groupBy('governorate')
         ->orderBy('governorate')
         ->get();

        foreach ($allGovernorates as $governorate) {
            // Add order counts by governorate
            $governorateCounts[$governorate] = $governorateData->firstWhere('governorate', $governorate) 
                                               ? $governorateData->firstWhere('governorate', $governorate)->count 
                                               : 0;
            // Add user counts by governorate
            $userGovernorateCounts[$governorate] = $userGovernorateData->firstWhere('governorate', $governorate) 
                                                    ? $userGovernorateData->firstWhere('governorate', $governorate)->count 
                                                    : 0;
        }
        $userGovernorateLabels = array_keys($userGovernorateCounts);
        $userGovernorateCounts = array_values($userGovernorateCounts);


        //canvas-3:Sales

        $sales = Booking::where('is_deleted', '0')
                        ->selectRaw('MONTH(created_at) as month, SUM(payment_value) as total_sales')
                        ->whereDate('created_at', Carbon::today())
                        ->groupBy('month')
                        ->get();
    
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $salesData = array_fill(0, 12, 0);
    
        foreach ($sales as $sale) {
            $salesData[$sale->month - 1] = $sale->total_sales;
        }
    

       
    
       
    
//canvas-4:Users Governorate
    
        $governorateLabels = array_keys($governorateCounts);
        $governorateCounts = array_values($governorateCounts);
    
    
    
        
        
    
        return view('dashboard.index', compact(
            'todayCustomerCount', 'todayPropertyCount', 'todayOrderCount', 'todaySalesSum',
            'yesterdayCustomerCount', 'yesterdayPropertyCount', 'yesterdayOrderCount', 'yesterdaySalesSum',
            'customerChange', 'propertyChange', 'orderChange', 'salesChange',
            'salesData', 'months',
            'governorateLabels', 'governorateCounts',
            'userGovernorateLabels', 'userGovernorateCounts', // Added these
            'totalFulfillmentTimes'
        ));
    }
    

    private function calculatePercentageChange($todayValue, $yesterdayValue)
    {
        if ($yesterdayValue == 0) {
            return $todayValue == 0 ? 0 : 100;
        }
        return (($todayValue - $yesterdayValue) / $yesterdayValue) * 100;
    }
}
