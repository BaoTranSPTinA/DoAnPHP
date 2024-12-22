<?php
    require('../model/m_bill.php');

    class c_bill {
        public function list_all_bill()
        {
            $bill = new Bill();
            $list_bill = $bill->list_all_bill();
            return $list_bill;
        }
    }

?>