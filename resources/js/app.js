import './bootstrap';

import $ from 'jquery';
import 'datatables.net-dt/css/dataTables.dataTables.css';
import dt from 'datatables.net';

$(document).ready(function () {
    $('#category').DataTable();
});

$(document).ready(function () {
    $('#participant').DataTable({
        responsive: true
    });
});

$(document).ready(function(){
    $("a.confirm").click(function(e){
        if(!confirm('Are you sure want to attend this participant?')){
            e.preventDefault();
            return false;
        }
        return true;
    });
});