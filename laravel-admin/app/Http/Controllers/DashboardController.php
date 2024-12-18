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
        $todayCustomerCount = User::where('role', 'user')
                                  ->where('is_deleted', '0')
                                  ->whereDate('created_at', Carbon::today())
                                  ->count();

        $todayPropertyCount = Listing::where('is_deleted', '0')
                                ->whereDate('created_at', Carbon::today())
                                ->count();

        $todayOrderCount = Booking::where('is_deleted', '0')
                                ->whereDate('created_at', Carbon::today())
                                ->count();

                                $todaySalesSum = Booking::where('is_deleted', '0')
                                ->whereDate('created_at', Carbon::today())
                                ->sum('payment_value');
        
//comments
        $yesterdayCustomerCount = User::where('role', 'user')
                                      ->where('is_deleted', '0')
                                      ->whereDate('created_at', Carbon::yesterday())
                                      ->count();

        $yesterdayPropertyCount = Listing::where('is_deleted', '0')
                                    ->whereDate('created_at', Carbon::yesterday())
                                    ->count();

        $yesterdayOrderCount = Booking::where('is_deleted', '0')
                               ->whereDate('created_at', Carbon::yesterday())
                                     ->count();

        $yesterdaySalesSum = Booking::where('is_deleted', '0')
        ->whereDate('created_at', Carbon::yesterday())
        ->sum('payment_value');

        $customerChange = $this->calculatePercentageChange($todayCustomerCount, $yesterdayCustomerCount);
        $propertyChange = $this->calculatePercentageChange($todayPropertyCount, $yesterdayPropertyCount);
        $orderChange = $this->calculatePercentageChange($todayOrderCount, $yesterdayOrderCount);
        $salesChange = $this->calculatePercentageChange($todaySalesSum, $yesterdaySalesSum);

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

        // Static list of governorates
        $allGovernorates = ['Amman', 'Zarqa', 'Irbid', 'Aqaba', 'Mafraq', 'Karak', 'Maan', 'Ajloun', 'Balqa', 'Jerash', 'Tafilah', 'Madaba'];

        // Fetch the order counts by governorate
        $governorateData = Booking::join('listings', 'Bookings.listing_id', '=', 'listings.id')
        ->select('listings.governorate', DB::raw('COUNT(*) as count'))
        ->where('listings.is_deleted', '0')
        ->where('Bookings.is_deleted', '0')
        ->groupBy('listings.governorate')
        ->orderBy('listings.governorate')
        ->get();

        // Initialize an array for storing the order counts by governorate
        $governorateCounts = [];

        // Loop through the static governorates list and count the orders for each
        foreach ($allGovernorates as $governorate) {
            $governorateCounts[$governorate] = $governorateData->firstWhere('governorate', $governorate) ? 
                                                $governorateData->firstWhere('governorate', $governorate)->count : 
                                                0;
        }

        // Extract the labels (governorate names) and counts
        $governorateLabels = array_keys($governorateCounts);
        $governorateCounts = array_values($governorateCounts);

        // Order Fulfillment Time Data
        $monthlyFulfillmentTimes = Booking::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('AVG(TIMESTAMPDIFF(SECOND, checkin, checkout)) / (60 * 60 * 24) as avg_fulfillment_time_per_day') // Fulfillment time in days
        )
        ->whereNotNull('checkout')
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->orderBy('month')
        ->get();

        $avgFulfillmentTimes = [];
        for ($i = 1; $i <= 12; $i++) {
            $avgFulfillmentTimes[] = $monthlyFulfillmentTimes->firstWhere('month', $i)
                                      ? $monthlyFulfillmentTimes->firstWhere('month', $i)->avg_fulfillment_time
                                      : 0;
        }

        return view('dashboard.index', compact(
            'todayCustomerCount', 'todayPropertyCount', 'todayOrderCount', 'todaySalesSum',
            'yesterdayCustomerCount', 'yesterdayPropertyCount', 'yesterdayOrderCount', 'yesterdaySalesSum',
            'customerChange', 'propertyChange', 'orderChange', 'salesChange',
            'salesData', 'months',
            'governorateLabels', 'governorateCounts',
            'avgFulfillmentTimes'
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
