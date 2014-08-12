<?php
if(strlen(validation_errors())>0){
    echo '<div class="alert alert-error">';
    echo validation_errors();
    echo '</div>';
}
?>

<?php
if(strlen($content)>0){
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                '.$content.'
                            </div>';
}
?>