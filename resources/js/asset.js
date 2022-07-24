import $ from "jquery";
window.$ = window.jquery = $;


//link : https://sweetalert.js.org/guides/
import Swal from 'sweetalert2';
window.Swal = Swal;



import 'bootstrap/dist/js/bootstrap.js';
import 'bootstrap/js/dist/collapse.js';

//link : https://github.com/majidh1/JalaliDatePicker/blob/main/test/index.html

import '@majidh1/jalalidatepicker/dist/jalalidatepicker.min'


//link : https://ckeditor.com/docs/ckeditor5/latest/installation/getting-started/predefined-builds.html#npm
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
window.ClassicEditor = ClassicEditor;


// require('select2/dist/js/select2');
import select2 from 'select2';
//Hook up select2 to jQuery
select2($);
//...later
$(`select`).select2();
