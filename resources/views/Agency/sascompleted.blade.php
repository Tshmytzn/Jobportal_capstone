<!DOCTYPE html>
<html lang="en">
@include('Agency.components.head', ['title' => 'Skills Assessment Completed'])

<body class="g-sidenav-show bg-gray-100">
    @include('Agency.components.aside', ['active' => 'sascompleted'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        @include('Agency.components.navbar', ['headtitle' => 'Skills Assessment Completed'], ['pagetitle' => 'Agency'])
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row">
                <table class="table table-striped" style="width:100%" id="assessmentlistTable">
                    <thead>
                        <tr>
                            <th>Assessment Title</th>
                            <th>Job Title</th>
                            <th>Score</th>
                            <th>Jobseeker</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            @include('Agency.components.footer')
        </div>
    </main>

    @include('Agency.components.scripts')

    <script>
        function loadAssessmentTable() {
            $.ajax({
                url: `{{ route('AssessmentList') }}`,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    const tableData = response.data.map(item => ({
                        title: item.test?.title || '',
                        job_title: item.test?.job_title || '',
                        score: item.result?.score + ' | ' + item.result?.passed,
                        user: item.user?.js_firstname + ' ' + item.user?.js_lastname
                    }));

                    $('#assessmentlistTable').DataTable({
                        data: tableData,
                        columns: [
                            { data: 'title', title: 'Title' },
                            { data: 'job_title', title: 'Job Title' },
                            { data: 'score', title: 'Score/Status' },
                            { data: 'user', title: 'JobSeeker' },
                        ],
                        destroy: true,
                        autoWidth: false,
                        responsive: true,
                        dom: 'Bfrtip', // Position of the buttons
                        buttons: [
                            { extend: 'print', text: 'Print', title: 'Assessment List' },
                            {
                                extend: 'excelHtml5',
                                text: 'Export as Excel',
                                title: 'Assessment List',
                                exportOptions: { columns: ':visible' }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'Export as PDF',
                                title: 'Assessment List',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                exportOptions: { columns: ':visible' }
                            }
                        ]
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error:', error);
                }
            });
        }

        $(document).ready(function() {
            loadAssessmentTable();
        });
    </script>
</body>
</html>
