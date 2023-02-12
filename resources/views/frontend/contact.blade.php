@extends('layouts.frontend')

@section('title', 'HelloCooking - Contacts')


@section('content')
    <section id="contact-main-section">
        <div class="container container-1">
            <h2>Contact Us</h2>
            <div class="row">
                <div class="col-lg-7 chs-left">
                    <div class="chs-left-container">
                        <form action="#" class="needs-validation">
                            <div class="">
                                <label for="inputEmail4" class="form-label">Name</label>
                                <input type="text" class="form-control" id="inputEmail4" required />
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                            </div>
                            <div class="">
                                <label for="inputEmail4" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail4" required />
                                <div class="invalid-feedback">
                                    Please provide a valid email.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                <div class="invalid-feedback">Please provide message.</div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 chs-right">
                    <div class="chs-right-container">
                        <h5>Call Us</h5>
                        <p>Smart: 091-223-2345</p>
                        <p>Globe: 091-223-2345</p>
                        <p class="mb-3">Telephone: 124-342-412</p>
                        <h5>Location</h5>
                        <p class="mb-3">
                            Planetang nemik, Street Fight, Barangay Ginebra
                        </p>
                        <h5>Business Hours</h5>
                        <p>Monday - Friday | 7am - 8pm</p>
                        <p class="mb-3">Saturday - Sunday | Simba naman tayo</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid container-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 container-2-content">
                        <h4>Get In Touch</h4>
                        <p>Don't miss out the latest and largest deals.</p>

                        <div class="contact-social-links">
                            <div>
                                <i class="fa-brands fa-facebook-f"></i><span>Facebook</span>
                            </div>
                            <div>
                                <i class="fa-brands fa-instagram"></i>
                                <span>Instagram</span>
                            </div>
                            <div>
                                <i class="fa-brands fa-youtube"></i><span>YouTube</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section-floater">
            <h5>Call Us</h5>
            <p>Smart: 091-223-2345</p>
            <p>Globe: 091-223-2345</p>
            <p class="mb-5">Telephone: 6338997</p>
            <h5>Location</h5>
            <p class="mb-5">
                700 Shaw Boulevard Pasig City, Metro Manila, Philippines
            </p>
            <h5>Business Hours</h5>
            <p>Monday - Friday | 7am - 8pm</p>
            <p class="mb-5">Saturday - Sunday | Simba naman tayo</p>
        </div>
    </section>
@endsection
