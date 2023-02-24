<!DOCTYPE html>
<html>

<head>
    <title>Contact Form</title>
    <!-- Link to Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container" style="margin-top: 50px;">
<!-- main login form here  -->
        <form class="form" action="./validate_form.php" method="POST">
            <h2>Please Enter Your Details</h2>
            <div class="form-group">
                <label for="formName">Name</label>
                <input type="text" name="name" class="form-control" id="formName" placeholder="Enter your name">
                <small class="error">
                    <?php
                    if (isset($_GET['name_error'])) {
                        echo $_GET['name_error'];
                    } ?>
                </small>
            </div>
            <div class="form-group">
                <label for="formEmail">Email address</label>
                <input type="email" name="email" class="form-control" id="formEmail" placeholder="Enter email">
                <small class="error">
                    <?php
                    if (isset($_GET['email_error'])) {
                        echo $_GET['email_error'];
                    } ?>
                </small>
            </div>
            <div class="form-group">
                <label for="formMessage">Message</label>
                <textarea class="form-control" name="message" id="formMessage" rows="3" placeholder="Enter Message"></textarea>
                <small class="error">
                    <?php
                    if (isset($_GET['error_message'])) {
                        echo $_GET['error_message'];
                    } ?>
                </small>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>

            <small class="error">
                <br>
                <?php
                if (isset($_GET['final_error'])) {
                    echo $_GET['final_error'];
                }
                ?>
            </small>
            <small class="success-message">
                <br>
                <?php
                if (isset($_GET['final_success'])) {
                    echo $_GET['final_success'];
                }
                ?>
            </small>
        </form>
    </div>


    <!-- To clear URL -->
    <script>
        setTimeout(() => {
            window.history.pushState(
                "",
                "Page Title",
                window.location.href.split("?")[0]
            );
        }, 5000);
    </script>
</body>

</html>
