#!/usr/bin/php 
<?php

require_once( "../../old-graphite/arc/ARC2.php" );
require_once( "Graphite.php" );

$graph = new Graphite();

$graph->ns( "sr", "http://data.ordnancesurvey.co.uk/ontology/spatialrelations/" );

$rd = $graph->resource( "http://id.southampton.ac.uk/building/32" )->prepareDescription();

$rd->addRoute( '*' );
$rd->addRoute( '*/rdfs:label' );
$rd->addRoute( '*/rdf:type' );
$rd->addRoute( '-sr:within/rdf:type' );
$rd->addRoute( '-sr:within/rdfs:label' );

$n = $rd->loadSPARQL( "http://sparql.data.southampton.ac.uk/" );

$format = "debug";

if( $format != "html" ) { if( !$rd->handleFormat( $format ) ) { print "404!\n"; exit; } }


print "DEFAULT:html";
