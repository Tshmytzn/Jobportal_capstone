<!DOCTYPE html>
<html lang="en">

@include('Jobseeker.components.head', ['title' => 'Data Privacy Policy'])
<body>
    <div class="container mt-5">
        <h2 class="text-center">Data Privacy Terms and Conditions</h2>
        <p class="text-center">Effective Date: <strong>November 12, 2024</strong></p>

        <div class="mt-4">
            <h3>Table of Contents</h3>
            <ul>
                <li><a href="#personal-data">Personal Data We Collect</a></li>
                <li><a href="#purpose">Purpose of Data Collection</a></li>
                <li><a href="#data-sharing">Data Sharing</a></li>
                <li><a href="#data-retention">Data Retention</a></li>
                <li><a href="#security">Security Measures</a></li>
                <li><a href="#your-rights">Your Rights</a></li>
                <li><a href="#cookies">Cookies and Tracking Technologies</a></li>
                <li><a href="#changes">Changes to This Policy</a></li>
                <li><a href="#contact">Contact Information</a></li>
            </ul>
        </div>

        <div id="personal-data" class="mt-5">
            <h4>1. Personal Data We Collect</h4>
            <p>We collect various types of personal data necessary for providing our services, which may include but are not limited to:</p>
            <ul>
                <li><strong>Personal Identification Information:</strong> Full name, age, gender, contact details (email address, phone number), and residential address.</li>
                <li><strong>Employment Information:</strong> Work experience, educational background, professional skills, certifications, job preferences, and other relevant career data.</li>
                <li><strong>Application Data:</strong> Data entered during your job application, such as resumes, cover letters, and supporting documents.</li>
                <li><strong>Location Data:</strong> Location information, including your IP address, to improve your experience on our platform.</li>
                <li><strong>Communication Data:</strong> Records of communications between you and employers, or our support team.</li>
            </ul>
        </div>

        <div id="purpose" class="mt-5">
            <h4>2. Purpose of Data Collection</h4>
            <p>The data we collect is used for the following purposes:</p>
            <ul>
                <li><strong>Job Matching and Application Processing:</strong> To create and maintain your profile, enable employers to view your qualifications, and match you with relevant job opportunities.</li>
                <li><strong>Communication:</strong> To contact you regarding job openings, application status, updates, and other platform-related notifications.</li>
                <li><strong>Customer Support:</strong> To provide assistance, resolve issues, and improve your experience on our platform.</li>
                <li><strong>Legal Compliance:</strong> To comply with legal and regulatory requirements, including the Data Privacy Act of 2012 and other relevant laws in the Philippines.</li>
            </ul>
        </div>

        <div id="data-sharing" class="mt-5">
            <h4>3. Data Sharing</h4>
            <p>We will not share your personal data with third parties except in the following circumstances:</p>
            <ul>
                <li><strong>Employers:</strong> Your profile, resume, and application data may be shared with registered employers on the platform for job matching and recruitment purposes.</li>
                <li><strong>Service Providers:</strong> Third-party service providers that assist us in operating the platform, such as web hosting, payment processing, and customer support services, may have access to your data, but they are contractually required to protect it.</li>
                <li><strong>Legal Requirements:</strong> We may disclose your personal data when required by law, such as in response to a subpoena, court order, or other legal process, or to protect our rights or the safety of others.</li>
            </ul>
        </div>

        <div id="data-retention" class="mt-5">
            <h4>4. Data Retention</h4>
            <p>We retain your personal data for as long as necessary to fulfill the purposes outlined in these Terms or as required by law. If you wish to deactivate or delete your account, you may request this through the platform, and we will take appropriate action in accordance with applicable laws.</p>
        </div>

        <div id="security" class="mt-5">
            <h4>5. Security Measures</h4>
            <p>We take reasonable technical and organizational measures to protect your personal data from unauthorized access, use, disclosure, alteration, or destruction. This includes encryption, secure server protocols, and access controls to safeguard your information.</p>
        </div>

        <div id="your-rights" class="mt-5">
            <h4>6. Your Rights</h4>
            <p>Under the <strong>Data Privacy Act of 2012</strong>, you have the following rights:</p>
            <ul>
                <li><strong>Right to Access:</strong> You can request access to the personal data we hold about you.</li>
                <li><strong>Right to Rectification:</strong> You can update or correct any inaccuracies in your personal data.</li>
                <li><strong>Right to Erasure:</strong> You can request that we delete your personal data under certain circumstances.</li>
                <li><strong>Right to Object:</strong> You can object to the processing of your personal data in certain situations, such as for direct marketing purposes.</li>
                <li><strong>Right to Data Portability:</strong> You can request to receive your data in a format that allows you to transfer it to another service provider.</li>
            </ul>
            <p>If you wish to exercise any of these rights, please contact us using the information provided below.</p>
        </div>

        <div id="cookies" class="mt-5">
            <h4>7. Cookies and Tracking Technologies</h4>
            <p>Our website may use cookies and similar tracking technologies to enhance your user experience, analyze usage patterns, and deliver targeted content. By using our platform, you consent to the use of these technologies as outlined in our <strong>Cookie Policy</strong>.</p>
        </div>

        <div id="changes" class="mt-5">
            <h4>8. Changes to This Policy</h4>
            <p>We may update these Data Privacy Terms and Conditions from time to time. Any changes will be posted on this page, and the <strong>Effective Date</strong> will be updated accordingly. We encourage you to review this page periodically to stay informed about how we are protecting your data.</p>
        </div>

        <div id="contact" class="mt-5">
            <h4>9. Contact Information</h4>
            <p>For any questions or concerns regarding your personal data or to exercise your rights under the Data Privacy Act, please contact our Data Protection Officer at:</p>
            <p><strong>PESO Employment Job Portal</strong><br>
                Email: <a href="pesovictorias2021@gmail.com">pesovictorias2021@gmail.com</a><br>
                Phone: +63 916 645 3802<br>
                Address: Organic Bldg., Brgy. 4, Victorias, Philippines</p>
        </div>

        <div class="mt-4 text-center">
            <p>By using the PESO Employment Job Portal, you acknowledge and consent to the collection, use, and processing of your personal data in accordance with these Terms.</p>
        </div>

        <div class="row me-2 mt-1 mb-1">
            <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="privacyCheckbox" required>
                    <label class="form-check-label" for="privacyCheckbox">
                        I have read and agree to the <a href="/PrivacyPolicy" target="_blank">Data
                            Privacy Terms and Conditions</a>.
                    </label>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" id="submitBtn" class="btn btn-light border border-primary mt-3 mb-3" disabled>Submit</button>
        </div>
    </div>

    @include('Jobseeker.components.footer')

    @include('Jobseeker.components.scripts')

    <script>
        const checkbox = document.getElementById('privacyCheckbox');
        const submitBtn = document.getElementById('submitBtn');
    
        checkbox.addEventListener('change', function () {
            submitBtn.disabled = !checkbox.checked;
        });
    </script>
    

</body>

</html>
