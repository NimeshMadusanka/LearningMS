<html lang="en">
<head>
    <title>Assignment Submission</title>
    <link rel="icon" href="<?php echo base_url(); ?>siteimage/site.jpg" type="image/ico">

    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/menu_toggle.js"></script>

    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/croppie.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/croppie.css" />

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/stylesheet.css">
    <script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/profile.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/course.js"></script>

</head>
<body style="background-image: url('<?php echo base_url(); ?>siteimage/wall.png');">

<div class="mainDiv">

    <div class="menu-toggle" id="hamburger">
        <i class="fas fa-bars"></i>
    </div>
    <div class="overlay"></div>
    <div class="container">
        <nav>
            <h1 class="brand"><a href="<?php echo base_url('LmsController/home'); ?>">SLI<span>IT</span> LMS</a></h1>
            <ul>
                <li><a href="<?php echo base_url('LmsController/home'); ?>">Home</a></li>
                <li><a href="<?php echo base_url('LmsController/profile'); ?>">Profile</a></li>
                <li><a href="<?php echo base_url('LmsController/logout'); ?>">Logout</a></li>
            </ul>
        </nav>
    </div>

    <div class="profileLine"></div>
    <div class="profileBox">
        <img src="<?php if(!isset($_SESSION['imagePath'])||$_SESSION['imagePath']==null){echo base_url().'siteimage/user.png';}else{ echo base_url().base64_decode($_SESSION['imagePath']);} ?>" class="userImage">
        <img src="<?php echo base_url(); ?>siteimage/update.png" class="updateImage" onclick="uploadImage()">
        <div class="hiddenfile">
            <input type="file" id="upload_image" name="upload_image" accept="image/*" >
        </div>
        <div class="profile-links">
            <div class="line-rows"><a href="<?php echo base_url('LmsController/myCourse'); ?>" >My Courses</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/coursework'); ?>" >All Courses</a></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/stdNotification'); ?>" >Notifications</a> <?php if (isset($_SESSION['userNotification'])){ if ($_SESSION['userNotification']==1){ echo '<span class="dot">!</span>';}} ?></div>
            <div class="line-rows"><a href="<?php echo base_url('LmsController/stdSettings'); ?>" >Account Settings</a></div>
        </div>
        <div class="user-setting">
            <div class="line-rows"><a>Assignment Submission</a></div>
            <div>
                <form action="stdAssignment" method="post" enctype="multipart/form-data" onsubmit="return submissionAssignment(this)">
                    <p>File</p>
                    <input type="text" id="file_name" readonly style="cursor: pointer">
                    <br>
                    <input type="button" value="Upload" onclick="uploadCourseFile()">
                    <div class="hiddenDiv">
                        <input type="file" name="upload_File" id="upload_File" onchange="setFileName()" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf">
                    </div>
                    <p>Description</p>
                    <input type="text" name="description" placeholder="Enter Description">
                    <p>Due date</p>
                    <input type="text" value="<?php foreach($submission as $row){ echo $row->date; }?> 12:00 AM" readonly>
                    <p>Current Time</p>
                    <input type="text" id="currentTime" readonly>
                    <br><br>
                    <input type="submit" value="Confirm">
                    <input type="hidden" name="addSubmission">
                </form>
            </div>
        </div>
    </div>

</div>

<div class="headDiv">
</div>
</body>
</html>

<div id="uploadimageModal" class="modal" role="dialog" style="margin-top: 5%">
    <div class="modal-dialog" style="width: 535px;height: 500px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload & Crop Image</h4>
            </div>
            <div class="modal-body" >
                <div class="row" >
                    <div class="col-md-12 text-center" >
                        <div id="image_demo" style="width:150px;"></div>
                    </div>
                    <div class="col-md-12" style="padding-top:30px;margin-top: -4%;margin-left: 63.5%">
                        <button class="btn btn-primary crop_image">Crop & Upload Image</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function(){

        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width:400,
                height:400,
                type:'square' //circle
            },
            crop_size: {
                width:600,
                height:600,
                type:'square' //circle
            },
            boundary:{
                width:500,
                height:500
            }
        });

        $('#upload_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimageModal').modal('show');
        });

        $('.crop_image').click(function(event){
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'crop_size'
            }).then(function(response){
                $.ajax({
                    url:'<?php echo site_url('UserController/image'); ?>',
                    type: "POST",
                    data:{"image": response},
                    success:function(data)
                    {
                        $('#uploadimageModal').modal('hide');
                        location.reload();
                    }
                });
            })
        });

    });

    function uploadImage() {
        $('#upload_image').trigger('click');
    }

    function uploadCourseFile() {
        $('#upload_File').trigger('click');
    }

    function setFileName() {

        var fileInput = document.getElementById('upload_File');
        var filename = fileInput.files[0].name;

        document.getElementById("file_name").value = filename;

    }

</script>
<script>

    window.onload = function(e){
        var x="<?php if(isset($_SESSION['success'])){ echo $_SESSION['success'];}?>";
        if("1"==x){
            swal("Success!", "Your Submission Successful!", "success");
            <?php $this->session->set_flashdata("success",null); ?>
        }

        var y="<?php if(isset($_SESSION['error'])){ echo $_SESSION['error'];}?>";

        if("1"==y){
            showErrorMsg("This Email Already Used !");
            <?php $this->session->set_flashdata("error",null); ?>
        }else if("2"==y){
            showErrorMsg("Your Current Password Is Wrong !");
            <?php $this->session->set_flashdata("error",null); ?>
        }

        clock();
        function clock() {
            var now = new Date();
            var TwentyFourHour = now.getHours();
            var hour = now.getHours();
            var min = now.getMinutes();
            var year = now.getFullYear();
            var month = now.getMonth()+1;
            var day = now.getDate();
            var mid = ' PM';
            if (min < 10) {
                min = "0" + min;
            }
            if (hour > 12) {
                hour = hour - 12;
            }
            if(hour==0){
                hour=12;
            }
            if(TwentyFourHour < 12) {
                mid = ' AM';
            }
            document.getElementById('currentTime').value = year+'/'+month+'/'+day+'  '+hour+':'+min + mid ;
            setTimeout(clock, 1000);
        }
    }

</script>