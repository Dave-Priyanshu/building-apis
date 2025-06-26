<?php

namespace App\Services\V1;

use Illuminate\http\Request;

class CustomerQuery {
    protected $safeParams = [
        'name'=> ['eq'],
        'type'=> ['eq'],
        'email'=> ['eq'],
        'address'=> ['eq'],
        'city'=> ['eq'],
        'state'=> ['eq'],
        'postal_code'=> ['eq','gt','lt']
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];

    protected $opratorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',  
        'gt' => '>',
        'gte' => '>='
    ];

    public function transform(Request $request){
        $eloQuery = [];

        foreach($this->safeParams as $parm => $operators){
            $query = $request->query($parm);

            if(!isset($query)){
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm;

            foreach($operators as $operator){
                if(isset($query[$operator])){
                    $eloQuery[] = [$column, $this->opratorMap[$operator], $query[$operator]];
                }
            }
        }

        return $eloQuery;
    }
}

?>