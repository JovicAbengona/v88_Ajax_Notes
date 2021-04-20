<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Village88 Training | Web Fundamentals | CSS | Bootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
            .no-resize{
                resize: none;
            }
        </style>
        <title>Ajax | Notes</title>
    </head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand text-success" href="<?= base_url(); ?>">Notes</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        <div class="container">
            <div class="col-lg-12 mt-5">
                <h3 class="text-success mb-4">My Notes</h3>
                <div id="notes" class="row">

                </div>
            </div>
            <div class="col-lg-4 mt-5">
                <h3 class="text-success mb-4">Add Note</h3>
                <form action="create" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="note">
                    </div>
                    <button type="submit" class="btn btn-success">Add Note</button>
                </form>
            </div>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>© 2021 Village88 | All Rights Reserved</p>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                $.get("<?= base_url() ?>/notes/index_html", function(res){
                    $("#notes").html(res);
                });

                $("form").submit(function(){
                    $.post($(this).attr("action"), $(this).serialize(), function(res){
                        $("#notes").html(res);
                    });
                    return false;
                })

                $(document).on("blur", ".note_form", function(){
                    $.post($(this).attr("action"), $(this).serialize(), function(res){
                        $("#notes").html(res);
                    });
                    return false;
                });

                $(document).on("click", ".delete", function(){
                    $.get("<?= base_url() ?>/delete/" + $(this).attr("id"), function(res){
                        $("#notes").html(res);
                    });
                });
            });
        </script>
    </body>
</html>