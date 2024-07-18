<?php

class OrderModel extends CI_Model
{

    public function selectAllOrder()
    {
        $query =  $this->db->select('orders.*, shipping.*')
            ->from('orders')
            ->join('shipping', 'orders.ship_id=shipping.id')
            ->get();
        return $query->result();
    }

    public function selectOrderDetails($order_code)
    {
        $query =  $this->db->select('order_details.quantity as qty, order_details.order_code, order_details.product_id, products.*')
            ->from('order_details')
            ->join('products', 'order_details.product_id=products.id')
            ->where('order_details.order_code', $order_code)
            ->get();
        return $query->result();
    }
}