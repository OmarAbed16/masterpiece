<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='dashboard'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">

        
            <div class="row">
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Money</p>
                                <h4 class="mb-0">${{ number_format($todaySalesSum, 2) }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
    @if ($salesChange < 0)
        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{ number_format($salesChange, 2) }}% </span> than yesterday</p>
    @else
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{ number_format($salesChange, 2) }}% </span> than yesterday</p>
    @endif
</div>

                    </div>
                </div>

                <div class="col-xl-3 col-sm-6">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">weekend</i>
                            </div>
                            <div class="text-end pt-1">
    <p class="text-sm mb-0 text-capitalize">Today's Bookings</p>
    <h4 class="mb-0">{{ number_format($todayOrderCount) }}</h4>
</div>

                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
    @if ($orderChange < 0)
        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{ number_format($orderChange, 2) }}% </span> than yesterday</p>
    @else
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{ number_format($orderChange, 2) }}% </span> than yesterday</p>
    @endif
</div>

                    </div>
                </div>


                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
                                <p class="text-sm mb-0 text-capitalize">Today's Users</p>
                                <h4 class="mb-0">{{ $todayCustomerCount }}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
    @if ($customerChange < 0)
        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{ number_format($customerChange, 2) }}% </span> than yesterday</p>
    @else
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{ number_format($customerChange, 2) }}% </span> than yesterday</p>
    @endif
</div>

                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                    <div class="card">
                        <div class="card-header p-3 pt-2">
                            <div
                                class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                                <i class="material-icons opacity-10">person</i>
                            </div>
                            <div class="text-end pt-1">
    <p class="text-sm mb-0 text-capitalize">Today's Properties</p>
    <h4 class="mb-0">{{ number_format($todayPropertyCount) }}</h4>
</div>

                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3">
    @if ($propertyChange < 0)
        <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">{{ number_format($propertyChange, 2) }}% </span> than yesterday</p>
    @else
        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+{{ number_format($propertyChange, 2) }}% </span> than yesterday</p>
    @endif
</div>

                    </div>
                </div>
              
            </div>
            
<!--s-->

            <div class="row mb-4  mt-4">
                <div class="col-lg-6 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Accommodation Time per Month</h6>
                                   
                                </div>
                               
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                            <canvas id="fulfillmentTimeChart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Bookings by Governorate</h6>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                            <canvas id="governorateChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>


            <div class="row mb-4">
                <div class="col-lg-8 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Sales</h6>
                                   
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                            <canvas id="myBarChart" ></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h6>Users Governorate</h6>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                            <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
   
    </div>
    @push('js')
    <script src="{{ asset('assets') }}/js/plugins/chartjs.min.js"></script>
    <script>
const chartCtx = document.getElementById('governorateChart').getContext('2d');
    const governorateChart = new Chart(chartCtx, {
        type: 'bar',
        data: {
            labels: @json($governorateLabels),
            datasets: [{
                label: 'Bookings by Governorate',
                data: @json($governorateCounts),
                backgroundColor: '#4CAF50',
                borderColor: '#388E3C',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

var ctx = document.getElementById('fulfillmentTimeChart').getContext('2d');

    var fulfillmentTimeChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($months),
            datasets: [{
                label: 'Average Fulfillment Time (Days)',
                data: @json($totalFulfillmentTimes),
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                fill: true,
                tension: 0.4,
                borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Days'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Months'
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.parsed.y.toFixed(2) + ' Days';
                        }
                    }
                }
            }
        }
    });



        var ctx = document.getElementById('myBarChart').getContext('2d');

var myBarChart = new Chart(ctx, {
    type: 'bar', 
    data: {
        labels:@json($months),
        datasets: [{
            label: 'Monthly Sales',
            data: @json($salesData),  
            backgroundColor: 'rgba(54, 162, 235, 0.2)', 
            borderColor: 'rgba(54, 162, 235, 1)', 
            borderWidth: 1 
        }]
    },
    options: {
        responsive: true,
        scales: {
            y: {
                beginAtZero: true 
            }
        }
    }
});


// Doughnut Chart for User Distribution by Governorate
var ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');
        var doughnutChart = new Chart(ctxDoughnut, {
            type: 'doughnut',
            data: {
                labels: @json($governorateLabels), // Governorate names
                datasets: [{
                    label: 'Users by Governorate',
                    data: @json($userGovernorateCounts), // User counts
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true
            }
        });

        




    </script>
    @endpush
</x-layout>
