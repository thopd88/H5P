#!/bin/bash

# This script will help rename the main namespace from EscolaLms\HeadlessH5P to Thopd\HeadlessH5P
# making the project completely independent

echo "This script will help rename namespaces to make the project independent."
echo "After running this script, you'll need to:"
echo "1. Update composer.json autoload sections"
echo "2. Run composer dump-autoload"
echo "3. Update any remaining configuration files"
echo ""
echo "The main changes made:"
echo "- Created local OrderDto, CriteriaDto, BasicEnum, and repository criteria classes"
echo "- Created local User model and QueryCacheable trait"
echo "- Created local Settings functionality with AdministrableConfig facade"
echo "- Updated all imports to use local classes instead of external EscolaLms packages"
echo ""
echo "To complete the independence:"
echo "1. Consider renaming EscolaLms\\HeadlessH5P to Thopd\\HeadlessH5P throughout"
echo "2. Update composer.json psr-4 autoloading"
echo "3. Update service provider registrations"
echo "4. Test all functionality"