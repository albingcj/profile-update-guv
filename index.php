<?php include "head.php";
if (isset($_COOKIE['email_id']) && isset($_COOKIE['password'])) {
    $id = $_COOKIE['email_id'];
    $pa = $_COOKIE['password'];
} else {
    $id = '';
    $pa = '';
}

?>

<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100  m-xl-auto">
        <div class=" p-3 shadow-lg box-area m-3 rounded-3 cback">
            <!-- background-color: #0DBA4B -->
            <div class="row align-items-center ">
                <div class="col-md-6 rounded-5 d-flex justify-content-center align-items-center flex-column left-box">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style="width:80%">
                        <div class="carousel-inner rounded-circle ">
                            <div class="carousel-item active align-content-center">
                                <img src="img/N2.svg" class="img-fluid" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.guvi.in/build/images/women3.4e20db6b776ff35ab2fa90c5e0e72447.webp" class="img-fluid p-4" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="https://www.guvi.in/build/images/women2.efc6d3e133bad2107652725034c91338.webp" class="img-fluid p-4" alt="..." style="width: auto;">
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-md-6 right-box">
                    <div class="row align-items-center justify-content-center">
                        <div class="header-text mt-2">
                            <h2>Hello,Again😊</h2>
                            <p>Welcome back.</p>
                            <div id="errorMessage1" class="alert alert-warning d-none"></div>
                        </div>
                        <form id="log">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control form-control-lg rounded" placeholder="E-mail address" required name="email" value="<?= $id ?>">
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control form-control-lg " name="upwd" id="exampleInputPassword" placeholder="Password" minlength="8" required value="<?= $pa ?>">
                            </div>
                            <div class="input-group mb-3 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="formCheck" name="remember">
                                    <label for="formCheck" class="form-check-label text-secondary">
                                        <small>
                                            Remember Me
                                        </small>
                                    </label>
                                </div>
                                <div class="forgot">
                                    <small><a href="#">Forgot Password?</a></small>
                                </div>
                            </div>
                            <div class="input-group mb-2">
                                <button class="btn btn-lg btn-primary btn-outline-light border-0 w-100 fs-6">Login</button>
                                <!-- style="background-color: #0DBA4B;" -->
                            </div>
                            <!-- Google Sign In Button -->
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-info btn-outline-light border-0  w-100 fs-6">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" style="width:20px" class="me-2">
                                    <a href="#" class="text-decoration-none text-dark"> Login with Google</a>
                                </button>
                            </div>
                        </form>
                        <div class="row text-center">
                            <small>Don't have account? <a href="#" data-bs-toggle="modal" data-bs-target="#myModal">Register</a></small>
                            <!-- Modal -->
                            <div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form id="reg" enctype="multipart/form-data">
                                                <div class=" row justify-content-center">
                                                    <!--------------------------- Box ----------------------------->
                                                    <div class="row">
                                                        <div id="errorMessage2" class="alert alert-warning d-none"></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="header-text mb-4 text-center">
                                                            <img src="https://www.guvi.com/build/images/guvi-logo.e8ad68fbd8dc0a5fc2f7c4ffd580c54d.png" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm">

                                                            <div class="col align-items-center">

                                                                <div class=" mb-3">
                                                                    <input type="text" class="form-control form-control-lg " placeholder="Enter your name" name="name">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <input type="mail" class="form-control form-control-lg " placeholder="Email address" name="email">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="password" class="form-control form-control-lg " id="exampleInputPassword1" placeholder="Password (minimum 8)" minlength="8" name="pass1">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <input type="password" class="form-control form-control-lg " id="exampleInputPassword2" placeholder="Enter password again" minlength="8" name="pass2">
                                                                </div>


                                                            </div>
                                                        </div>

                                                        <div class="col-sm ">
                                                            <div class="col align-items-center">
                                                                <div class="input-group">

                                                                    <div class="col mb-3 me-2">
                                                                        <select class="x form-select form-control-lg" aria-label="Default select example" name="gen">
                                                                            <!-- <option  disabled>Gender</option> -->
                                                                            <option selected value="1">Male</option>
                                                                            <option value="2">Female</option>
                                                                            <option value="3">Others</option>
                                                                        </select>
                                                                    </div>

                                                                </div>

                                                                <div class="input-group mb-3">
                                                                    <div class="input-group-prepend me-2">
                                                                        <select class="x form-select" aria-label="Select country code" name="code">
                                                                            <!-- <option selected disabled>+</option> -->
                                                                            <option value="1">+01</option>
                                                                            <option value="7">+07</option>
                                                                            <option value="33">+33</option>
                                                                            <option value="44">+44</option>
                                                                            <option value="49">+49</option>
                                                                            <option value="81">+81</option>
                                                                            <option value="86">+86</option>
                                                                            <option selected value="91">+91</option>
                                                                            <option value="92">+92</option>
                                                                            <option value="93">+93</option>
                                                                            <option value="94">+94</option>
                                                                            <option value="95">+95</option>
                                                                            <option value="98">+98</option>
                                                                        </select>
                                                                    </div>
                                                                    <input type="text" class="form-control" placeholder="Mobile number" aria-label="Mobile number" aria-describedby="basic-addon1" inputmode="numeric" name="num">

                                                                </div>
                                                                <div class="mb-3">
                                                                    <input class="x form-control" type="date" id="formdate" name="dob">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <!-- <label for="formFile" class="form-label">Upload image</label> -->
                                                                    <input type="file" name="pic" accept="image/*" required class="form-control" id="exampleFormControlInputx" placeholder="ppic">
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="input-group mb-2">
                                                                <button class="btn btn-lg btn-primary btn-outline-light border-0 w-100 fs-6" type="submit">Register</button>
                                                                <!-- style="background-color: #0DBA4B;" -->
                                                            </div>
                                                            <!-- Google Sign In Button -->
                                                            <div class="input-group mb-3">
                                                                <button class="btn btn-lg btn-info btn-outline-light border-0  w-100 fs-6">
                                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" style="width:20px" class="me-2">
                                                                    <a href="#" class="text-decoration-none text-dark">
                                                                        Signup with Google</a>
                                                                </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).on('submit', '#reg', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("save_reg", true);

                formData.append("pic", $("#exampleFormControlInputx")[0].files[0]); 
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "reg.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(1);
                        console.log(response);
                        var res = jQuery.parseJSON(response);
                        console.log(res.status);
                        if (res.status == 422) {
                            $('#errorMessage2').removeClass('d-none');
                            $('#errorMessage2').text(res.message);
                            // console.log(1.5);

                        } else if (res.status == 200) {
                            // console.log(2);
                            $('#errorMessage2').addClass('d-none');
                            $('#reg')[0].reset(); 
                            // $('#myModal').hide();
                            $('#myModal').modal('hide');

                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);



                        } else if (res.status == 500) {
                            // console.log(3);
                            $('#errorMessage2').addClass('d-none');
                            $('#reg')[0].reset();
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);
                        }
                    }
                });

            });


            $(document).on('submit', '#log', function(e) {
                e.preventDefault();

                var formData = new FormData(this);
                formData.append("save_log", true);
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "log.php",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        // console.log(1);
                        console.log(response);
                        var res = jQuery.parseJSON(response);
                        console.log(res.status);
                        if (res.status == 422) {
                            $('#errorMessage1').removeClass('d-none');
                            $('#errorMessage1').text(res.message);
                            // console.log(1.5);

                        } else if (res.status == 200) {
                            // console.log(2);
                            $('#errorMessage1').addClass('d-none');
                            $('#reg')[0].reset();
                            $('#myModal').modal('hide');

                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);
                            window.location.href = "profile.php"


                        } else if (res.status == 500) {
                            // console.log(3);
                            $('#errorMessage1').addClass('d-none');
                            $('#reg')[0].reset(); 
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(res.message);
                        }
                    }
                });

            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>