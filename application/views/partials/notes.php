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
                            <form class="note_form mt-3" action="update_note_description/<?= $note["id"] ?>" method="POST">
                                <div class="form-group">
                                    <label for="title_<?= $note["id"] ?>">Title</label>
                                    <input type="text" class="form-control" id="title_<?= $note["id"] ?>" name="title" value="<?= $note["title"] ?>">
                                </div>
                                <div class="form-group">
                                    <label for="description_">Description</label>
                                    <textarea class="form-control no-resize" id="description_<?= $note["id"] ?>" name="description" rows="3"><?= $note["description"] ?></textarea>
                                </div>
                            </form>
                            <p class="card-text d-inline font-italic text-left small"><?= DATE("F j, Y", STRTOTIME($note["created_at"])) ?></p>
                            <a href="#" id="<?= $note["id"] ?>" class="delete btn btn-sm btn-danger float-right">Delete</a>
                        </div>
                    </div>
                </div>
<?php       } 
        }?>