
LIGHT_BLUE='\033[1;34m'
LIGHT_GREEN='\033[1;32m'
NC='\033[0m'

printf "${LIGHT_GREEN}======== Processing Modules ========${NC}\n"

cd Modules

for d in * ; do
    cd $d
    printf "${LIGHT_BLUE}Processing Module: $d${NC}\n"
    eval $1
    cd ..
done

printf "${LIGHT_GREEN}======== Modules Processed ========${NC}\n"
