#!/usr/bin/env bash
# Bash instructions to Buphalo Demo

cd "$(dirname "$0")" || exit
cd ..
# shellcheck disable=SC2034

Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/src \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/fab-buphalo \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\BuphaloFitness\\Demo4 \
Neighborhoods_Buphalo_V1_TemplateTree_Map_Builder_FactoryInterface__TemplateTreeDirectoryPaths=$PWD/vendor/neighborhoods/buphalo/template-tree/V1 \
Neighborhoods_Buphalo_V1_FabricationFile_Map_BuilderInterface__FinderFileNames="*.buphalo.v1.fabrication.yml" \
vendor/bin/buphalo
