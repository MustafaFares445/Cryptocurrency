<div class="card card-flush mt-6 mt-xl-9">
    <!--begin::Card header-->
    <div class="card-header mt-5">
        <!--begin::Card title-->
        <div class="card-title flex-column">
            <h3 class="fw-bolder mb-1">{{__('Transactions')}}</h3>
            <div class="fs-6 text-gray-400">{{__('Total Transactions:' ) }} {{ $transactions->count() }}</div>
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar my-1">
            <div class="me-6 my-1">
{{--                <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary me-3">{{__('Add Client')}}</a>--}}
            </div>
        </div>
        <!--begin::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table id="kt_profile_overview_table"
                   class="table table-row-bordered table-row-dashed gy-4 align-middle fw-bolder">
                <!--begin::Head-->
                <thead class="fs-7 text-gray-400 text-uppercase">
                <tr>
                    <th class="min-w-250px">{{__('Amount')}}</th>
                    <th class="min-w-150px">{{__('Time')}}</th>
                    <th class="min-w-90px">{{__('Order ID')}}</th>
                    <th class="min-w-90px">{{__('Order Type')}}</th>
                    <th class="min-w-90px">{{__('User Name')}}</th>
                    <th class="min-w-90px">{{__('First Block Data')}}</th>
                    <th class="min-w-90px">{{__('Second Block Data')}}</th>
                    <th class="min-w-90px">{{__('Crypto')}}</th>
                </tr>
                </thead>
                <!--end::Head-->
                <!--begin::Body-->
                <tbody class="fs-6">
                @foreach ($transactions as $transaction)
                    <tr>
                        {{-- @dd( route('users.show', ['user' => $user->id])) --}}
                        <td>
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <!--begin::Info-->
                                <div class="d-flex flex-column justify-content-center text-hover-primary">
                                    {{ $transaction->amount }}
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::User-->
                        </td>
                        <td>{{ $transaction->time }}</td>
                        <td>{{ $transaction->order->id }}</td>
                        <td>{{ $transaction->order->type }}</td>
                        <td>{{ $transaction->userPlatform->user->name }}</td>
                        <td>{{ $transaction->firstBlock->data }}</td>
                        <td>{{ $transaction->secondBlock->data }}</td>
                        <td>{{ $transaction->userPlatform->data }}</td>
                    </tr>
                @endforeach
                </tbody>
                <!--end::Body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--end::Card body-->
</div>
