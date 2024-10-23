<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Agency Feedback'])

<style>
    body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
    }
    .feedback-card {
        margin-bottom: 20px;
        border: none;
        border-radius: 12px;
        transition: transform 0.2s, box-shadow 0.2s;
        background: #fff;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 300px; /* Fixed width for each card */
    }
    .feedback-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    }
    .card-title {
        font-weight: bold;
        font-size: 1.25rem;
    }
    .card-subtitle {
        font-size: 0.9rem;
        margin-bottom: 10px;
    }
    .rating {
        color: #FFD700; /* Gold color for stars */
    }
    .card-img-top {
        width: 100%;
        height: 150px; /* Fixed height for images */
        object-fit: cover;
    }
    .card-body {
        padding: 20px;
    }
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }
</style>

<body>

    @include('Jobseeker.components.spinner')

    @include('Jobseeker.components.navbar', ['active' => 'feedback'])

    @include('Jobseeker.components.header', ['title' => 'Agency Feedback'])

    <div class="container mb-5">
        <div class="row justify-content-center">
            <!-- Feedback Cards -->
            <div class="col-md-4">
                <div class="card feedback-card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Agency Logo">
                    <div class="card-body">
                        <h5 class="card-title">ABC Recruitment <span class="rating">⭐⭐⭐⭐⭐</span></h5>
                        <h6 class="card-subtitle text-muted">contact@abcrecruitment.com</h6>
                        <p class="card-text">The job portal has significantly simplified our hiring process. The quality of candidates we receive has greatly improved!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feedback-card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Agency Logo">
                    <div class="card-body">
                        <h5 class="card-title">XYZ Staffing <span class="rating">⭐⭐⭐⭐</span></h5>
                        <h6 class="card-subtitle text-muted">info@xyzstaffing.com</h6>
                        <p class="card-text">Very user-friendly interface and great support. We appreciate the constant updates to enhance our experience.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feedback-card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Agency Logo">
                    <div class="card-body">
                        <h5 class="card-title">Elite Hire Agency <span class="rating">⭐⭐⭐</span></h5>
                        <h6 class="card-subtitle text-muted">hello@elitehire.com</h6>
                        <p class="card-text">The platform is good, but it could use some additional features for better filtering of candidates.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feedback-card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Agency Logo">
                    <div class="card-body">
                        <h5 class="card-title">Recruit Right <span class="rating">⭐⭐⭐⭐⭐</span></h5>
                        <h6 class="card-subtitle text-muted">support@recruitright.com</h6>
                        <p class="card-text">Exceptional service! We find the perfect candidates quickly, and the response times are fantastic.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feedback-card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Agency Logo">
                    <div class="card-body">
                        <h5 class="card-title">Future Talent <span class="rating">⭐⭐⭐⭐</span></h5>
                        <h6 class="card-subtitle text-muted">contact@futuretalent.com</h6>
                        <p class="card-text">A great tool for finding skilled professionals. Would love to see more analytics features!</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card feedback-card">
                    <img src="https://via.placeholder.com/300x150" class="card-img-top" alt="Agency Logo">
                    <div class="card-body">
                        <h5 class="card-title">Talent Search Co. <span class="rating">⭐⭐⭐⭐⭐</span></h5>
                        <h6 class="card-subtitle text-muted">info@talentsearchco.com</h6>
                        <p class="card-text">Highly recommend this portal! It has made our recruitment process more efficient and effective.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')

</body>

</html>
