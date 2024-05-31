@extends('layouts.master')


@section('title')
    {{__('UOA Dashboard Page')}}
@endsection


@section('css')

@endsection

@section('js')
    <x-custom-js-table />

    <script>
        function clearForm() {
            document.getElementById("filterForm").reset(); // Reset the form

            // Clear individual form fields set with Laravel old() function
            const clientNameInput = document.getElementsByName("filter[clientName]")[0];
            clientNameInput.value = '';

            const clientUsernameInput = document.getElementsByName("filter[username]")[0];
            clientUsernameInput.value = '';

            const clientEmailInput = document.getElementsByName("filter[email]")[0];
            clientEmailInput.value = '';

            window.location = window.location.href.split("?")[0];
        }
    </script>
@stop

@section('title-page')
    {{__('Dashboard')}}
@stop

@section('content')
        <!--begin::style-->
        <x-custom-style-table />
        <!--end::style-->

        <!--begin::Table-->
        <x-transaction.table :transactions="\App\Models\Transaction::with(['order' , 'userPlatform' , 'firstBlock' , 'SecondBlock'])->get()" />
        <!--end::Card-->
@endsection

