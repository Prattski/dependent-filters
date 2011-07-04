Magento: Dependent Filters Extension
====================================

This extension adds on option on the attribute edit view that allows you to select dependencies from a list of existing filters. When dependencies have been set, the filter will not show up on the front end until one of the selected dependencies have been selected. This extension currently does not support the price filter or category filter.

This module has only been tested with 1.4.x

How to Use
----------

After the extension has been properly installed, go to Catalog >> Attributes >> Manage Attributes and edit an attribute that you have setup to be used as a filterable attribute.  You will see a new option called “Depends On” in the Attribute Properties.  Change the value from “None” to “Select Filter(s)”.  You will then see a new multiselect element listing all of the filterable attributes that you have setup.

Within the multiselect element, you can select as many attribute options as you’d like, even from different filters.  Once you have made your selections and have saved the attribute, you will now notice that the filter you were editing no longer is displayed on the frontend.  Once you select any of the filter options that you selected when editing the attribute, the filter will now be visible.

You can even do multi-level dependencies.  You could setup attribute ‘B’ to be dependent on any of the options being selected from attribute ‘A’.  Attribute ‘C’ is dependent on any of the options selected in attribute ‘B’.  On the frontend, the user would only see attribute ‘A’.  Once they make a selection, they would then see attribute ‘B’.  When they make a selection with attribute ‘B’, they would then see attribute ‘C’.