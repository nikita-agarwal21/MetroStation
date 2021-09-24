<?php
    interface Line1Dao{
        public function getAmount($src_id,$dest_id);
        public function calAmt($srcLineId,$destLineId);
    }
?>
