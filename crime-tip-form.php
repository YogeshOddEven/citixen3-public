<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home | Citizen 3 Crime Tip Form</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/urbanist.css'>
    <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
    <link rel='stylesheet' type='text/css' media='screen' href='css/style.css'>
    <!--Bootstrap.min css-->
	<link rel="stylesheet" href="admin/assets/plugins/bootstrap/css/bootstrap.min.css">
</head>
<?php include "lock-login-require.php"; ?>
<body>
    <div class="crim-head-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="title-head">Crime Tip</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="crim-tip-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="crim-prof-detail">
                        <form action="" class="w-100">
                            <div class="row">
                                <div class="col-md-3 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            Are you Victum or Witness?
                                        </label>
                                        <div class="button-label" id="button-1">
                                            <input type="checkbox" class="checkbox">
                                            <div class="knobs"></div>
                                            <div class="layer"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            Are you reporting anonymously?
                                        </label>
                                        <div class="button-label" id="button-1">
                                            <input type="checkbox" class="checkbox">
                                            <div class="knobs"></div>
                                            <div class="layer"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            When did the crime take place?
                                        </label>
                                        <input type="time" class="input-group" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            Where did the crime take place?
                                        </label>
                                        <select name="sources" id="sources" class="custom-select sources" placeholder="Select location">
                                            <option value="profile">Current Location</option>
                                            <option value="profile">Manually Choose a Location</option>
                                            <option value="profile">Enter a Location</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            Photos
                                        </label>
                                        <div class="video-content">
                                            <input type="file" id="photo-btn" hidden/>
                                            <label class="chose-label" for="photo-btn">Choose File</label>
                                            <span id="photo-chosen" class="video-chosen">No file chosen</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            Video
                                        </label>
                                        <div class="video-content">
                                            <input type="file" id="video-btn" hidden/>
                                            <label class="chose-label" for="video-btn">Choose File</label>
                                            <span id="video-chosen" class="video-chosen">No file chosen</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            Crime Type
                                        </label>
                                        <select name="sources" id="sources" class="custom-select sources" placeholder="Select crime type">
                                            <option value="profile">Current Location</option>
                                            <option value="profile">Manually Choose a Location</option>
                                            <option value="profile">Enter a Location</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            Description
                                        </label>
                                        <textarea class="input-group textarea-group" placeholder="Type your description"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12 mb-25">
                                    <div class="form-group">
                                        <label class="form-title">
                                            Additional Note
                                        </label>
                                        <input type="text" class="input-group" placeholder="Notes">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Submit Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

	<script src="admin/assets/js/popper.js"></script>
	<script src="admin/assets/js/custom_jquery_functions.js"></script>
	<script src="admin/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script>
        $(".custom-select").each(function() {
        var classes = $(this).attr("class"),
            id      = $(this).attr("id"),
            name    = $(this).attr("name");
        var template =  '<div class="' + classes + '">';
            template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
            template += '<div class="custom-options">';
            $(this).find("option").each(function() {
                template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
            });
        template += '</div></div>';
        
        $(this).wrap('<div class="custom-select-wrapper"></div>');
        $(this).hide();
        $(this).after(template);
        });
        $(".custom-option:first-of-type").hover(function() {
        $(this).parents(".custom-options").addClass("option-hover");
        }, function() {
        $(this).parents(".custom-options").removeClass("option-hover");
        });
        $(".custom-select-trigger").on("click", function() {
        $('html').one('click',function() {
            $(".custom-select").removeClass("opened");
        });
        $(this).parents(".custom-select").toggleClass("opened");
        event.stopPropagation();
        });
        $(".custom-option").on("click", function() {
        $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
        $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
        $(this).addClass("selection");
        $(this).parents(".custom-select").removeClass("opened");
        $(this).parents(".custom-select").find(".custom-select-trigger").text($(this).text());
        });

        const photoBtn = document.getElementById('photo-btn');
        const photoChosen = document.getElementById('photo-chosen');

        photoBtn.addEventListener('change', function(){
            photoChosen.textContent = this.files[0].name
        })
        const videolBtn = document.getElementById('video-btn');
        const videoChosen = document.getElementById('video-chosen');

        videolBtn.addEventListener('change', function(){
        videoChosen.textContent = this.files[0].name
        })
    </script>
</body>
</html>