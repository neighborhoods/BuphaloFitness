#!/usr/bin/env bash
# Bash instructions to Buphalo Walkscore Service.

cd "$(dirname "$0")" || exit
cd ..
# shellcheck disable=SC2034

Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__SourceDirectoryPath=$PWD/src \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__FabricationDirectoryPath=$PWD/fab-buphalo \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\WalkScoreService\\ \
Neighborhoods_Buphalo_V1_TargetApplication_BuilderInterface__NamespacePrefix=Neighborhoods\\BuphaloFitness\\Demo4 \
Neighborhoods_Buphalo_V1_FabricationFile_Map_BuilderInterface__FinderFileNames="*.buphalo.v1.fabrication.yml" \
vendor/bin/buphalo
