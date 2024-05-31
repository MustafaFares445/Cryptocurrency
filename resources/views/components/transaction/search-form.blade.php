<form action="#" id="filterForm">
    <!--begin::Card-->
    <div class="card mb-7">
        <!--begin::Card body-->
        <div class="card-body">
            <!--begin::Compact form-->
            <div class="d-flex align-items-center">
                <!--begin::Input group-->
                <div class="position-relative w-md-400px me-md-2">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" class="form-control form-control-solid ps-10" name="filter[clientName]"
                        value="{{ old('filter.clientName', request()->input('filter.clientName')) }}"
                        placeholder="{{__('Client Name')}}" />
                </div>
                <!--end::Input group-->
                <!--begin:Action-->
                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary me-5">{{__('Search')}}</button>
                    <button type="button" class="btn btn-secondary me-5" onclick="clearForm()">{{__('Clear')}}</button>
                    <a id="kt_horizontal_search_advanced_link" class="btn btn-link" data-bs-toggle="collapse"
                        href="#kt_advanced_search_form">{{__('Advanced Search')}}</a>
                </div>
                <!--end:Action-->
            </div>
            <!--end::Compact form-->
            <!--begin::Advance form-->
            <div class="collapse" id="kt_advanced_search_form">
                <!--begin::Separator-->
                <div class="separator separator-dashed mt-9 mb-6"></div>
                <!--end::Separator-->
                <!--begin::Row-->
                <div class="row g-8 mb-8">
                    <!--begin::Col-->
                    <div class="col-xxl-7">
                        <label class="fs-6 form-label fw-bolder text-dark">{{__('Username')}}</label>
                        <input type="text" class="form-control form-control form-control-solid"
                            name="filter[username]" placeholder="Username" value="{{ old('filter.username', request()->input('filter.username')) }}" />
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-xxl-7">
                        <label class="fs-6 form-label fw-bolder text-dark">{{__('Email')}}</label>
                        <input type="text" class="form-control form-control form-control-solid" name="filter[email]"
                            placeholder="Email" value="{{ old('filter.email', request()->input('filter.email')) }}" />
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Advance form-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</form>
