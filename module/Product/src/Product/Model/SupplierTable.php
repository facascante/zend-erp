<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class SupplierTable
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


	public function getSupplier($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}

	public function saveSupplier(Supplier $supplier)
	{
		$data = array(
			'name' => $supplier->name,
		);
        $id = intval($supplier->id);
        if($id == 0){
            $this->tableGateway->insert($data);
        }
        else {
            if($this->getSupplier($id)){
                $this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Supplier id does not exist');
			}
		}
	}
	public function deleteSupplier($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}