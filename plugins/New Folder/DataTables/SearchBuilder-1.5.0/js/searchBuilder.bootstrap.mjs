/*! Bootstrap ui integration for DataTables' SearchBuilder
 * © SpryMedia Ltd - datatables.net/license
*/

import jQuery from 'jquery';
import DataTable from 'datatables.net-bs';
import SearchBuilder from 'datatables.net-searchbuilder';

// Allow reassignment of the $ variable
let $ = jQuery;

$.extend(true, DataTable.SearchBuilder.classes, {
    clearAll: 'btn btn-default dtsb-clearAll'
});
$.extend(true, DataTable.Group.classes, {
    add: 'btn btn-default dtsb-add',
    clearGroup: 'btn btn-default dtsb-clearGroup',
    logic: 'btn btn-default dtsb-logic'
});
$.extend(true, DataTable.Criteria.classes, {
    condition: 'form-control dtsb-condition',
    data: 'form-control dtsb-data',
    "delete": 'btn btn-default dtsb-delete',
    left: 'btn btn-default dtsb-left',
    right: 'btn btn-default dtsb-right',
    value: 'form-control dtsb-value'
});


export default DataTable;
