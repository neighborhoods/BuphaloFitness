#!/usr/bin/env bash

cd "$(dirname "$0")" || exit
cd ..
if [ -f vendor/bin/buphalo.phar ]; then
  BUPHALO_ENTRY_POINT=vendor/bin/buphalo.phar
else
  BUPHALO_ENTRY_POINT=vendor/bin/buphalo
fi
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/src \
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/fab \
Neighborhoods_Buphalo_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\BuphaloFitness\\Demo3 \
Neighborhoods_Buphalo_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/templates \
php $BUPHALO_ENTRY_POINT
