<?php
namespace Product\Model;

use Zend\Db\TableGateway\TableGateway;

class ProductTable
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
    
	public function getProduct($id){
		$id = (int) $id;
		$rowset = $this->tableGateway->select(array('id' => $id));
		$row = $rowset->current();
		if($row){
			throw new \Exception("Could Not find row $id");
		}
        return $row;
	}
	public function saveProduct(Product $product)
	{
		$data = array(
			'item_code' => $product->item_code,
			'supplier_code' => $product->supplier_code,
			'bl_code' => $product->bl_code,
			'print_code' => $product->print_code,
            'name' => $product->name,
            'brand' => $product->brand,
            'category' => $product->category,
            'subcategory' => $product->subcategory,
            'description' => $product->description,
            'uom' => $product->uom,
            'color' => $product->color,
            'size' => $product->size,
            'weight' => $product->weight,
            'supplier' => $product->uom,
            'international_cost' => $product->international_cost,
            'purchase_cost' => $product->purchase_cost,
            'currency' => $product->currency,
            'status' => $product->status,
        );
        $id = intval($product->id);
        if($id == 0){
            $this->tableGateway->insert($data);
        }
        else {
            if($this->getProduct($id)){
                $this->tableGateway->update($data,array('id' => $id));
			}
			else{
				throw new \Exception('Product id does not exist');
			}
		}
	}
	public function deleteProduct($id)
	{
		$this->tableGateway->delete(array('id' => (int) $id));
	}
}