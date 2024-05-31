<script>
    $(document).ready(function() {
        $("#kt_profile_overview_table td").click(function() {
            var href = $(this).data("href");
            if (href) {
                window.location = href;
            }
        });
    });
</script>
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('assets/js/custom/pages/projects/project/project.js') }}"></script>
<!--end::Page Custom Javascript-->

