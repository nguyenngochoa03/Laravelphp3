
<?php
    function uploadFile($nameFolder,$files){
        // lấy tên file anh ghép với thời gian (timeStap)
        $filesName = time().'_'.$files->getClientOriginalName();
        return $files ->storeAs($nameFolder,$filesName,'public');
    }
?>
