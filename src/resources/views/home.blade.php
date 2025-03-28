@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <section class="section dashboard">
                        <div class="row">

                            <!-- Left side columns -->
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-xxl-4 col-md-6">
                                        <div class="card info-card sales-card">

                                            <div class="card-body">
                                                <h5 class="card-title">Total de Tags <span>| Today</span></h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-tag"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>{{$totalTags}}</h6>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-md-6">
                                        <div class="card info-card revenue-card">

                                            <div class="card-body">
                                                <h5 class="card-title">Total de posts <span>| This Month</span></h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-easel3"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>{{$totalPosts}}</h6>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xxl-4 col-xl-12">

                                        <div class="card info-card customers-card">
                                            <div class="card-body">
                                                <h5 class="card-title">Usuarios activos <span>| en la
                                                        plataforma</span></h5>

                                                <div class="d-flex align-items-center">
                                                    <div
                                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                        <i class="bi bi-people"></i>
                                                    </div>
                                                    <div class="ps-3">
                                                        <h6>{{$totalCurrentUsers}}</h6>
                                                        <span class="text-danger small pt-1 fw-bold">12%</span> <span
                                                            class="text-muted small pt-2 ps-1">decrease</span>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div><!-- End Left side columns -->

                            <!-- Right side columns -->
                            <div class="col-12">

                                <!-- Recent Activity -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Ultimos 5 posts </h5>

                                        <div class="activity">
                                            @foreach($postsCreatedToday as $post)
                                                <div class="activity-item d-flex">
                                                    <div class="activite-label">{{$post->id}}</div>
                                                    <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                                                    <div class="activity-content">
                                                        {{$post->title}} <a
                                                            href="{{ route("posts.show", ['uuid' => $post->uuid] )}}"
                                                            class="fw-bold text-dark"> Ver</a>
                                                    </div>
                                                </div><!-- End activity item-->
                                            @endforeach

                                        </div>

                                    </div>
                                </div><!-- End Recent Activity -->

                                <!-- Budget Report -->
                                <div class="card">
                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body pb-0">
                                        <h5 class="card-title">Budget Report <span>| This Month</span></h5>

                                        <div id="budgetChart" style="min-height: 400px;" class="echart"></div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                                    legend: {
                                                        data: ['Allocated Budget', 'Actual Spending']
                                                    },
                                                    radar: {
                                                        // shape: 'circle',
                                                        indicator: [{
                                                            name: 'Sales',
                                                            max: 6500
                                                        },
                                                            {
                                                                name: 'Administration',
                                                                max: 16000
                                                            },
                                                            {
                                                                name: 'Information Technology',
                                                                max: 30000
                                                            },
                                                            {
                                                                name: 'Customer Support',
                                                                max: 38000
                                                            },
                                                            {
                                                                name: 'Development',
                                                                max: 52000
                                                            },
                                                            {
                                                                name: 'Marketing',
                                                                max: 25000
                                                            }
                                                        ]
                                                    },
                                                    series: [{
                                                        name: 'Budget vs spending',
                                                        type: 'radar',
                                                        data: [{
                                                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                                                            name: 'Allocated Budget'
                                                        },
                                                            {
                                                                value: [5000, 14000, 28000, 26000, 42000, 21000],
                                                                name: 'Actual Spending'
                                                            }
                                                        ]
                                                    }]
                                                });
                                            });
                                        </script>

                                    </div>
                                </div><!-- End Budget Report -->

                                <!-- Website Traffic -->
                                <div class="card">
                                    <div class="filter">
                                        <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                                class="bi bi-three-dots"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                            <li class="dropdown-header text-start">
                                                <h6>Filter</h6>
                                            </li>

                                            <li><a class="dropdown-item" href="#">Today</a></li>
                                            <li><a class="dropdown-item" href="#">This Month</a></li>
                                            <li><a class="dropdown-item" href="#">This Year</a></li>
                                        </ul>
                                    </div>

                                    <div class="card-body pb-0">
                                        <h5 class="card-title">Website Traffic <span>| Today</span></h5>

                                        <div id="trafficChart" style="min-height: 400px;" class="echart"></div>

                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                echarts.init(document.querySelector("#trafficChart")).setOption({
                                                    tooltip: {
                                                        trigger: 'item'
                                                    },
                                                    legend: {
                                                        top: '5%',
                                                        left: 'center'
                                                    },
                                                    series: [{
                                                        name: 'Access From',
                                                        type: 'pie',
                                                        radius: ['40%', '70%'],
                                                        avoidLabelOverlap: false,
                                                        label: {
                                                            show: false,
                                                            position: 'center'
                                                        },
                                                        emphasis: {
                                                            label: {
                                                                show: true,
                                                                fontSize: '18',
                                                                fontWeight: 'bold'
                                                            }
                                                        },
                                                        labelLine: {
                                                            show: false
                                                        },
                                                        data: [{
                                                            value: 1048,
                                                            name: 'Search Engine'
                                                        },
                                                            {
                                                                value: 735,
                                                                name: 'Direct'
                                                            },
                                                            {
                                                                value: 580,
                                                                name: 'Email'
                                                            },
                                                            {
                                                                value: 484,
                                                                name: 'Union Ads'
                                                            },
                                                            {
                                                                value: 300,
                                                                name: 'Video Ads'
                                                            }
                                                        ]
                                                    }]
                                                });
                                            });
                                        </script>

                                    </div>
                                </div><!-- End Website Traffic -->

                            </div><!-- End Right side columns -->

                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
@endsection
