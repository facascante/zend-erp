<?php
namespace Customer\Model;

use Zend\Db\TableGateway\TableGateway;

class CustomerTable
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
    
	public function getCustomer($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}
	public function saveCustomer(Customer $customer)
	{
		
		$data = array(
			'category' => $customer->category,
			'type' => $customer->type,
			'name' => $customer->name,
			'consignee' => $customer->consignee,
			'branch' => $customer->branch,
			'trade_name' => $customer->trade_name,
			'phone' => $customer->phone,
			'email' => $customer->email,
			'status' => $customer->status,
			'tin' => $customer->tin
		);
		$id = intval($customer->id);
		if($id == 0){
			$this->tableGateway->insert($data);
		}
		else {
			if($this->getCustomer($id)){
				$this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Customer id does not exist');
			}
		}
	}
	public function deleteCustomer($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}