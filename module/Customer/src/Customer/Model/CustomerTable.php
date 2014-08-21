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
			$category_id => $customer->category_id,
			$type_id => $customer->type_id,
			$owner_name => $customer->owner_name,
			$company_name => $customer->company_name
			$consignee => $customer->consignee,
			$branch => $customer->branch,
			$franchise => $customer->franchise,
			$phone => $customer->phone,
			$trade_name => $customer->trade_name,
			$company_tin => $customer->company_tin,
			$website => $customer->website,
			$email => $customer->email,
			$credit_allow_id => $customer->credit_allow_id,
			$payment_term_id => $customer->payment_term_id,
			$ship_mode_id => $customer->ship_mode_id,
			$price_type_id => $customer->price_type_id,
			$se_id => $customer->se_id,
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