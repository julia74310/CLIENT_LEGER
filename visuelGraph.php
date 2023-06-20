<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');

$datay=array();
foreach($lesCAVentes as $unCAVentes){
    $datay[]=array($unCAVentes['CA']);
}



// Create the graph. These two calls are always required
$graph = new Graph(350,200,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$nomArtistes=array();
foreach($lesNbVentes as $unNbVente){
    $nomArtistes[]=array($unNbVente['nbVentesTotale']);
}
$graph->yaxis->SetTickPositions(array(0,500,1000,1500), array(250,750,1250,1750));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($nomArtistes);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($datay);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");

$graph->title->Set("Bar Plots");

// Display the graph
$graph->Stroke();
?>