<?php
function alert($smg, $sts) {
    if($sts == 1){
        $tipe = 'success';
    }else{
        $tipe = 'danger';
    }
    echo '
    <div class="alert alert-'.$tipe.'" role="alert">
    '.$smg.'
    </div>
    ';
}
?>