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
			$category => $customer->category,
			$type => $customer->type,
			$name => $customer->name,
			$trade_name => $customer->trade_name,
			$consignee => $customer->consignee,
			$phone => $customer->phone,
			$email => $customer->email,
			$branch => $customer->branch,
			$owner => $customer->owner,
			$contact_person => $customer->contact_person,
			$tin => $customer->tin,
			$website => $customer->website,
			$shipping_mode => $customer->shipping_mode,
			$payment_terms => $customer->payment_terms,
			$unpaid_invoice => $customer->unpaid_invoice,
			$credit_limit => $customer->credit_limit,
			$billing_address_id => $customer->billing_address_id,
			$shipping_address_id => $customer->shipping_address_id,
			$sales_executive => $customer->sales_executive,
			$status => $customer->status
			
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