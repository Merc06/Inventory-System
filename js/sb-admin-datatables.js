// Call the dataTables jQuery plugin
$(document).ready(function() {
    table = $("#dataTable").DataTable();
        new $.fn.dataTable.Buttons( table, {
            buttons: [
                {
                extend:    'copy',    
                text:      '<i><img src="images/copy.png" height="20" width="20"></i> Copy',
                titleAttr: 'Copy',
                className: 'btn btn-pogi btn-sm'
                    
                },
                {
                extend:    'csv',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                text:      '<i><img src="images/excel.png" height="20" width="20"></i> CSV',
                titleAttr: 'CSV',
                className: 'btn btn-pogi btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
                },
                {
                extend:    'excel',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                text:      '<i><img src="images/excel.png" height="20" width="20"></i> Excel',
                titleAttr: 'Excel',
                className: 'btn btn-pogi btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
                },
                {
                extend:    'pdf',
                orientation: 'landscape',
                pageSize: 'LEGAL',
                text:      '<i><img src="images/pdf.png" height="20" width="20"></i> PDF',
                titleAttr: 'PDF',
                className: 'btn btn-pogi btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
                },               
                {
                extend:    'print',
                orientation: 'landscape',
                pageSize: 'B4',
                text:      '<i><img src="images/print.png" height="20" width="20"></i> Print',
                titleAttr: 'Print',
                className: 'btn btn-pogi btn-sm',
                exportOptions: {
                    columns: ':visible'
                }
                },  
            ]
        } );
        table.buttons().container().insertBefore('#print');
});
