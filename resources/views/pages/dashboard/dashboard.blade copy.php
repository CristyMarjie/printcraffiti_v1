<div class="container">
    <meta name="user_role" content="{{Auth::user()->super_user}}">
    <!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed page-loading">
		<!--begin::Main-->

		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="d-flex flex-row flex-column-fluid page">
				<!--begin::Wrapper-->
				<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<!--begin::Entry-->
						<div class="d-flex flex-column-fluid">
							<!--begin::Container-->
							<div class="container">
								<!--begin::Dashboard-->
								<!--begin::Row-->
								<div class="row">
                                    @if(Auth::user()->isAdmin())
                                    <div class="col-xl-4">
										<!--begin::Stats Widget 25-->
										<div class="card card-custom  card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
															<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$users}}</span>
												<span class="font-weight-bold text-muted font-size-sm">Total Users</span>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 25-->
									</div>
                                    @endif
                                    <div class="col-xl-4">
										<!--begin::Stats Widget 25-->
										<div class="card card-custom  card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
															<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{$mallDirectories}}</span>
												<span class="font-weight-bold text-muted font-size-sm">Mall Directories</span>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 25-->
									</div>

                                    <div class="col-xl-4">
										<!--begin::Stats Widget 25-->
										<div class="card card-custom  card-stretch gutter-b">
											<!--begin::Body-->
											<div class="card-body">
												<span class="svg-icon svg-icon-2x svg-icon-success">
													<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
															<rect x="0" y="0" width="24" height="24"></rect>
															<path d="M6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 Z M7.5,5 C7.22385763,5 7,5.22385763 7,5.5 C7,5.77614237 7.22385763,6 7.5,6 L13.5,6 C13.7761424,6 14,5.77614237 14,5.5 C14,5.22385763 13.7761424,5 13.5,5 L7.5,5 Z M7.5,7 C7.22385763,7 7,7.22385763 7,7.5 C7,7.77614237 7.22385763,8 7.5,8 L10.5,8 C10.7761424,8 11,7.77614237 11,7.5 C11,7.22385763 10.7761424,7 10.5,7 L7.5,7 Z" fill="#000000" opacity="0.3"></path>
															<path d="M3.79274528,6.57253826 L12,12.5 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 Z" fill="#000000"></path>
														</g>
													</svg>
													<!--end::Svg Icon-->
												</span>
												<span class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block">{{count($announcements)}}</span>
												<span class="font-weight-bold text-muted font-size-sm">Total Announcements</span>
											</div>
											<!--end::Body-->
										</div>
										<!--end::Stats Widget 25-->
									</div>

								</div>
								<!--end::Row-->

                                <!--begin::Row-->
                                <div class="row">
                                    <div class="col-lg-6 col-xxl-4">
										<!--begin::List Widget 9-->
										<div class="card card-custom card-stretch gutter-b">
											<!--begin::Header-->
											<div class="card-header align-items-center border-0 mt-4">
												<h3 class="card-title align-items-start flex-column">
													<span class="font-weight-bolder text-dark">System Logs</span>
												</h3>
											</div>
											<!--end::Header-->
											<!--begin::Body-->
                                            @php
                                                $logCount = 0;
                                            @endphp
											<div class="card-body pt-4">
												<div class="timeline timeline-5 mt-3">
                                                    @foreach ($logs as $log )
                                                        @if (Auth::user()->isAdmin() || Auth::user()->isLeasing())
                                                            @if ($log->status == 0)
                                                            <!--begin::Item-->
                                                            <div class="scroll scroll-pull" data-scroll="true">
                                                                <div class="timeline-item align-items-start">
                                                                    <!--begin::Label-->
                                                                    <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">{{$log->created_at->format('H:i')}}</div>
                                                                    <!--end::Label-->
                                                                    <!--begin::Badge-->
                                                                    <div class="timeline-badge">
                                                                        <i class="fa fa-genderless text-warning icon-xxl"></i>
                                                                    </div>
                                                                    <!--end::Badge-->
                                                                    <!--begin::Text-->
                                                                    <div class="timeline-content text-dark-50">{{$log->user->people->full_name}} {{$log->description}}
                                                                        <a href="javascript:;" class="text-primary log_details" data-id={{$log->id}} data-toggle="modal" data-target="#logDetails">View Details.</a>
                                                                    </div>
                                                                    <!--end::Text-->
                                                                </div>
                                                            </div>
                                                            <!--end::Item-->
                                                            @php
                                                                $logCount++;
                                                            @endphp
                                                            @endif
                                                        @endif
                                                        @if (!Auth::user()->isAdmin())
                                                            <!--begin::Item-->
                                                                @if($log->user_id === Auth::user()->id)
                                                                    @if ($log->status === 2 || $log->status === 1)
                                                                    <div class="timeline-item align-items-start">
                                                                        <!--begin::Label-->
                                                                        <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg text-right pr-3">{{$log->created_at->format('H:i')}}</div>
                                                                        <!--end::Label-->
                                                                        <!--begin::Badge-->
                                                                        <div class="timeline-badge">
                                                                            <i class="fa fa-genderless text-{{$log->status == 1 ? 'success' : 'danger'}} icon-xxl"></i>
                                                                        </div>
                                                                        <!--end::Badge-->
                                                                        <!--begin::Text-->
                                                                        <div class="timeline-content text-dark-50">{{$log->user->people->full_name}}, {{$log->description}}
                                                                        </div>
                                                                        <!--end::Text-->
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                            <!--end::Item-->
                                                            @php
                                                                $logCount++;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                    @if(Auth::user()->isFinance())

                                                        <div class="scroll scroll-pull" id="tenant_uploaded" data-scroll="true">
                                                        </div>

                                                    @endif
												</div>
                                                {{-- @empty($logCount > 0)
                                                <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                                    <br>No new Logs.</div>
                                                @endempty --}}
												<!--end: Items-->
											</div>
											<!--end: Card Body-->
										</div>
										<!--end: Card-->
										<!--end: List Widget 9-->
									</div>


                                    <div class="col-lg-6 col-xxl-8">
                                        <!--begin::Advance Table Widget 2-->
                                        <div class="card card-custom card-stretch gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">{{Str::plural('Announcement',$announcements)}}</span>
                                                    {{-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> --}}
                                                </h3>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->
                                            <div class="card-body pt-3 pb-0">
                                                @if ($announcements->isNotEmpty())
                                                <div class="table-responsive">
                                                    <table class="table table-borderless table-vertical-center">
                                                        <thead>
                                                            <tr>
                                                                <th class="p-0" style="width: 50px"></th>
                                                                <th class="p-0" style="min-width: 200px"></th>
                                                                <th class="p-0" style="min-width: 100px"></th>
                                                                <th class="p-0" style="min-width: 125px"></th>
                                                                <th class="p-0" style="min-width: 110px"></th>
                                                                <th class="p-0" style="min-width: 150px"></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($announcements as $announcement)
                                                                <tr>
                                                                    <td class="pl-0 py-4">
                                                                        <div class="symbol symbol-50 symbol-light mr-1">
                                                                            <span class="symbol-label">
                                                                                <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Communication\Mail-box.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24"/>
                                                                                        <path d="M22,15 L22,19 C22,20.1045695 21.1045695,21 20,21 L4,21 C2.8954305,21 2,20.1045695 2,19 L2,15 L6.27924078,15 L6.82339262,16.6324555 C7.09562072,17.4491398 7.8598984,18 8.72075922,18 L15.381966,18 C16.1395101,18 16.8320364,17.5719952 17.1708204,16.8944272 L18.118034,15 L22,15 Z" fill="#000000"/>
                                                                                        <path d="M2.5625,13 L5.92654389,7.01947752 C6.2807805,6.38972356 6.94714834,6 7.66969497,6 L16.330305,6 C17.0528517,6 17.7192195,6.38972356 18.0734561,7.01947752 L21.4375,13 L18.118034,13 C17.3604899,13 16.6679636,13.4280048 16.3291796,14.1055728 L15.381966,16 L8.72075922,16 L8.17660738,14.3675445 C7.90437928,13.5508602 7.1401016,13 6.27924078,13 L2.5625,13 Z" fill="#000000" opacity="0.3"/>
                                                                                    </g>
                                                                                </svg><!--end::Svg Icon--></span>
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="pl-0">
                                                                        <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$announcement->title}}</a>
                                                                        <div>
                                                                            <a class="text-muted font-weight-bold text-hover-primary" href="javascript:;"></a>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-bold">{{$announcement->user_announcements['added_by_data']->people->full_name}}</span>
                                                                    </td>
                                                                    <td class="text-right">
                                                                        <span class="text-muted font-weight-500">{{date('m-d-y',strtotime($announcement->created_at))}}</span>
                                                                    </td>
                                                                    <td class="text-right">

                                                                        <span class="label label-lg label-light-primary label-inline">Active</span>
                                                                    </td>
                                                                    <td class="text-right pr-0">

                                                                        <a href="{{route('announcement.view',['id' => $announcement->id])}}" class="btn btn-icon btn-light btn-hover-primary btn-sm mx-3">
                                                                            <span class="svg-icon svg-icon-md svg-icon-primary">
                                                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Write.svg-->
                                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                        <rect x="0" y="0" width="24" height="24" />
                                                                                        <path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)" />
                                                                                        <path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                                    </g>
                                                                                </svg>
                                                                                <!--end::Svg Icon-->
                                                                            </span>
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                            @endforeach

                                                        </tbody>
                                                    </table>
                                                </div>
                                                @else
                                                <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                                    <br>No new notifications.</div>
                                                @endif
                                                <!--begin::Table-->

                                                <!--end::Table-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        <!--end::Advance Table Widget 2-->
                                    </div>

                                    <div class="col-lg-12 col-xxl-12">
                                        <!--begin::Advance Table Widget 2-->
                                        @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                                        <div class="card card-custom card-stretch gutter-b">
                                            <!--begin::Header-->
                                            <div class="card-header border-0 pt-5">
                                                <h3 class="card-title align-items-start flex-column">
                                                    <span class="card-label font-weight-bolder text-dark">Expired Contract</span>
                                                    {{-- <span class="text-muted mt-3 font-weight-bold font-size-sm">More than 400+ new members</span> --}}
                                                </h3>
                                            </div>
                                            <!--end::Header-->
                                            <!--begin::Body-->

                                            <div class="card-body pt-3 pb-0">
                                                @if ($expiredContracts->isNotEmpty())
                                                {{-- <div class="card-body"> --}}
                                                    <div class="scroll scroll-pull" data-scroll="true" data-suppress-scroll-x="false" data-swipe-easing="false" style="height: 200px">
                                                        <div style="width:1200px;">
                                                            <table class="table table-striped table-vertical-center">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col"></th>
                                                                        <th scope="col">Tenant Name</th>
                                                                        <th scope="col">Mall Location</th>
                                                                        <th scope="col">Lease End Term</th>
                                                                        <th scope="col">Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($expiredContracts as $expiredContract)
                                                                        <tr>
                                                                            <td class="pl-0 py-4">
                                                                                <div class="symbol symbol-50 symbol-light mr-1">
                                                                                    <span class="symbol-label">
                                                                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo9\dist/../src/media/svg/icons\Communication\Mail-box.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                                <path d="M22,15 L22,19 C22,20.1045695 21.1045695,21 20,21 L4,21 C2.8954305,21 2,20.1045695 2,19 L2,15 L6.27924078,15 L6.82339262,16.6324555 C7.09562072,17.4491398 7.8598984,18 8.72075922,18 L15.381966,18 C16.1395101,18 16.8320364,17.5719952 17.1708204,16.8944272 L18.118034,15 L22,15 Z" fill="#000000"/>
                                                                                                <path d="M2.5625,13 L5.92654389,7.01947752 C6.2807805,6.38972356 6.94714834,6 7.66969497,6 L16.330305,6 C17.0528517,6 17.7192195,6.38972356 18.0734561,7.01947752 L21.4375,13 L18.118034,13 C17.3604899,13 16.6679636,13.4280048 16.3291796,14.1055728 L15.381966,16 L8.72075922,16 L8.17660738,14.3675445 C7.90437928,13.5508602 7.1401016,13 6.27924078,13 L2.5625,13 Z" fill="#000000" opacity="0.3"/>
                                                                                            </g>
                                                                                        </svg><!--end::Svg Icon--></span>
                                                                                    </span>
                                                                                </div>
                                                                            </td>
                                                                            <td class="pl-0">
                                                                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$expiredContract->customer_name}}</a>
                                                                                <div>
                                                                                    <a class="text-muted font-weight-bold text-hover-primary" href="javascript:;"></a>
                                                                                </div>
                                                                            </td>
                                                                            <td class="text-right">
                                                                                <span class="text-muted font-weight-bold">{{$expiredContract->location}}</span>
                                                                            </td>
                                                                            <td class="text-right">
                                                                                <span class="text-muted font-weight-500">{{$expiredContract->contracts[0]->lease_term_end}}</span>
                                                                            </td>
                                                                            <td class="text-right">

                                                                                <span class="label label-lg label-light-primary label-inline">Expired</span>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                {{-- </div> --}}
                                                @else
                                                <div class="d-flex flex-center text-center text-muted min-h-200px">All caught up!
                                                    <br>No new notifications.</div>
                                                @endif
                                                <!--begin::Table-->
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Body-->
                                        </div>
                                        @endif
                                        <!--end::Advance Table Widget 2-->
                                    </div>

                                    @if (Auth::user()->isTenant())
                                        <div class="col-lg-6">
                                            <!--begin::Card-->
                                            <div class="card card-custom p-6 mb-8 mb-lg-0">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-7">
                                                            <!--begin::Content-->
                                                            <h2 class="text-dark mb-4">Get in Touch</h2>
                                                            <p class="text-dark-50 font-size-lg">Looking for help? Questions about your existing account?</p>
                                                            <!--end::Content-->
                                                        </div>
                                                        <div class="col-sm-5 d-flex align-items-center justify-content-sm-end">
                                                            <!--begin::Button-->
                                                            <a href="{{route('feedback')}}" class="btn font-weight-bolder text-uppercase font-size-lg btn-primary py-3 px-6">Send Inquiry</a>
                                                            <!--end::Button-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                    @endif

                                </div>
                                <!--end::Row-->

								<!--end::Dashboard-->
							</div>
							<!--end::Container-->
						</div>
						<!--end::Entry-->
					</div>
					<!--end::Content-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
        @include('pages.partials.modal.update_log_details_modal_v1')
		<!--end::Main-->


	</body>
	<!--end::Body-->
</div>