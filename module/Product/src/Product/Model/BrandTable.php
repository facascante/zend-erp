<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class BrandTable
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


	public function getBrand($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
	}

	public function saveBrand(Brand $brand)
	{
		$data = array(
			'name' => $brand->name,
        );
        $id = intval($brand->id);
        if($id == 0){
            $this->tableGateway->insert($data);
        }
        else {
            if($this->getBrand($id)){
                $this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Brand id does not exist');
			}
		}
	}
	public function deleteBrand($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}