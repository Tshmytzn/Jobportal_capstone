<!DOCTYPE html>
<html lang="en">
@include('Agency.components.head', ['title' => 'Skills Assessment Completed'])

<body class="g-sidenav-show bg-gray-100">
    @include('Agency.components.aside', ['active' => 'sascompleted'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        @include(
            'Agency.components.navbar',
            ['headtitle' => 'Skills Assessment Completed'],
            ['pagetitle' => 'Agency']
        )
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
                        columns: [{
                                data: 'title',
                                title: 'Title'
                            },
                            {
                                data: 'job_title',
                                title: 'Job Title'
                            },
                            {
                                data: 'score',
                                title: 'Score/Status'
                            },
                            {
                                data: 'user',
                                title: 'JobSeeker'
                            },
                        ],
                        destroy: true,
                        autoWidth: false,
                        responsive: true,
                        dom: 'Bfrtip', // Position of the buttons
                        buttons: [{
                                extend: 'excelHtml5',
                                text: 'Export as Excel',
                                title: 'Assessment List',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                text: 'Export as PDF',
                                title: 'Assessment List',
                                orientation: 'landscape',
                                pageSize: 'A4',
                                exportOptions: {
                                    columns: ':visible'
                                }
                            },
                            {
                                extend: 'print',
                                text: 'Print',
                                exportOptions: {
                                    columns: ':visible:not(:first-child)'
                                },
                                customize: function(win) {

                                    $(win.document.body)
                                        .prepend(
                                            `<div class="print-header">
                                    <img src="{{ asset('assets/img/PESOLOGO.png') }}" style="width: 100px; height: auto;">
                                    <h1>Public Employment Service Office Victorias City</h1>
                                </div>
                                <div class="print-header-date">
                                    Public Employment Service Office Victorias City
                                </div>`
                                        );


                                    $(win.document.body).find('h1').remove();

                                    var style = `
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    table, th, td {
                        border: 1px solid #ddd;
                    }
                    th, td {
                        padding: 8px;
                        text-align: left;
                    }
                    tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }
                    tr:nth-child(odd) {
                        background-color: #ffffff;
                    }
                    .print-header, .print-header-date {
                        position: fixed;
                        top: 140px;
                        left: 0;
                        width: 100%;
                        text-align: center;
                        z-index: 9999;
                        background: #fff;
                    }
                    .print-header-date {
                        font-size: 22px;
                        color: #666;
                        margin-top: 100px;
                        margin-bottom: 20px;

                    }
                    body {
                        margin-top: 150px; 
                    }
                    @media print {
                        .print-header, .print-header-date {
                            position: fixed;
                            top: 10px;
                            left: 0;
                            width: 100%;
                            text-align: center;
                            z-index: 9999;
                            background: #fff;
                        }
                        body {
                            margin-top: 150px;
                        }
                        .page-break {
                        page-break-before: always;
                    }
                            
                    }
                </style>
            `;

                                    // Add the style to the printed window
                                    $(win.document.head).append(style);

                                  var rowsPerPage = 25;
                                    var rows = $(win.document.body).find('table tr');
                                    for (var i = rowsPerPage; i < rows.length; i +=
                                        rowsPerPage) {
                                        $(rows[i]).before(
                                            '<tr class="page-break"><td colspan="100%"></td></tr>'
                                            );
                                    }

                                    // Adjust page margins for the print view
                                    $(win.document.body).css('margin-top', '150px');
                                }    
                            }

                        ],
                        initComplete: function() {

                            $('.dt-button').attr(
                                'style',
                                'background: linear-gradient(to right, #FADCD9, #d8bfd8 ); color: #444; border: 1px solid #DDD; padding: 8px 12px; border-radius: 4px; font-size: 14px; cursor: pointer; margin: 4px; transition: all 0.3s ease; box-shadow: none;'
                            );
                        }
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
