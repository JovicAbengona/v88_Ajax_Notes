<?php   if($notes == "No Result"){ ?>
                <div class="col-lg-12">
                    <p>No Notes Available</p>
                </div>
<?php   }
        else{
            foreach($notes as $note){ ?>
                <div class="col-lg-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title d-inline"><?= $note["title"] ?></h5>
                            <a href="#" id="<?= $note["id"] ?>" class="delete btn btn-sm btn-danger float-right">Delete</a>
                            <form class="note_form mt-3" action="update_note_description/<?= $note["id"] ?>" method="POST">
                                <div class="form-group">
                                    <textarea class="form-control no-resize" name="description" rows="3"><?= $note["description"] ?></textarea>
                                </div>
                            </form>
                            <p class="card-text font-italic text-right small"><?= DATE("F j, Y", STRTOTIME($note["created_at"])) ?></p>
                        </div>
                    </div>
                </div>
<?php       } 
        }?>