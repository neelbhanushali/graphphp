<pre>
<?php

error_reporting(E_ALL);

class GraphNode
{
    public $id, $name;
    public $edges = [];
}

$g0 = new GraphNode();
$g0->id = $g0->name = 0;

$g1 = new GraphNode();
$g1->id = $g1->name = 1;

$g2 = new GraphNode();
$g2->id = $g2->name = 2;

$g3 = new GraphNode();
$g3->id = $g3->name = 3;

$g4 = new GraphNode();
$g4->id = $g4->name = 4;

array_push($g0->edges, 1);

array_push($g1->edges, 0);
array_push($g1->edges, 2);
array_push($g1->edges, 3);

array_push($g2->edges, 4);

array_push($g3->edges, 1);
array_push($g3->edges, 4);

array_push($g4->edges, 2);
array_push($g4->edges, 3);

// print_r($g0);
// print_r($g1);
// print_r($g2);
// print_r($g3);
// print_r($g4);

$allgraphnodes = [];
array_push($allgraphnodes, $g0);
array_push($allgraphnodes, $g1);
array_push($allgraphnodes, $g2);
array_push($allgraphnodes, $g3);
array_push($allgraphnodes, $g4);

$nodes = [];
$edges = [];

for($i = 0; $i < count($allgraphnodes); $i++) {
    array_push($nodes, $allgraphnodes[$i]->name);
    
    foreach ($allgraphnodes[$i]->edges as $key => $value) {
        if(!in_array("{$value}{$allgraphnodes[$i]->name}", $edges))
            array_push($edges, "{$allgraphnodes[$i]->name}{$value}");
    }
        
}



// foreach ($edges as $key => $value) {
//     $rev = strrev($value);
//     if(in_array($rev, $edges)) {
//         unset($edges[array_search($rev, $edges)]);
//     }
// }

print_r($nodes);
print_r($edges);

$NODES = [];
foreach ($nodes as $key => $value) {
    $var = "{id: {$value}, label: '{$value}'}";
    array_push($NODES, $var);
}
$NODES = implode(",", $NODES);
$NODES = "[" . $NODES . "]";


$EDGES = [];
foreach($edges as $key => $value) {
//     $var1 = explode("", $value);
//     print_r($var1);
    $var = "{from: {$value[0]}, to: {$value[1]}}";
    array_push($EDGES, $var);
}
$EDGES = implode(",", $EDGES);
$EDGES = "[" . $EDGES . "]";

echo "nodes: ". $NODES. "<br>";
echo "edges: ". $EDGES. "<br>";

?>