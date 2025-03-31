<?php require_once '../init.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Library</title>
    
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="icon" href="../../plugins/website-icons/icon.PNG" type="image/x-icon">
    <link rel="stylesheet" href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.css">

    <script src="../../plugins/jquery/jquery.js"></script>
    <script src="../../plugins/sweetalert2/sweetalert2.js"></script>

    <link rel="stylesheet" href="login.css?v=<?php echo time(); ?>">
</head>
<body>

    <?php
        // ----------Insert user-----------
        $sql = "SELECT * FROM user WHERE user_id='1'";
        if (mysqli_num_rows (mysqli_query ($connection, $sql)) == 0)
        {
            $sql = "INSERT INTO `user`(`user_id`, `first_name`, `last_name`, `user_photo`) ";
            $sql .= "VALUES (1, 'Username', 'Surname', 'user.png')";

            mysqli_query ($connection, $sql);
        }
        $sql = "SELECT * FROM user WHERE user_id='1'";
        $row = mysqli_fetch_assoc (mysqli_query ($connection, $sql));
        $user_info = [$row['first_name'], $row['last_name'], $row['user_photo']];

        // ----------Update user-----------
        if (isset ($_POST['signin']))
        {
            $name = $_POST['your_name'];
            $surname = $_POST['your_surname'];
            if (!empty ($_FILES['your_photo']['name']))
            {
                $photo = $_FILES['your_photo']['name'];
            // echo $photo;

                $dirname = dirname (__FILE__); 
                $files = glob ($dirname . '/../../dist/img/*');

                // if ($_FILES['your_photo']['size'] / 1000000 > 5)   goto greater;

                foreach ($files as $file)
                {
                    if (is_file ($file))
                        unlink ($file);
                }

                move_uploaded_file ($_FILES['your_photo']['tmp_name'], $dirname . '/../../dist/img/' . $photo);
            }
            else   $photo = $row['user_photo'];
            $sql = "UPDATE user SET first_name='$name', last_name='$surname', user_photo='$photo' WHERE user_id='1'";
            mysqli_query ($connection, $sql);

            header ("location: ../books/books.php");

            // greater:
            //     $str = "Swal.fire({
            //         icon: 'warning',
            //         text: 'Suradyň ölçegi 10mb-dan uly bolmaly däl!', 
            //     }).then((result) => {
            //     if (result.value == true)
            //     {
            //         window.location.href = window.location.href;
            //     }
            //     })";
            //     echo "<script>";
            //     echo $str;
            //     echo "</script>";
                
            //     return;
            
        }

    ?>

    <div class="main">
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="../../dist/img/<?php echo $user_info[2]; ?>" id="selected_photo" alt="Profil Surat"></figure>
                        <a href="../books/books.php" class="signup-image-link">Return to Library</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Log In</h2>
                        <form action="" method="POST" enctype="multipart/form-data" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i style="font-size: 20px;" class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="your_name" id="your_name" placeholder="Username" value="<?php echo $user_info[0]; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_surname"><i style="font-size: 20px;" class="zmdi zmdi-account-circle"></i></label>
                                <input type="text" name="your_surname" id="your_surname" placeholder="Surname" value="<?php echo $user_info[1]; ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_photo"><i style="font-size: 20px;" class="zmdi zmdi-photo-size-select-large"></i></label>
                                <input type="file" name="your_photo" accept="image/*" id="your_photo" onChange="getImageURL();" style="font-family: sans-serif; color: #999;"/>
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log In"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <script>

        function getImageURL()
        {
            var fi = document.getElementById ('your_photo');
            var file_name = document.getElementById ('your_photo').value;
            var index = file_name.lastIndexOf('.') + 1;
            var ext = file_name.substr (index, file_name.length).toLowerCase();

            console.log(ext);
            var image = document.getElementById ('your_photo');

            // ----check type of file----
            if (ext != 'jpg'  &&  ext != 'jpeg'  &&  ext != 'png'  &&  ext != 'gif')
            {
                image.value = '';
                Swal.fire ('Please Select an Image!', 'Example: ".jpg  .jpeg  .png  .gif"', 'error');
            }
            else
            {
                // -----check size of file----
                if (fi.files.item(0).size / 1000000 > 10)
                {
                    image.value = '';
                    Swal.fire('Please Select an Image Less Than 10mb!', '', 'warning');
                }
                else
                    $('#selected_photo').attr ('src', URL.createObjectURL (image.files[0]))
            }


        }

    </script>
</html>