<?php

@controller::checkAuthentication();

if (isset($_GET['id']))
    $event = controller::getEvent($_GET['id']);

?>

<div class="page-header">
    <div class="page-header-content">
        <h1>
            Edit event
            <small>Not happy about the details?</small>
        </h1>
        <a class="back-button big page-back" href="javascript:history.back()"></a>
    </div>
</div>
<div class="page-region">
    <div class="page-region-content">
        <div class="grid">
            <div class="grid">
                <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
                    <div class="span5">
                        <input name="id" type="hidden" value="<?php echo $event->getId(); ?>" />
                        <h2>Title</h2>
                        <div class="input-control text">
                            <input name="title" type="text" placeholder="Enter title" value="<?php echo $event->getName(); ?>" />
                            <button class="btn-clear" onclick="return false;" tabindex="-1" type="button"></button>
                        </div>
                        <br />
                        <h2>Date</h2>
                        <div class="input-control text datepicker span4" data-param-lang="en">
                            <input name="date" type="text" disabled="" value="<?php echo $event->getDate(); ?>" />
                            <button class="btn-date" onclick="return false;"></button>
                        </div>
                        <br />
                        <h2>Image</h2>
                        <div>
                            <input name="image" type="file" />
                        </div>
                        <br />
                        <h2>Description</h2>
                        <div class="input-control textarea">
                            <textarea style="width: 900px; height: 400px;" name="description" placeholder="Input description here..."><?php echo $event->getDescription(); ?></textarea>
                        </div>
                        <br />
                        <h2>Link</h2>
                        <div class="input-control text">
                            <input name="link" type="text" placeholder="Enter link" value="<?php echo $event->getLink(); ?>" />
                            <button class="btn-clear" onclick="return false;" tabindex="-1" type="button"></button>
                        </div>
                        </br>
                        <h2>Type</h2>
                        <div class="input-control">
                            <label class="input-control radio" onclick="">
                                <input type="radio" checked="" name="type" value="event" />
                                <span class="helper">Event</span>
                            </label>
                            <label class="input-control radio" onclick="">
                                <input type="radio" name="type" value="theater" />
                                <span class="helper">Theater</span>
                            </label>
                            <label class="input-control radio" onclick="">
                                <input type="radio" name="type" value="cinema" />
                                <span class="helper">Cinema</span>
                            </label>
                        </div>
                        </br>
                        <h2>Is this a major event?</h2>
                        <div class="input-control">
                            <label class="input-control switch" onclick="">
                                <input name="ismajor" type="checkbox" value="<?php echo $event->getIsMajor(); ?>" />
                                <span class="helper">Major event</span>
                            </label>
                        </div>
                        <h2>Price in €</h2>
                        <div class="input-control text">
                            <input name="price" type="text" placeholder="Enter price in €" value="<?php echo $event->getPrice(); ?>" />
                            <button class="btn-clear" onclick="return false;" tabindex="-1" type="button"></button>
                        </div>
                    </div>
                    <button type="submit" name="editevent">Edit event</button>
                </form>
            </div>
        </div>
    </div>
</div>
