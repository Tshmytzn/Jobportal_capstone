<!DOCTYPE html>
<html lang="en">

@include('Admin.components.head', ['title' => 'Customer Inquiries'])
@include('admin.components.loading')

<body class="g-sidenav-show  bg-gray-100">

    @include('Admin.components.aside', ['active' => 'CustomerInquiries'])

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('Admin.components.navbar', ['headtitle' => 'Customer Inquiries'], ['pagetitle' => 'Customer Inquiries'])        
        <!-- End Navbar -->

        {{-- cards --}}
        <div class="container-fluid py-4">
            <div class="row m-2">
                <table id="contact_tbl" class="table table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>

            </div>
            @include('Admin.components.footer')
        </div>
    </main>

    @include('Admin.components.scripts')

</body>
</html>
