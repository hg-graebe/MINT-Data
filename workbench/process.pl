undef $/;
open(FH,"MINT-Plattformen-2018.txt") or die;
my @l=split(/\n+\#--------------------\n+/,<FH>);
close FH;
my $out; my $cnt=100;
map $out.=process($_,$cnt++), @l;
print TurtlePrefix().$out;

## end main

sub process {
  my ($a,$b,$c)=split(/\n\n+/,shift);
  $b=join(", ",map("<$_>", split(/\n/,$b)));
  my $cnt=shift;
  $a=~s/"/\\"/g;
  return <<EOT;
<http://meier.org/P_$cnt> a rdfs:Uhu ; 
  rdfs:label "$a" ;
  foaf:homepage $b ;
  dct:abstract """$c""" .
    
EOT
}

sub TurtlePrefix {
  return <<EOT;
\@prefix rdf: <http://www.w3.org/1999/02/22-rdf-syntax-ns#> .
\@prefix rdfs: <http://www.w3.org/2000/01/rdf-schema#> .
\@prefix dct: <http://purl.org/dc/terms/> .
\@prefix foaf: <http://xmlns.com/foaf/0.1/> .

EOT

}
