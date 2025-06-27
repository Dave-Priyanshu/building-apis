<?php

namespace App\Filters;

use Illuminate\http\Request;

class ApiFilter{
    protected $safeParams = [];

    protected $columnMap = [];

    protected $opratorMap = [];

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