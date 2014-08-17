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
			$customer_category => $customer->customer_category,
			$customer_type => $customer->customer_type,
			$customer_name => $customer->customer_name,
			$customer_consignee => $customer->customer_consignee,
			$customer_branch => $customer->customer_branch,
			$customer_trade_name => $customer->customer_trade_name,
			$customer_phone => $customer->customer_phone,
			$customer_email => $customer->customer_email,
			$status => $customer->status,
			$customer_tin => $customer->customer_tin
		);
		$id = int($customer->id);
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