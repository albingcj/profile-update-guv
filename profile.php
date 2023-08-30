<?php
// session_start();

include "head.php";
include "value.php";

?>


<body>
    <!-- Modal -->
    <div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">
            <div class="modal-content  overflow-auto">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="upd" enctype="multipart/form-data">
                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <div class=" row justify-content-center">
                            <!--------------------------- Box ----------------------------->
                            <div class="row justify-content-evenly p-4">
                                <div class="col-auto">
                                    <h5>Edit Your Profile</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">

                                    <div class="col align-items-center">

                                        <div class=" mb-3">
                                            <input type="text" class="form-control form-control-lg " placeholder="Edit your name" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg " id="exampleInputPassword1" placeholder="Enter your current password" minlength="8" name="pass1">
                                        </div>

                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg " id="exampleInputPassword2" placeholder="New password (minimum 8)" minlength="8" name="pass2">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control form-control-lg " id="exampleInputPassword3" placeholder="Enter new password again" minlength="8" name="pass3">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm ">
                                    <div class="col align-items-center">
                                        <div class="input-group">

                                            <div class="col-12 mb-3 me-2">
                                                <select class="x form-select form-control-lg" aria-label="Default select example" name="gen">
                                                    <!-- <option selected disabled>Gender</option> -->
                                                    <option selected value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Others">Others</option>
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
                                            <!-- <input class="x form-control" type="file" id="formFile" name="pic"> -->
                                            <input type="email" class="form-control form-control-lg " placeholder="Secondary E-mail" name="smail">

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">

                                    <div class="col align-items-center">
                                        <div class="mb-3">
                                            <!-- <label for="formFile" class="form-label">Upload image</label> -->
                                            <input class="x form-control" type="file" id="formFile" name="pic">
                                        </div>
                                        <div class=" mb-3">
                                            <input type="text" class="form-control form-control-lg " placeholder="Address Line 1" name="address1">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control form-control-lg " placeholder="Address Line 2" name="address2">

                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <input type="text" class="form-control form-control-lg " placeholder="Enter Your Pincode" minlength="6" name="pincode">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control form-control-lg " placeholder="Enter Your City" name="city">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-6">
                                                <input type="text" class="form-control form-control-lg " placeholder="Language" minlength="6" name="language">
                                            </div>
                                            <div class="col-6">
                                                <input type="text" class="form-control form-control-lg " placeholder="Nation" name="nation">
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group mb-2">
                                        <button class="btn btn-lg btn-primary btn-outline-light border-0 w-100 fs-6" type="submit">Update</button>
                                        <!-- style="background-color: #0DBA4B;" -->
                                    </div>

                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sumModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="summod">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add your form fields for editing here -->
                        <input type="text" class="form-control" placeholder="<?= $sum ?>" name="sumin">
                        <!-- Add more fields as needed -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="eduModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields for editing here -->
                    <input type="text" class="form-control" placeholder="Edit your name">
                    <!-- Add more fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="expModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add your form fields for editing here -->
                    <input type="text" class="form-control" placeholder="Edit your name">
                    <!-- Add more fields as needed -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-sm navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <!-- <div class="col-auto"> -->
                <a name="logout" id="logout" class="btn text-light btn-danger btn-outline-dark border-0" href="logout.php" role="button">Logout</a>
                <!-- </div> -->

            </div>
        </nav>

    </header>
    <main>
        <div class="container bg-dark" id="cont">
            <div class=" bg-secondary">
                <div class="row bg-light d-flex justify-content-center">
                    <div class="col-12 col-sm-5 d-flex align-items-center">
                        <div class="col-12 justify-content-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <img src="<?= $pic ?>" class=" rounded-circle p-2 shadow" alt="profile picture" id="select-profile-picture" style="width:200px; height:200px;object-fit:cover; background-color: #f6f6f9; " />
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-sm-7 p-2">
                        <div class="col-auto d-flex flex-column justify-content-center g-2">
                            <div class="col-12 mb-2">
                                <div class="row mb-2">
                                    <div class="d-flex justify-content-center">
                                        <h2><?= $name ?></h2>

                                        <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><button class="btn btn-link input-group-text" type="button">
                                                <i class="bi bi-pencil-square"></i>
                                            </button></a>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="fs-6 text-center">
                                        <?= $email ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card m-2">

                            <div class="card-head d-flex justify-content-between">
                                <div class="p-2 fs-5">Summary</div>
                                <div class="p-2 pe-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#sumModal">
                                        <i class="bi bi-pencil-square text-red"></i>
                                    </a>

                                </div>
                            </div>
                            <hr />
                            <div class="summary p-2" id="summary"><?= $sum ?></div>
                        </div>
                    </div>
                </div>
                <div class="row pt-1 bg-light">
                    <div class="col-12 col-lg-6 p-2">
                        <div class="card m-2">
                            <div class="card-head d-flex justify-content-between">
                                <div class="p-2 fs-5">Education</div>
                                <div class="p-2 pe-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#eduModal">
                                        <i class="bi bi-pencil-square text-red"></i>
                                    </a>

                                </div>
                            </div>
                            <hr />
                            <div class="summary p-2">Add Education</div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 p-2">
                        <div class="card m-2">
                            <div class="card-head d-flex justify-content-between">
                                <div class="p-2 fs-5">Experience</div>
                                <div class="p-2 pe-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#expModal">
                                        <i class="bi bi-pencil-square text-red"></i>
                                    </a>
                                </div>
                            </div>
                            <hr />
                            <div class="summary p-2">Add your Experience</div>
                        </div>
                    </div>
                    <div class="col-12 p-2">
                        <div class="card m-2">
                            <div class="card-head d-flex justify-content-between">
                                <div class="p-2 fs-5">Personal Details</div>
                                <div class="p-2 pe-3">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal"><button class="btn btn-link input-group-text" type="button">
                                            <i class="bi bi-pencil-square"></i>
                                        </button></a>

                                </div>
                            </div>
                            <hr />
                            <div class="summary p-2">
                                <div class="card-body">
                                    <p class="card-text"><strong>Name:</strong> <?php echo $name; ?></p>
                                    <p class="card-text"><strong>Mobile Number:</strong> <?php echo $num; ?></p>
                                    <p class="card-text"><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
                                    <p class="card-text"><strong>Age:</strong> <?php echo $age; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).on('submit', '#upd', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_up", true);

            formData.append("pic", $("#formFile")[0].files[0]); // Use correct ID

            $.ajax({
                type: "POST",
                url: "upd.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    var res = jQuery.parseJSON(response);
                    console.log(res.status);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                        // console.log(1.5);

                    } else if (res.status == 200) {
                        console.log(2);
                        $('#errorMessage').addClass('d-none');
                        $('#upd')[0].reset(); //change here
                        $('#cont').load(window.location.href + ' #cont');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);


                    } else if (res.status == 500) {
                        console.log(3);
                        $('#errorMessage').addClass('d-none');
                        $('#upd')[0].reset(); //change here 
                        $('#cont').load(window.location.href + ' #cont');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });
        });



        $(document).on('submit', '#summod', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_sum", true);

            formData.append("pic", $("#formFile")[0].files[0]); // Use correct ID

            $.ajax({
                type: "POST",
                url: "upd.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    var res = jQuery.parseJSON(response);
                    console.log(res.status);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                        // console.log(1.5);

                    } else if (res.status == 200) {
                        console.log(2);
                        $('#errorMessage').addClass('d-none');
                        $('#summod')[0].reset(); //change here
                        $('#summary').load(window.location.href + ' #summary');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);


                    } else if (res.status == 500) {
                        console.log(3);
                        $('#errorMessage').addClass('d-none');
                        $('#summod')[0].reset(); //change here 
                        $('#summary').load(window.location.href + ' #summary');
                        alertify.set('notifier', 'position', 'top-right');
                        alertify.success(res.message);
                    }
                }
            });
        });
    </script>



    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css"></script>
</body>

</html>