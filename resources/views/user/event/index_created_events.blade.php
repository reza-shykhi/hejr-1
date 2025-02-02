@extends('layouts.app_master')
@section('styles')
    <link rel="stylesheet" href="{{asset('pass/password_strength.css')}}">
    <link href="{{asset('js/datatables/datatables.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{asset('vendors/owl.carousel/dist/assets/owl.carousel.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('vendors/owl.carousel/dist/assets/owl.theme.default.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')

    <!-- BEGIN: Subheader -->
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="margin-right-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">رویدادهای شما</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                    <li class="m-nav__item m-nav__item--home">
                        <a href="#" class="m-nav__link m-nav__link--icon">
                            <i class="m-nav__link-icon la la-home"></i>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text">رویداد ها</span>
                        </a>
                    </li>
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <a href="" class="m-nav__link">
                            <span class="m-nav__link-text"> رویداد های ایجاد شده توسط شما</span>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
    </div>

    <!-- END: Subheader -->
    <div class="m-content">
        <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
            <div class="m-alert__icon">
                <i class="flaticon-exclamation m--font-brand"></i>
            </div>
            <div class="m-alert__text">
                در جدول زیر رویدادهایی که توسط شما ایجاد شده نمایش داده شده و شما میتوانید به صورت دلخواه آن را ویرایش کنید.
            </div>
        </div>
        <div class="m-portlet m-portlet--mobile">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            تمامی رویداد های شما
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="{{route('user.events.create')}}" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-cart-plus"></i>
													<span>رویداد جدید</span>
												</span>
                            </a>
                        </li>
                        <li class="m-portlet__nav-item"></li>
                        {{--
                                                <li class="m-portlet__nav-item">
                                                    <div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                                                        <a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
                                                            <i class="la la-ellipsis-h m--font-brand"></i>
                                                        </a>
                                                        <div class="m-dropdown__wrapper">
                                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                                            <div class="m-dropdown__inner">
                                                                <div class="m-dropdown__body">
                                                                    <div class="m-dropdown__content">
                                                                        <ul class="m-nav">
                                                                            <li class="m-nav__section m-nav__section--first">
                                                                                <span class="m-nav__section-text">Quick Actions</span>
                                                                            </li>
                                                                            <li class="m-nav__item">
                                                                                <a href="" class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-share"></i>
                                                                                    <span class="m-nav__link-text">Create Post</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="m-nav__item">
                                                                                <a href="" class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-chat-1"></i>
                                                                                    <span class="m-nav__link-text">Send Messages</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="m-nav__item">
                                                                                <a href="" class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-multimedia-2"></i>
                                                                                    <span class="m-nav__link-text">Upload File</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="m-nav__section">
                                                                                <span class="m-nav__section-text">Useful Links</span>
                                                                            </li>
                                                                            <li class="m-nav__item">
                                                                                <a href="" class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-info"></i>
                                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="m-nav__item">
                                                                                <a href="" class="m-nav__link">
                                                                                    <i class="m-nav__link-icon flaticon-lifebuoy"></i>
                                                                                    <span class="m-nav__link-text">Support</span>
                                                                                </a>
                                                                            </li>
                                                                            <li class="m-nav__separator m-nav__separator--fit m--hide">
                                                                            </li>
                                                                            <li class="m-nav__item m--hide">
                                                                                <a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">Submit</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                        --}}
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="m_table_1">
                    <thead>
                    <tr>
                        <th>آی دی</th>
                        <th>نام رویداد</th>
                        <th>توضیح</th>
                        <th>هسته</th>
                        <th>تاریخ شروع و پایان</th>
                        <th>ظرفیت</th>
                        <th>نوع</th>
                        <th>موضوع</th>
                        <th>وضعیت</th>
                        <th>عملیات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->createdEvents as $event)
                        <tr>
                            <td class="respons_click">{{$event->id}}</td>
                            <td>{{$event->name}}</td>
                            <td>{{$event->description}}</td>
                            <td>{{$event->center_core->name}}</td>
                            <td>{{$event->start_dates}} تا {{$event->end_dates}}</td>
                            <td>/{{$event->fulled_capacity}}  {{$event->capacity}}</td>
                            <td>{{$event->event_type->name}}</td>
                            <td>{{$event->event_subject->name}}</td>
                            <td><span class="m-badge  m-badge--primary m-badge--wide">{{$event->event_status->name}}</span>
                            </td>
                            <td nowrap>

                                <a href="{{route('user.events.edit',$event)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="ویرایش">
                                    <i class="la la-edit"></i>
                                </a>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- END EXAMPLE TABLE PORTLET-->
    </div>


@endsection
@section('scripts')
    <script src="{{asset('js/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
    <script type="text/javascript">
        var table = $('#m_table_1');
        table.DataTable({
            responsive: true,
        });
    </script>

    <script>
        window.load = doSth();
        function doSth(){
            $(".respons_click").trigger("click");
        }
    </script>
@endsection