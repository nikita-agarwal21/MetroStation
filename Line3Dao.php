<?php
    interface Line3Dao{
        public function getAmount($src_id,$dest_id);
        public function calAmt($srcLineId,$destLineId);
    }
?>
