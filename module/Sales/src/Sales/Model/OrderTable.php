<?php

namespace Sales\Model;

use Zend\Db\TableGateway\TableGateway;

class OrderTable
{
	protected $tableGateway;
	
	public function __construct(TableGateway $tableGateway)
	{
		$this->tableGateway = $tableGateway;
	}
	public function fetchAll(){
		
        $resultSet = $this->tableGateway->select();
        return $resultSet;
    }
    public function fetchSelectOption(){
	
    	$resultSet = $this->tableGateway->select();
    	$selectData = array();
 
        foreach ($resultSet as $result) {
            $selectData[$result->id] = $result->customer;
        }
        
        return $selectData;
    }
	public function getOrder($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}

	public function saveOrder(Order $order)
	{
		
		$data = array(
			'customer' => $order->customer,
			'transtype' => $order->transtype,
			'shipto' => $order->shipto,
			'billto' => $order->billto,
			'ordersrc' => $order->ordersrc,
			'se' => $order->se,
			'sm' => $order->sm,
			'terms' => $order->terms,
			'pono' => $order->pono,
			'prefdeldate' => $order->prefdeldate,
			'orderedby' => $order->orderedby,
			'actdeldate' => $order->actdeldate,
			'notes' => $order->notes,
			'status' => $order->status,
		);
		$id = intval($order->id);
		if($id == 0){
			$this->tableGateway->insert($data);
		}
		else {
			if($this->getOrder($id)){
				$this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Order id does not exist');
			}
		}
	}
	public function deleteOrder($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}