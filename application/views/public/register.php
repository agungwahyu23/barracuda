<!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Tomoko Yuki</title>
			<link rel="icon" href="<?= base_url() ?>assets/public/assets/img/logo-removebg-preview.png">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
     <section class="abovefold overflow-hidden">

        <style scoped>
            @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap");
            @import url('https://fonts.googleapis.com/css2?family=Red+Hat+Display:wght@400;500;600;700;800;900&display=swap');

            * {
                font-family: 'Inter', sans-serif !important;
            }

            body ::-webkit-input-placeholder {
                color: #9A9A9A !important;
            }

            body :-ms-input-placeholder {
                color: #9A9A9A !important;
            }

            body ::-ms-input-placeholder {
                color: #9A9A9A !important;
            }

            body ::placeholder {
                color: #9A9A9A !important;
            }

            body .font-red-hat-display {
                font-family: 'Red Hat Display', sans-serif !important;
            }

            body .cl-light-blue {
                color: #34b3ff;
            }

            body nav .navbar-brand {
                font-family: 'Red Hat Display', sans-serif !important;
                font-size: 26px;
                font-weight: 700 !important;
                color: #FFFFFF !important;
            }

            @media screen and (min-width: 768px) {
                body nav .navigation {
                    margin-left: 80px;
                }
            }

            body nav .navigation li {
                margin-right: 32px;
            }

            body nav .navigation a {
                font-size: 16px;
                font-weight: 400 !important;
                color: #FFFFFF !important;
            }

            body nav .authentication li {
                margin-right: 38px;
            }

            body nav .authentication a {
                font-size: 16px;
                font-weight: 700 !important;
            }

            @media screen and (min-width: 768px) {
                body nav .authentication .cl-white {
                    color: #FFFFFF !important;
                }
            }

            @media screen and (max-width: 768px) {
                body nav .authentication .login {
                    width: 100%;
                }
            }

            @media screen and (max-width: 768px) {
                body nav .authentication .login a {
                    background: #518CFF;
                    border-radius: 8px;
                    -webkit-box-align: center;
                    -ms-flex-align: center;
                    align-items: center;
                    color: #FFFFFF !important;
                    padding: 14px 14px 14px 14px !important;
                }
            }

            body nav .authentication .signup {
                background: #FFFFFF;
                border-radius: 8px;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                color: #1C3055 !important;
                padding: 14px 14px 14px 14px !important;
            }

            body .abovefold {
                background: #0F0F0F;
                padding-bottom: 115px;
            }

            body .abovefold .header {
                margin-top: 85px;
            }

            body .abovefold .img-header {
                position: absolute;
                top: 0;
                right: -230px;
            }

            body .abovefold .headline {
                font-family: 'Red Hat Display', sans-serif !important;
                font-weight: 700 !important;
                line-height: 91px;
                color: #FFFFFF;
                font-size: 72px;
            }

            @media screen and (max-width: 768px) {
                body .abovefold .headline {
                    font-size: 54px;
                    line-height: 80px !important;
                }
            }

            body .abovefold .sub-headline {
                font-family: 'Red Hat Display', sans-serif !important;
                font-weight: 400 !important;
                font-size: 26px;
                line-height: 38px;
                color: #CED2DE;
                margin-top: 30px;
                width: 75%;
            }

            @media screen and (min-width: 768px) {
                body .abovefold .sub-headline {
                    width: 373px;
                }
            }

            body .abovefold .four-point {
                margin-top: 80px;
                color: #CED2DE;
            }

            body .abovefold .card {
                background: #171717;
                -webkit-box-shadow: -32px 48px 60px rgba(22, 23, 28, 0.04);
                box-shadow: -32px 48px 60px rgba(22, 23, 28, 0.04);
                border-radius: 12px;
                padding: 52px 52px 40px;
                border: none;
            }

            @media screen and (min-width: 768px) {
                body .abovefold .card {
                    width: 464px;
                }
            }

            body .abovefold .card .form-control {
                background: #202020;
                border-radius: 8px;
                border: none;
                padding: 16px 20px;
                height: 56px;
                font-weight: 600 !important;
            }

            body .abovefold .card .input-title {
                color: #494C57;
                font-size: 16px;
                margin-bottom: 12px;
            }

            body .abovefold .card .btn-card {
                margin-top: 36px;
                background: #00B67A;
                border-radius: 8px;
                height: 56px;
                padding: 10px;
                color: #FFFFFF;
                font-size: 16px;
                font-weight: 700 !important;
            }

            body .abovefold .card .award {
                font-size: 12px;
                line-height: 18px;
                color: #8D8F98;
            }
        </style>

        <div class="container position-relative">
            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Ornament.png"
                alt="bg-header" class="img-fluid img-header d-none d-md-block">
        </div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light pt-lg-5">
            <div class="container px-0">
                <a class="navbar-brand me-0" href="#">
                    GivMoney
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto navigation">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Resources</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Career</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto authentication">
                        <li class="nav-item my-auto text-center login">
                            <a class="nav-link cl-white mb-3 mb-md-0" aria-current="page" href="#">Log in</a>
                        </li>
                        <li class="nav-item me-0 text-center">
                            <a class="nav-link signup" href="#">
                                Sign up <span class="ms-2"><img
                                        src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/arrow-right.png"
                                        alt="arrow" class="img-fluid"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container header position-relative">
            <div class="row">
                <div class="col-lg-6 px-md-0 my-auto">
                    <div class="headline">
                        Simplifying Global <span class="cl-light-blue">Finance</span>
                    </div>
                    <div class="sub-headline">
                        Faster, easier and cheaper cross border payment starts here
                    </div>
                    <div class="row four-point">
                        <div class="col-md-6">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Vector.png"
                                alt="vector" class="me-3"> Licensed & Regulated
                        </div>
                        <div class="col-md-6">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Vector.png"
                                alt="vector" class="me-3"> Hassle-free
                        </div>
                        <div class="col-md-6">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Vector.png"
                                alt="vector" class="me-3"> 100% Transparent
                        </div>
                        <div class="col-md-6">
                            <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/Vector.png"
                                alt="vector" class="me-3"> Across 180+ Countries
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-md-0">
                    <div class="card">
                        <div class="input-group mb-4">
                            <label for="input" class="w-100">
                                <span class="input-title">Email</span>
                                <input type="text" class="form-control mt-2" placeholder="Email@example.org">
                            </label>
                        </div>
                        <div class="input-group mb-4">
                            <label for="input" class="w-100">
                                <span class="input-title">Password</span>
                                <input type="text" class="form-control mt-2" placeholder="Your Password">
                            </label>
                        </div>
                        <div class="input-group">
                            <label for="input" class="w-100">
                                <span class="input-title">Business category</span>
                                <input type="text" class="form-control mt-2" placeholder="Select business category">
                            </label>
                        </div>
                        <button class="btn btn-card">
                            Get Started
                        </button>
                        <div class="row mx-0 mt-4 award">
                            <div class="col-1 px-0">
                                <img src="https://api.elements.buildwithangga.com/storage/files/2/assets/Content/Content10/dark/award.png"
                                    alt="award" class="img-fluid">
                            </div>
                            <div class="col-11 px-0">
                                Licensed and regulated by The Monetary
                                Authority of Singapore, Hong Kong Customs and Excise Department and Bank Indonesia.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> 
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    </body>
  </html>
